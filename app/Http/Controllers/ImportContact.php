<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\ContactTemp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\ContactTags;
use Auth;
use App\Tags;
use App\Media;
use App\Organization;
use App\ContactOrganization;

class ImportContact extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.importAndExport');
    }

    public function cancel() {
        ContactTemp::where('user_id','=',Auth::user()->id)->delete();

        return redirect()->to('/contacts/import/upload');
    }

    public function downloadExample() {
        return response()->download(public_path('samples/contacts.csv'));
    }

    public function getImportContact($option) {
        $list = [
            'upload',
            'match',
            'main',
            'review',
        ];
        $contacts = ContactTemp::where('user_id', '=', Auth::user()->id)->get();

        if(!in_array($option, $list)){
            return back();
        }
        return view('user.import')->with('option', $option)->with('contacts', $contacts);
    }

    public function isEmptyArr($array) {
        $count = 0;
        foreach ($array as $key => $value) {
            $value = trim($value);
            if (empty($value)){
                $count++;
            }
        }
        if($count == 15){
            return true;
        }
        return false;
    }

    public function checkArrayKeys($array){
        $list = [
            'firstname',
            'surname',
            'state_of_origin',
            'sex',
            'organization',
            'function',
            'current_city',
            'current_state',
            'email_1',
            'email_2',
            'telephone_1',
            'telephone_2',
            'periodicity',
            'media',
            'tags',
        ];

        $status = true;

        while(current($array)){
            if(!in_array(key($array), $list)){
                $status = false;
            }
            next($array);
        }

        return $status;
    }

    public function postImportContact(Request $request) {
        ContactTemp::where('user_id','=',Auth::user()->id)->delete();
        $csv = $request->file('csv');
        $ext = $csv->getClientOriginalExtension();

        if($ext != 'csv' and $ext != 'xlsx'){
            return back()->with('global', 'Wrong file format. Select either an excel or a csv file');
        }

        $data = Excel::load($csv);

        if($data->get()->first()->count() != 15){
            return back()->with('error', 'error');
        }

        $first = $data->get()->first()->toArray();

        if(!$this->checkArrayKeys($first)){
            return back()->with('error2', 'error2');
        }

        $contacts = $data->toArray();
        $count = 1;

        foreach($contacts as $contact){
            $count++;
            $contact['number'] = $count;
            if(!$this->isEmptyArr($contact)){
                $contact['user_id'] = Auth::user()->id;
                ContactTemp::create($contact);
            }
        }

        return Redirect::to('/contacts/import/match');
    }

    public function getUploaded(Request $request) {
        if($request->ajax()){
            $contacts = ContactTemp::where('user_id', '=', Auth::user()->id)->get();

            return response()->json($contacts);
        }
    }

    public function jsonImportContact(Request $request) {
        if($request->ajax()){

            $this->validate($request, [
                'key'               => 'unique:contacts,key',
                'tags'              => 'required',
                'firstName'         => 'required',
                'surname'           => 'required',
                'state_of_origin'   => 'required|exists:states,state',
                'sex'               => 'required',
                'organization'      => 'required',
                'function'          => 'required',
                'current_city'      => 'required',
                'current_state'     => 'required|exists:states,state',
                'email_1'           => 'required|email',
                'email_2'           => 'email|different:email_1',
                'phone_1'           => 'required',
                'periodicity'       => 'required'
            ]);

            $contact = Contacts::create([
                'key'               => $request['key'],
                'user_id'           => Auth::user()->id,
                'number'            => $request['number'],
                'filter'            => 'Last imported',
                'firstname'         => $request['firstName'],
                'surname'           => $request['surname'],
                'state_of_origin'   => $request['state_of_origin'],
                'sex'               => $request['sex'],
                'rank'              => $request['function'],
                'current_city'      => $request['current_city'],
                'current_state'     => $request['current_state'],
                'email_1'           => $request['email_1'],
                'email_2'           => $request['email_2'],
                'telephone_1'       => $request['phone_1'],
                'telephone_2'       => $request['phone_2'],
                'periodicity'       => $request['periodicity'],
            ]);


            $tags = explode(',', $request['tags']);
            foreach($tags as $tag){
                $tag = trim($tag);
                $query = Tags::where('tags', '=', $tag)->first();
                if(!$query){
                    Tags::create([
                        'tags'      => $tag,
                        'user_id'   => Auth::user()->id,
                    ]);
                }

                ContactTags::create([
                    'tag_id'        => Tags::where('tags', '=', $tag)->first()->id,
                    'contact_id'    => $contact->id,
                ]);
            }

            $media = $request['media'];

            if(count($media)){
                $media = explode(',', $media);
                foreach($media as $m){
                    $m = trim($m);
                    Media::create([
                        'media'         => $m,
                        'contact_id'    => $contact->id,
                    ]);
                }
            }

            $organization = $request['organization'];
            $query = Organization::where('organization', '=', $organization)->first();

            if(!$query){
                Organization::create([
                    'organization'  => $organization,
                    'user_id'       => Auth::user()->id,
                ]);
            }
            ContactOrganization::create([
                'organization_id'       => Organization::where('organization', '=', $organization)->first()->id,
                'contact_id'            => $contact->id,
            ]);


            ContactTemp::find($request->input('id'))->delete();
            return $request->input('key');
        }
    }

    public function setHeaders(Request $request) {
        if($request->ajax()){
            $arr = [
                $request[0],
                $request[1],
                $request[2],
                $request[3],
                $request[4],
                $request[5],
                $request[6],
                $request[7],
                $request[8],
                $request[9],
                $request[10],
                $request[11],
                $request[12],
                $request[13],
                $request[14],
            ];

            $request->session()->put('headers', $arr);

            return 'End';
        }
    }
}
