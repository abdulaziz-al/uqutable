@extends('layouts.app')

@section('content')




<ul class="responsive-table">
    <li class="table-header">
         
                            
        <div class="col col-1">اسم المقرر</div>
        <div class="col col-2"> رقم المقرر </div>
        <div class="col col-3">المجموعة</div>
        <div class="col col-4">الطلب  </div>
        <div class="col col-5">رد الدكتور </div>
        <div class="col col-6">رد رئيس القسم</div>
                            
    </li>
                            @foreach($reason as $stu)
                            @if(Auth::user()->id == $stu->stu_id )
                            <li class="table-row">           

            

                                    
                                    @foreach($course  as $cor )

                           @if ($cor->id == $stu->test_id)
                           <div class="col col-1">{{$cor->course_name}}</div>
                           <div class="col col-2">{{$cor->course_no}}</div>
                           <div class="col col-3">{{$cor->group}}</div>
                           


                                    @endif
                                    @endforeach


                                    <div class="col col-4">{{$stu->request}}</div>


                                    @if($stu->respon_dr != null &&$stu->respon_dr != "Rejection" && $stu->respon_admin =="Accept")
                                    <div class="col col-5"><div style="color:green;"> accept </div></div>
                                    
                                    <div class="col col-5"><div style="color:green;"> accept </div></div>

                                    @elseif($stu->respon_dr != null && $stu->respon_dr != "Rejection" && $stu->respon_admin == null && $stu->respon_admin != "Rejction")
                                    <div class="col col-6"><div style="color:green;"> accept </div></div>                                
                                    
                                    <div class="col col-6"></div>

                                    @elseif($stu->respon_dr != null &&$stu->respon_dr != "Rejection" && $stu->respon_admin !=null  ) 

                                    <div class="col col-7"><div style="color:green;"> accept </div></div>
                                    <div class="col col-7">{{$stu->respon_admin}}</div>


                                @elseif($stu->respon_dr == "Rejection" && $stu->respon_admin == null)
                                <div class="col col-8"><div style="color:tomato;"> Rejection </div></div>
                                
                                <div class="col col-8">-------</div>
                                @else
                                <div class="col col-1"></div>
                                <div class="col col-1"></div>
                                    @endif
                            
                                  
                           
                            @endif
                            @endforeach
                            

                            </li>
</ul>

                        @endsection