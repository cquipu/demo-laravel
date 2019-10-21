<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        //dd($request->query('title','Title for default')); die;
        return view('test',[
            'title'=> $request->query('title','Title for default')
        ]);
    }
}
