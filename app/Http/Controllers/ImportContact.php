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

class ImportContact extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.importAndExport');
    }

    public function downloadExample() {
        return response()->download(public_path('samples/contacts.csv'));
    }

    public function getImportContact($option) {
        $list = [
            'upload',
            'match',
            'import',
            'review',
        ];

        $contacts = ContactTemp::where('user_id', '=', Auth::user()->id)->get()->take(15);

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

        foreach($contacts as $contact){
            if(!$this->isEmptyArr($contact)){
                $contact['user_id'] = Auth::user()->id;
                ContactTemp::create($contact);
            }
        }

        return Redirect::to('/contacts/import/match');
    }
}
