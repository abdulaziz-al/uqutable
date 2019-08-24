@if ($errors->any())

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" > </button>
        <strong>Error</strong>
 <div>    
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
</div>
    @endif