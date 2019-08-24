   @extends('layouts.app') 
   @section('content') 


   @if (session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <strong>OK</strong> {{session('msg')}}
</div>
@endif

      <label for="chk" class="hide-menu-btn">
        <i class="fas fa-times"></i>
      </label>
    </ul>
  </div>
 
 
  
  
  <H1 style="text-align: center">فريق المتعثرين </H1>
@endsection