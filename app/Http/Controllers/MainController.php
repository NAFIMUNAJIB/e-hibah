<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [];
        $data['page_title'] = 'Index';
        $data['page'] = 'index';

        return view('public.pages.home',$data);
    }
}
