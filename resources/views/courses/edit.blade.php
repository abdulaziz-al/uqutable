
@extends('layouts.app')
@section('title','Edit course')
@section('content')
@include('layouts.errmsg')


    <form action="{{route('courses.update',$course->id)}}" method="post"role="form">
        <input type="hidden" name="_method" value="PUT" />
        {{csrf_field()}}


    <legend>Edit Course </legend>
    <div class="form-group">
    <label for="class">class</label>
    <input type="text"  class="form-control-file"  name="class" id="class" value="{{$course->class}}     "placeholder="class....">
   
</div>
<div class="form-group">
    <label for="case">case</label>
    <input type="is_bool" class="form-control" name="case" value = "{{$course->case}}"id="case">
</div>
<div class="form-group">
    <label for="group">Group</label>
    <input type="text" class="form-control" name="group" id="group" value="{{$course->group}}"placeholder="">
    
</div>
<div class="form-group">
    <label for="doctor">Doctor</label>
    <input type="text" class="form-control" name="doctor" id="doctor" value="{{$course->doctors}}    "placeholder="doctor....">

</div>

<div class="form-group">
    <label for="time">Time</label>
    <input type="text" class="form-control" name="time" id="doctor" value="{{$course->time}}    "placeholder="Time....">
</div>

<div class="form-group">
    <label for="number">Number </label>
    <input type="text" class="form-control" name="number" id="number" value="{{$course->number}}
    "placeholder="Time....">
</div>


<button type="submit" class="btn btn-primary">Edit</button>
</form>

@endsection