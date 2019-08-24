
@extends('layouts.app')
@section('title','Add course')
@section('content')
@include('layouts.errmsg')
    

<div style=" margin-left: 10% " >
    <div style="width: 80%" >
<form action="{{route('reg')}}" method="post"role="form">
    
    {{csrf_field()}}

    <legend>مقرر جديد  </legend>
    <div class="form-group">
    <label for="class">رقم المقرر </label>
    <input type="text" class="form-control" name="course_no" id="class" value="{{old('course_no')}}"placeholder="س....">
</div>
<div class="form-group">
    <label for="class">اسم المقرر </label>
    <input type="text" class="form-control" name="course_name" id="class" value="{{old('course_name')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">عدد الساعات  </label>
    <input type="text" class="form-control" name="hours" id="class" value="{{old('hours')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">النشاط </label>
    <input type="text" class="form-control" name="Activity" id="class" value="{{old('Activity')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">المجموعة  </label>
    <input type="text" class="form-control" name="group" id="class" value="{{old('group')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">أعلى حد  </label>
    <input type="text" class="form-control" name="mix" id="class" value="{{old('mix')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">المقر </label>
    <input type="text" class="form-control" name="Head" id="class" value="{{old('Head')}}"placeholder="class....">
</div>
<div class="form-group">
    <label for="class">الوقت </label>
    <input type="text" class="form-control" name="time" id="class" value="{{old('time')}}"placeholder="class....">
</div>

<div class="form-group">
    <label for="class">الدكنور </label>
    <input type="text" class="form-control" name="doctor" id="class" value="{{old('doctor')}}"placeholder="class....">
</div>

<button type="submit" class="btn btn-primary">حفظ</button>
</form>
</div>
</div>
@endsection