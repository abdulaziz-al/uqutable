@extends('layouts.app')
@section('title','Reason')
@section('content')
@include('layouts.errmsg')


<form action="/request/{{$course->id}}" method="post"role="form">
<div style="margin-left: 5%">
    <legend> Explain your Request </legend>

{{csrf_field()}}

<div class="form_groub">
<label for="course" name="course">Class : {{$course->course_name}}   </label>
</div>

<div class="form_groub">
<label for="group" name="group"> Group :{{$course->group}} </label>

</div>



<div class="form_groub">
<label for="request">write your Request </label>
<div style="width: 50%">
<textarea class="form-control" rows="3" name="request" ></textarea>
</div>
</div>

<button type="submit" class="btn btn-primary ">Sent</button>
</div>
</div>

</form>


@endsection