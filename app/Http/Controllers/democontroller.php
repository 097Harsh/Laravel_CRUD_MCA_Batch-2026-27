<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class democontroller extends Controller
{
    //index function that call login page...
    public function index()
    {
        return view('login');
    }
    //dashboard function that call dashboard page...
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    //manage user list 
    public function manage_user()
    {
        return view('admin.manage_user');
    }
    //add record
    public function add_record()
    {
        $courses = \DB::table('course')->get();
        //dd($courses);
        return view('admin.add_record', compact('courses'));
    }
    //record insert into db
    
}
