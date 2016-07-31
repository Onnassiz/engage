<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\States;
use File;
use App\Tags;
use Auth;
use Redirect;
use App\ContactTags;
use App\Media;
use App\Organization;
use App\ContactOrganization;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        $contacts = Contacts::whereUserId(Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        return view('user.contacts')->with('contacts', $contacts);
    }

    public function create() {
//        $tags = Tags::all('tags');
//        File::put(public_path('js/tags.json'), '[');
//
//        $numbRows = count($tags); $i = 0;
//
//        foreach($tags as $tag){
//            if(++$i == $numbRows){
//                File::append(public_path('js/tags.json'), '"'.$tag->tags.'"');
//            }
//            else{
//                File::append(public_path('js/tags.json'), '"'.$tag->tags.'",');
//            }
//        }
//
//        File::append(public_path('js/tags.json'), ']');
        $states = States::all('*');
        return view('user.createContact')->with('states', $states);
    }

    public function postCreate(Request $request) {
        date_default_timezone_set('Africa/Lagos');
        $messages = [
            'email_1.required'  => 'At least one email address required.',
            'email_2.different' => 'The first and second (optional) email must be different.',
            'phone_1.required'  => 'At least one phone number required.',
            'phone_2.different' => 'The first and second phone number must be different.',
            'tags.required'     => 'At least one tag is required. A tag could be the the contact\'s department, office, likes and interest, bands, etc.',
            'key.unique'        => 'The email address '.'\''.$request->email_1.'\' '.'has already been mapped to this organization. Use a different email address or organization.'
        ];

        $request['key'] = $request->email_1.$request->organization;

        $this->validate($request,[
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
            'email_1'           => 'required',
            'email_2'           => 'different:email_1',
            'phone_1'           => 'required',
            'phone_2'           => 'different:phone_1',
        ], $messages);

        $contact = Contacts::create([
            'key'               => $request['email_1'].$request['organization'],
            'user_id'           => Auth::user()->id,
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

        $organization = $request->organization;
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

        $media = $request->media;

        if(count($media)){
            foreach($media as $m){
                Media::create([
                    'media'         => $m,
                    'contact_id'    => $contact->id,
                ]);
            }
        }

        if($request['next'] != 'Insert a new contact'){
            return Redirect::to('/contacts')->with('message', 'Contact successfully created');
        }
        return back()->with('message', 'Contact successfully created');
    }

    public function tagsAutocomplete(Request $request) {
        if($request->ajax()){
            $tags = Tags::where('tags', 'like', '%'.$request->term.'%')->orderBy('tags')->get();

            $results = [];
            foreach($tags as $tag){
                $results[] = ['id' => $tag->id, 'value' => $tag->tags];
            }

            return response()->json($results);
        }
    }

    public function organization(Request $request) {
        if($request->ajax()){
            $tags = Organization::where('organization', 'like', '%'.$request->org.'%')->get();

            $results = [];
            foreach($tags as $tag){
                $results[] = ['id' => $tag->id, 'value' => $tag->organization];
            }

            return response()->json($results);
        }
    }

    public function viewContact($key) {
        $contact = Contacts::whereKey($key)->first();

        if(count($contact)){
            if($contact->user_id != Auth::user()->id){
                return redirect()->back();
            }

            $tag_ids = ContactTags::whereContactId($contact->id)->pluck('tag_id');

            foreach($tag_ids as $tag_id){
                $tags[] = Tags::whereId($tag_id)->first()->tags;
            }

            $medias = Media::whereContactId($contact->id)->pluck('media');
            return view('user.viewContact')->with('contact', $contact)->with('tags', $tags)->with('medias', $medias);
        }

        return redirect()->back();
    }

    public function deleteContact($id){
        $contact = Contacts::find($id);
        if($contact->user_id != Auth::user()->id){
            return redirect()->back();
        }
        ContactTags::whereContactId($id)->delete();
        ContactOrganization::whereContactId($id)->delete();
        Contacts::find($id)->delete();

        return redirect()->to('/contacts')->with('global', $contact->surname.' '.$contact->firstname.' has been deleted successfully');
    }

    public function editContact($key) {
        $contact    = Contacts::whereKey($key)->first();
        $states     = States::all('*');

        if(count($contact)){
            if($contact->user_id != Auth::user()->id){
                return redirect()->back();
            }

            $tag_ids = ContactTags::whereContactId($contact->id)->pluck('tag_id');

            foreach($tag_ids as $tag_id){
                $tags[] = Tags::whereId($tag_id)->first()->tags;
            }

            $ms = Media::whereContactId($contact->id)->get();
            foreach($ms as $m){
                $media[] = $m->media;
            }
            return view('user.editContact')->with('contact', $contact)->with('tags', $tags)->with('media', $media)->with('states', $states);
        }

        return redirect()->back();
    }

    public function postEditContact($key, Request $request) {
        date_default_timezone_set('Africa/Lagos');

        $id = Contacts::whereKey($key)->first()->id;
        $messages = [
            'email_1.required'  => 'At least one email address required.',
            'email_2.different' => 'The first and second (optional) email must be different.',
            'phone_1.required'  => 'At least one phone number required.',
            'phone_2.different' => 'The first and second phone number must be different.',
            'tags.required'     => 'At least one tag is required. A tag could be the the contact\'s department, office, likes and interest, bands, etc.',
            'key.unique'        => 'The email address '.'\''.$request->email_1.'\' '.'has already been mapped to this organization. Use a different email address or organization.'
        ];

        $request['key'] = $request->email_1.$request->organization;

        $this->validate($request,[
            'tags'              => 'required',
            'firstName'         => 'required',
            'surname'           => 'required',
            'state_of_origin'   => 'required|exists:states,state',
            'sex'               => 'required',
            'organization'      => 'required',
            'function'          => 'required',
            'current_city'      => 'required',
            'current_state'     => 'required|exists:states,state',
            'email_1'           => 'required',
            'email_2'           => 'different:email_1',
            'phone_1'           => 'required',
            'phone_2'           => 'different:phone_1',
        ], $messages);

        if($key != $request['key']){
            $this->validate($request,[
                'key'               => 'unique:contacts,key',
            ]);
        }
        $update = Contacts::whereKey($key)->update([
            'key'               => $request['email_1'].$request['organization'],
            'user_id'           => Auth::user()->id,
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


        ContactTags::whereContactId($id)->delete();

        $tags = explode(',', $request['tags']);
        foreach($tags as $tag){
            $query = Tags::where('tags', '=', $tag)->first();
            if(!$query){
                Tags::create([
                    'tags'      => $tag,
                    'user_id'   => Auth::user()->id,
                ]);
            }

            ContactTags::create([
                'tag_id'        => Tags::where('tags', '=', $tag)->first()->id,
                'contact_id'    => $id,
            ]);
        }

        ContactOrganization::whereContactId($id)->delete();

        $organization = $request->organization;
        $query = Organization::where('organization', '=', $organization)->first();

        if(!$query){
            Organization::create([
                'organization'  => $organization,
                'user_id'       => Auth::user()->id,
            ]);
        }
        ContactOrganization::create([
            'organization_id'       => Organization::where('organization', '=', $organization)->first()->id,
            'contact_id'            => $id,
        ]);

        Media::whereContactId($id)->delete();

        $media = $request->media;

        if(count($media)){
            foreach($media as $m){
                Media::create([
                    'media'         => $m,
                    'contact_id'    => $id,
                ]);
            }
        }

        return Redirect::to('/contacts')->with('message', 'Contact successfully updated');
    }
}
