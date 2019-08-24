<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Course;
use App\Reasonstu;
use App\Drcode;
use App\Requeststu;
use App\User;
use App\Test01;
use alert;
use Illuminate\Http\Request;

class DrController extends Controller

{
     /*

    this cdoe to make just who login in can see the pages 

    */

    public function __construct(){
        $this->middleware('auth');
    }
    
    /*
    this will show Doctor his/her courses that create for doctor 

    */
        public function index()
        {
            
            $course = Test01::all();
            
            $arrCourse=Array('course'=>$course);
            $stu = Requeststu::all();
            $arrStu =Array('stu'=>$stu);
            return view('courses.drpage')->with('course',$course) ;
        }

        /*
        this will show doctor all Requests from student 

        */

        public function showreason($name){
           
            $stu= Requeststu::all();
            $user= User::all();
            $course = Course::where('id',$name);

            $arrStu=Array('stu'=>$stu , 'name'=>$name , 'user'=>$user);            
            return view ('courses.showdrreason')->with($arrStu) ;
        }


     

/*
            THIS WILL CHANGE 

            */ 

/////////////////////////////////////////////////////////////////////
        public function store(Request $request , $id  )
        {



            $code = str_random(5);
            $dro =  Requeststu::find($id);
            $dro->respon_dr = $code ;
            $dro->save();


            

        

            $name = $dro->test_id;


                alert()->success('Success Message', 'Optional Title');            
                return Redirect::back()->with('msg',$code );
        }

/////////////////////////////////////////////////////////////////////////////

               public function showcode(){

                $course = Test01::all();
                $stu = Requeststu::all();
                $user=User::all();
                $arrCourse=Array('course'=>$course , 'stu'=>$stu,'user'=>$user);

                return view('courses.showReqcode', $arrCourse ) ;
                

               }


               public function showReq($id){

                $course = Test01::all();
                $stu = Requeststu::all();
                $user=User::all();
                $arrCourse=Array('course'=>$course , 'stu'=>$stu,'user'=>$user);

                return view('courses.showReqdr', $arrCourse ) ;
                


               }

/////////////////////////////////////////////////////////////////////////////
               public function rejection($id){
                
                $code = "Rejection";
                $dro =  Requeststu::find($id);
                $dro->respon_dr = $code;
                $dro->save();
    
                
            $name = $dro->test_id;
            
            return Redirect::back()->with('msgd',' Code success deleted !');

            
               }

               public function restore($id){
                
                $code = "Rejection";
                $dro =  Requeststu::find($id);
                $dro->respon_dr = "Rejection" ;
                $dro->save();
    
                $course = Course::all();
                $stu = Requeststu::all();
                $arrCourse=Array('course'=>$course , 'stu'=>$stu);

               // return view('courses.showReqcode', $arrCourse ) ;

               return Redirect::back()->with('msgd',' Code success deleted !');

            
               }


    
}
