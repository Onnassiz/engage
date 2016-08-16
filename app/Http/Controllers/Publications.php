<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Organization;
use App\Publication;
use App\PublicationsContacts;
use App\ContactOrganization;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;


class Publications extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function home() {
        return view('user.publications');
    }

    public function filter() {

        $organization = Organization::where('user_id', '=', Auth::user()->id)->orderBy('organization')->get();
        $functions = Contacts::orderBy('rank')->groupBy('rank')->get();


        if(Session::has('organizations') or  Session::has('functions')){
            if(Session::has('organizations') and Session::has('functions')){
                $orgs = Session::get('organizations');
                $orgIds = [];
                $contactIds = [];
                $contacts = [];
                $contactsFinal = [];

                $ranks = Session::get('functions');


                foreach($orgs as $org){
                    $orgIds[] = Organization::whereOrganization($org)->first()->id;
                }

                foreach($orgIds as $orgId){
                    $items = ContactOrganization::whereOrganizationId($orgId)->get();

                    foreach($items as $item){
                        $contactIds[] = $item->contact_id;
                    }
                }

                foreach($contactIds as $contactId){
                    $contacts[] = Contacts::find($contactId);
                }

                foreach($contacts as $contact){
                    foreach($ranks as $rank){
                        if($contact->rank == $rank){
                            echo 'Yes';
                            $contactsFinal[] = $contact;
                        }
                    }
                }

                Session::put('contacts', $contactsFinal);

                return view('user.filter')->with('contacts', $contactsFinal);
            }
            elseif(Session::has('organizations')){
                $orgs = Session::get('organizations');
                $orgIds = [];
                $contactIds = [];
                $contacts = [];

                foreach($orgs as $org){
                    $orgIds[] = Organization::whereOrganization($org)->first()->id;
                }

                foreach($orgIds as $orgId){
                    $items = ContactOrganization::whereOrganizationId($orgId)->get();

                    foreach($items as $item){
                        $contactIds[] = $item->contact_id;
                    }
                }

                foreach($contactIds as $contactId){
                    $contacts[] = Contacts::find($contactId);
                }

                Session::put('contacts', $contacts);

                return view('user.filter')->with('contacts', $contacts);
            }
            else{
                $ranks = Session::get('functions');
                $contacts = [];

                foreach($ranks as $rank){
                    $items = Contacts::whereRank($rank)->get();

                    foreach($items as $item){
                        $contacts[] = $item;
                    }
                }

                Session::put('contacts', $contacts);

                return view('user.filter')->with('contacts', $contacts);
            }
        }else{
            $contacts = Contacts::all('*');
            Session::put('contacts', $contacts);
            return view('user.filter')->with('contacts', $contacts)->with('organization', $organization)->with('functions', $functions);
        }
    }

    public function postFilters(Request $request){

        if($request->ajax()){
            $organizations = $request->organizations;
            $functions = $request->functions;

            if(count($functions)){
                Session::put('functions', $functions);
            }
            if(count($organizations)){
                Session::put('organizations', $organizations);
            }

            return response()->json();
        }
    }

    public function clearFilters() {
        Session::forget('organizations');
        Session::forget('functions');

        return redirect()->back();
    }

    public function sendPublication() {
        $contacts = Session::get('contacts');

        return view('user.sendPublication')->with('contacts', $contacts);
    }
    public function postPublication(Request $request) {

        $contacts = Session::get('contacts');

        $this->validate($request, [
            'title'     => 'required',
            'publication'     => 'required',
        ]);

        $publication = Publication::create([
            'title'         =>  $request->title,
            'publication'   =>  $request->publication,
            'user_id'       =>  Auth::user()->id,
        ]);

        foreach ($contacts as $contact) {
            PublicationsContacts::create([
                'contact_id'        => $contact->id,
                'publication_id'    => $publication->id
            ]);
        }

        Session::forget('contacts');
        Session::forget('functions');
        Session::forget('organizations');

        return redirect()->to('/publications')->with('global', 'Publication successfully sent.');
    }

    public function publicationHistory(){
        $publications = Publication::whereUserId(Auth::user()->id)->get();

        return view('user.publicationHistory')->with('publications', $publications);
    }
}
