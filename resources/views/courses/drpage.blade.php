@extends('layouts.app')
@section('content')



                                                                   
<ul class="responsive-table">
    <li class="table-header">
  
                                <div class="col col-1">    رقم المقرر</div>
                                <div class="col col-2">   المقرر</div>
                                <div class="col col-3">   الساعات</div>
                                <div class="col col-4">  النشاط</div>
                                <div class="col col-5"> مجموعة</div>
                                <div class="col col-6">المقر</div>
                                <div class="col col-7">المسجلين</div>  
                                <div class="col col-8">الوقت</div>
                                <div class="col col-9">الطلبات</div>  
                                
                            </li>
                            
                            
                            @foreach($course as $cor)
                           

                                

                                    
                            @if (substr($cor->doctor,1) == Auth::user()->name || $cor->doctor == Auth::user()->name )
                            <li class="table-row">           
                                <div class="col col-1">{{$cor->course_no}}</div>
                                <div class="col col-2">{{$cor->course_name}} </div>
                                <div class="col col-3">{{$cor->hours}}</div>
                                <div class="col col-4">{{$cor->activity}}</div>
                                <div class="col col-5">{{$cor->group}}</div>
                                <div class="col col-6">{{$cor->headquarters}}</div>
                                <div class="col col-7">{{$cor->registered}}</div>
                                <div class="col col-8">{{$cor->time}}</div>
                                <div class="col col-9"><a href="/showdrreason/{{$cor->id}}" class="btn btn-info pull-right ">أعرض</a></div>
                            
                              
                    
                    
                                  
                    
                          
                          
                            @endif

                            @endforeach
                            

                        </li>
                    </ul>
                                            @endsection