<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Test01;
class coursesController extends Controller
{

     
    /*
    this cdoe to make just who login in can see the pages 

    */

public function __construct(){
    $this->middleware('auth');
}

    /* 
        this will show user all the courses who created by admin from 
        database 
        */ 

    public function index()
    {
        $course = Course::all();


        $doctor= User::all();

        $courses = Test01::orderBy('id')->paginate(5);;

        $arrStu =Array('course'=>$course , 'doctor'=>$doctor);



        return view('courses.course')->with('courses', $courses);
        //, $arrStu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::find($id);
        return view('courses.edit')->with('course',$course);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'case'=>'required',
            'group'=>'required',
            'number'=>'required',
            'time'=>'required',
            'doctor'=>'required',
            'class'=>'required'

        ]);
        
        

        $course =   Course::find($id);
        $course->class = $request->input('class');
        $course->case = $request->input('case');
        $course->group =$request->input('group');
        $course->doctors = $request->input('doctor');
        $course->number = $request->input('number');
        $course ->time = $request->input('time');
        $course->save();

        return redirect(route('courses.index'))->with('msg','Edited');;
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->destroy($id);
        
        return redirect(route('courses.index'))->with('msg','Deleted');

    }
}