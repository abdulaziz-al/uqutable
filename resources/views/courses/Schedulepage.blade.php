@extends('layouts.app')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <strong>OK</strong> {{session('msg')}}
</div>
@endif
                                                           
<ul class="responsive-table">
    <li class="table-header">
                                
        <div class="col col-1">اسم المقرر </div>
        <div class="col col-2">الدكتور </div>
        <div class="col col-3">المجموعة</div>
        <div class="col col-4">الوقت</div>
                               
    </li>
                         


                            @foreach($stu as $stus)
                                
                            

                              
                            @if(Auth::user()->id == $stus->stu_id)
     
            
                                    @if ($stus->respon_dr != null && $stus->respon_admin == "Accept")
                                        
                                        
                            @foreach ($course as $courses)
                            @if ($stus->test_id == $courses->id)
                       

                            <li class="table-row">           

                            <div class="col col-1">{{$courses->course_name}}</div>

                            <div class="col col-2">{{$courses->doctor}}</div>

                            <div class="col col-3">{{$courses->group}}</div>

                            <div class="col col-4">{{$courses->time}}</div>
                                @endif

                                    @endforeach
                                    
                                    

                                    @endif
                                @endif
                                
                                

                            @endforeach
                            


                            </li>
</ul>

                        @endsection