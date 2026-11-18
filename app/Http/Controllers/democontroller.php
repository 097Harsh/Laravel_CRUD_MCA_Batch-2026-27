<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

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
        $records = DB::table('students')->get();
        return view('admin.manage_user', compact('records'));
    }
    //add record
    public function add_record()
    {
        $courses = \DB::table('course')->get();
        //dd($courses);
        return view('admin.add_record', compact('courses'));
    }
    //record insert into db
    public function add_user(Request $request)
    {
        //dd($request->all());
       
        // Upload Image
        $imageName = $request->image->getClientOriginalName();
        //dd($request->all());
        //echo $imageName;die;
       $query = DB::table('students')->insert([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'address'   => $request->address,
                    'gender'    => $request->gender,
                    'course_id' => $request->course,
                    'phone'     => $request->phone,
                    'image'     => $imageName,
                    'dob'       => $request->dob
                ]);

        if($query){
            $request->image->move(public_path('upload'), $imageName);
            return redirect()->route('manageuser')->with('success', 'Student record added successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Failed to add student record.');
        }
        /* 
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;  
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->course_id = $request->course_id;
        $student->phone = $request->phone;
        // Upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('upload'), $imageName);
        $student->image = $imageName;
        $student->save();*/

        
    }
}
