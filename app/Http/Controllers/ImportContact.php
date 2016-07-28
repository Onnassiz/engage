<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImportContact extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.importAndExport');
    }

    public function downloadExample() {
        return response()->download('http://engage.dev/samples/contacts.csv');
    }
}
