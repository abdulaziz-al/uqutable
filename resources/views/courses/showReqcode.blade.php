@extends('layouts.app')

@section('content')

@if (session('msgd'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <strong>OK</strong> {{session('msgd')}}
</div>
@endif



                                                              
<ul class="responsive-table">
  <li class="table-header">

                              <div class="col col-1"> اسم الطالب </div>
                              <div class="col col-2">المقرر</div>
                              <div class="col col-3">مجموعة</div>
                              <div class="col col-4">الرسالة  </div>
                              <div class="col col-5">الرمز</div>  
                              <div class="col col-6">رد الرئيس القسم</div>
                              <div class="col col-7"></div> 
                              
                          </li>
                       

                         


                            @foreach($stu as $stus)
                            @foreach($course as $cor)
                              
                            @if (substr($cor->doctor,1) == Auth::user()->name || $cor->doctor == Auth::user()->name )
                            @if($cor->id == $stus->test_id && $stus->respon_dr != "Rejection" && $stus->respon_dr != null && $stus->respon_admin == null ) 
                            <li class="table-row">           

                                
                                    @foreach ($user as $users)
                                    @if($users->id==$stus->stu_id  )
                                    <div class="col col-1">{{$users->name}}</div>
                                    @endif
                                 @endforeach
                                    
                                 <div class="col col-2">{{$cor->course_name}}</div>
                                 <div class="col col-3">{{$cor->group}}</div>
                                 <div class="col col-4">{{$stus->request}}</div>
                                 <div class="col col-5">{{$stus->respon_dr}}</div>
                                 <div class="col col-6">{{$stus->respon_admin}}</div>

                                 <div class="col col-6"> <form method="post" action="/recode/{{$stus->id}}">
                                        {{csrf_field()}}
                                        {{  method_field('PUT')}}
                                        <input type="hidden" name="_method" />
                                        <button class="btn btn-danger">rejection</button>
                                        
                                        </form> </div>
                            </li>
                                    @elseif($cor->id == $stus->test_id && $stus->respon_dr != "Rejection" && $stus->respon_dr != null && $stus->respon_admin!=null)
                                    
                                    @foreach ($user as $users)
                                    @if($users->id==$stus->stu_id  )
                                    <li class="table-row">           

                                    <div class="col col-1">{{$users->name}}</div>
                                 @endif
                                 @endforeach
                                    
                                 <div class="col col-2">{{$cor->course_name}}</div>
                                 <div class="col col-3">{{$cor->group}}</div>
                                 <div class="col col-4">{{$stus->request}}</div>
                                 <div class="col col-5">{{$stus->respon_dr}}</div>
                                 <div class="col col-6">{{$stus->respon_admin}}</div>
                                 <div class="col col-7"></div>    
                                    @endif
                                @endif
                                @endforeach

                            @endforeach
                            

                            </li>
                          </ul>
                        

                       
                        @endsection