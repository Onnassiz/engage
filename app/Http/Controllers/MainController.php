<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class MainController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect()->to('/dashboard');
        }
        return view('guest.home');
    }
}
