@extends('layouts.App')
@section('title','Courses')
@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <strong>OK</strong> {{session('msg')}}
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@elseif (Session::has('warnning'))
 <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
@endif

<h3>المقررات المطورحة </h3>


@if(count($courses) > 0)
<div>
{{$courses->links()}}
</div>
<ul class="responsive-table">
    <li class="table-header">
  
                                <div class="col col-1">رقم المقرر</div>
                                <div class="col col-2">اسم المقرر</div>
                                <div class="col col-3">الساعات </div>
                                <div class="col col-4">النشاط</div>
                                <div class="col col-5">المجموعة</div>
                                <div class="col col-6">المقر </div>
                                <div class="col col-7">أعلى حد</div>  
                                <div class="col col-8">المسجلين</div>
                                <div class="col col-9">الوقت</div> 
                                <div class="col col-10">الدكتور</div> 
                                <div class="col col-11"></div>
                                
                            </li>
             
        @foreach($courses as $cor  )

        <li class="table-row">           
            <div class="col col-1">{{$cor->course_no}}</div>
            <div class="col col-2">{{$cor->course_name}} </div>
            <div class="col col-3">{{$cor->hours}}</div>
            <div class="col col-4">{{$cor->activity}}</div>
            <div class="col col-5">{{$cor->group}}</div>
            <div class="col col-6">{{$cor->headquarters}}</div>
            <div class="col col-7">{{$cor->mix}}</div>
            <div class="col col-8">{{$cor->registered}}</div>
            <div class="col col-9">{{$cor->time}}</div>
            <div class="col col-10">{{$cor->doctor}}</div>
            <div class="col col-11"></div>
        
          
            @endforeach   


                </li>
</ul>




               {!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
                <div class="row">
                   <div class="col-xs-10 col-sm-10 col-md-10">
                 
                        <div class="form-group">
                            {!! Form::label('sample_file',' تحميل ملف:',['class'=>'col-md-3']) !!}
                            <div class="col-md-9">
                            {!! Form::file('courses', array()) !!}
                            {!! $errors->first('courses', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    {!! Form::submit('تحميل',['class'=>'btn btn-success']) !!}
                    </div>
                </div>
               {!! Form::close() !!}

               <a href="{{route('reg')}}" class="btn btn-info ">إضافة مقرر جديد </a>

        
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>

                   <a href="{{ route('product.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - Excel xls</a>
                    <a href="{{ route('product.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - Excel xlsx</a>
                    <a href="{{ route('product.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - CSV</a>
                 
                    <br/><Br/>
        
   


@else

{!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
<div class="row">
<div class="col-xs-10 col-sm-10 col-md-10">

<div class="form-group">
{!! Form::label('sample_file',' تحميل ملف :',['class'=>'col-md-3']) !!}
<div class="col-md-9">
{!! Form::file('courses', array()) !!}
{!! $errors->first('courses', '<p class="alert alert-danger">:message</p>') !!}
</div>
</div>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 ">
{!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
</div>
</div>
<a href="{{route('reg')}}" class="btn btn-info ">إضافة مقرر جديد </a>

@endif











@endsection