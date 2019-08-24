<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Rules\valiDoctor;
use App\Http\Requests\CsvImportRequest;
use App\Requeststu;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Product;
use Excel;
use App\Test01;
class adminController extends Controller
{
    
    /*
    this cdoe to make just who login in can see the pages 
    */
public function __construct(){
    $this->middleware('auth');
}


    /*
    this  will show the user admin's create new course #endregion
    */
    public function index(){


        return view('courses.createC');
    }


    /*
     this the validation and how the data save to Database 
    */

    public function store(Request $request)
    {
        $this->validate($request,[
           

        ]);

        $course =  new Test01();
        $course->course_no = $request->input('course_no');
        $course->course_name = $request->input('course_name');
        $course->hours =$request->input('hours');
        $course->activity = $request->input('Activity');
        $course->group = $request->input('group');
        $course ->headquarters = $request->input('Head');
        $course->mix = $request->input('mix');
        $course->registered = "0";
        $course ->time = $request->input('time');
        $course ->doctor = $request->input('doctor');

        $course->save();

        return redirect(route('courses.index'));
        }

        
        public function showallrequest(){
            
            $course = Test01::all();
            $user = User::all();
            $stu = Requeststu::all();
            $arrStu =Array('stu'=>$stu , 'course'=>$course , 'user'=>$user) ;
            return view('courses.allrequest',  $arrStu) ;
            

        }

        public function showSchedul($name){


            $course = Course::all();
            $user=User::all();
            $stu = Requeststu::all();
            $arrStu =Array('stu'=>$stu , 'name'=>$name,'course'=>$course , 'user'=>$user);
            return view('courses.Scheduleadmin')->with($arrStu) ;




        }

        public function accstu(Request $request , $id  ){

    
    
                $code = "Accept";
                $dro =  Requeststu::find($id);
                $dro->respon_admin = $code ;
                $dro->save();
    
                $stu= Requeststu::all();
    
                $arrStu=Array('stu'=>$stu , 'msg'=>'Code Success');
                
                
                return redirect(route('allReq'))->with('msg','Accept');
                   

        }

        public function shownote($id){

    
    
            $dro =  Requeststu::find($id);
            
            
            return view ('courses.shownote')->with('dor', $dro);
               

    }

    public function savenote(Request $request , $id){

        $dro =  Requeststu::find($id);
         
        $dro->respon_admin = $request->input('note') ;
        $dro->save();

        $name = $request->input('note');

                
                
        return redirect(route('allReq'))->with('msgN', $name );


    }




/////////////////////////////////////////////////////////////////////

public function list(){
    $products = Product::get();
    $user = Course::get();
    
    return view('courses.products', compact('user'));
}

public function productsImport(Request $request){
   
    if($request->hasFile('courses')){
        $path = $request->file('courses')->getRealPath();
        $data = \Excel::load($path)->get();
        if($data->count()){
          

            foreach ($data as $key => $value) {
                //print_r($value);
                $product_list[] =
                 ['course_no' => $value->course_no, 'course_name' => $value->course_name
                ,'hours'=>$value->hours , 'activity'=>$value->activity , 'group'=>$value->group
                ,'headquarters'=>$value->headquarters , 'mix'=>$value->mix
                , 'registered'=>$value->registered , 'time'=>$value->time ,
                 'doctor'=>$value->doctor ];
            }
            if(!empty($product_list)){
                Test01::insert($product_list);
                \Session::flash('success','File improted successfully.');
            }
        }
    }else{
        \Session::flash('warnning','There is no file to import');
    }
    return Redirect::back();
}
/*
if($request->hasFile('courses')){
    $path = $request->file('courses')->getRealPath();
    $data = \Excel::load($path)->get();
    if($data->count()){

        foreach ($data as $key => $value) {
            //print_r($value);
            $product_list[] = ['class' => $value->class, 'case' => $value->case
           
            ,'doctor_id'=>$value->doctor_id , 'group'=>$value->group
            , 'number'=>$value->number , 'time'=>$value->time  ];
        }
        if(!empty($product_list)){
            Course::insert($product_list);
            \Session::flash('success','File improted successfully.');
        }
    }
}else{
    \Session::flash('warnning','There is no file to import');
}
return Redirect::back();
}*/ 


public function productsExport($type){
    $products = Test01::select('*')->get()->toArray();
    return \Excel::create('hello', function($excel) use ($products) {
        $excel->sheet('Product Details', function($sheet) use ($products)
        {
            $sheet->fromArray($products);
        });
    })->download($type);
}

    }