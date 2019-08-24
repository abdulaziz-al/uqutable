<?php

namespace App\Http\Controllers;
use App\Reasonstu;
use App\Course;
use App\Requeststu;
use App\User;
use App\Test01;

use Illuminate\Http\Request;

class stuController extends Controller
{
    

    /*

    this cdoe to make just who login in can see the pages 

    */
public function __construct(){
    $this->middleware('auth');
}

    /*
    this will show student Request page with the name of course 
    and group number 
    */

    
    public function showstupage()
    {
        $course = Course::all();
        $req = Requeststu::all();
        $doctor= User::all();
        $courses = Test01::orderBy('id')->paginate(5);




        $arrStu =Array('course'=>$course , 'doctor'=>$doctor , 'req'=>$req  );
        
        $arrReq =Array('req'=>$req );


        return view('courses.stupage')->with('courses', $courses);
    }


    public function index($id){

        $course = Test01::find($id);

        return view('courses.reason')->with('course',$course);
    }


    /*
     this the validation and how the data save to Database 
    */ 

    public function store(Request $request , $id)
    {

        $course = Test01::find($id);

        $this->validate($request,[
            
            'request'=>'required',

            

        ]);

        $rea =  new Requeststu();
        $rea->stu_id = auth()->user()->id;
        $rea->test_id = $id;
        $rea->request = $request->input('request');

        $rea->save();




        $courses = Test01::all();
        $req = Requeststu::all();
        $doctor= User::all();



        $arrStu =Array('courses'=>$courses , 'doctor'=>$doctor , 'req'=>$req  );
        


        return redirect(route('Stupage'));

    }


    /*
        this will show student all his/her Request
        
    */

    public function show(){
        $reason=Requeststu::all();

        $course = Test01::all();


        $doctor= User::all();


        $arrStu =Array('course'=>$course , 'doctor'=>$doctor , 'reason'=>$reason);

        
        return view('courses.showstureason' , $arrStu);
        
    }
public function showSchedul(){
    
    $course = Test01::all();
            
    $stu = Requeststu::all();

    $dr = User::all();

    $arrStu =Array('stu'=>$stu , 'course'=>$course , 'dr'=>$dr);
    return view('courses.Schedulepage',  $arrStu) ;
}
}
