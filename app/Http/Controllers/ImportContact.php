<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

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

    public function getImportContact() {
        return view('user.import')->with('option', 'first');
    }

    public function postImportContact(Request $request) {
        $csv = $request->file('csv');
        return $csv;
//        return view('user.import')->with('option','second');
    }
}
