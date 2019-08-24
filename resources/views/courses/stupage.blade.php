
@extends('layouts.app')
@section('content')


<h3>The courses </h3>


@if(count($courses) > 0)
    {{$courses->links()}}

                                                                 
    <ul class="responsive-table">
        <li class="table-header">
             

            <div class="col col-1">رقم المقرر</div>
            <div class="col col-2">إسم المقرر</div>
            <div class="col col-3">الساعات</div>
            <div class="col col-4">النشاط</div>
            <div class="col col-5">المجموعة</div>
            <div class="col col-6">المقرر</div>
        
            <div class="col col-7">الوقت</div>
            <div class="col col-8">الدكتور</div>
            
            <div class="col col-9"></div>
        </li>
        @foreach($courses as $cor  )
        <li class="table-row">           

            

            <div class="col col-1">{{$cor->course_no}}</div>
            <div class="col col-2">{{$cor->course_name}}</div>
            <div class="col col-3">{{$cor->hours}}</div>
            <div class="col col-4">{{$cor->activity}}</div>
            <div class="col col-5">{{$cor->group}}</div>
            <div class="col col-6">{{$cor->headquarters}}</div>
            <div class="col col-7">{{$cor->time}}</div>
            <div class="col col-8">{{$cor->doctor}}</div>
                @if ($cor->mix == $cor->registered)
                <div class="col col-9"><a href="/request/{{$cor->id}}"  class="btn btn-info pull-right ">Request </a></div>
                @else 
                <div class="col col-1"></div>
                @endif
                
            
            @endforeach   
        
        </li>
    </ul>

                                         
                      @else 
                      @endif          

                                                     

                

                        @endsection