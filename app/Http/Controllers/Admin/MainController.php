<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['page_title'] = 'Dashboard';
        $data['page'] = 'dashboard';

        return view('admin.pages.dashboard',$data);
    }
}
