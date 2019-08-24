
@extends('layouts.app')
@section('title','Add course')
@section('content')
@include('layouts.errmsg')
<form action="/shownote/{{$dor->id}}" method="post"role="form">
    
    {{csrf_field()}}



     
  

    <legend>Write Note </legend>


    <div class="form_groub">
        <label for="name" name="name">Id : {{$dor->stu_id}}   </label>
        </div>



        <div class="form_groub">
            <label for="course" name="course">Request : {{$dor->request}}   </label>
            </div>
        
            
    <div class="form-group">
    <label for="note">Note</label>
    <input type="text" class="form-control" name="note" id="note" placeholder="note....">
</div>

<button type="submit" class="btn btn-primary">Sent</button>
</form>

@endsection