<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class WelcomeController extends Controller
{

    public function index(){
        return view('welcome');
    }
}
