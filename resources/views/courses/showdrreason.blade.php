@extends('layouts.app')

@section('content')

@if (session('msg'))
    <div class="alert ">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <script>
        window.alert("Accepted")
        
         </script>
</div>
@endif
@if (session('msgd'))
    <div class="alert ">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <script>
                window.alert("Rejection")
                
                 </script>
</div>
@endif





                                                                 
<ul class="responsive-table">
    <li class="table-header">
  
                                <div class="col col-1"> اسم الطالب </div>
                                <div class="col col-2">الطلب</div>
                                <div class="col col-3"></div>  
                                <div class="col col-4"></div>
                                
                            </li>
                         


                            @foreach($stu as $stus)

                            @if($stus->test_id == $name)
                                

                                @if ($stus->respon_dr == null)
                                    
                                @foreach ($user as $users)

                                        @if ($stus->stu_id == $users->id)
                                                                        <li class="table-row">           

                                        <div class="col col-1">{{$users->name}}</div>
                                
                                @endif
                                @endforeach

                                <div class="col col-2">{{$stus->request}}</div>                         
                        
                            <div class="col col-3"><form method="post" action="{{route('code',[$stus->id])}}">
                                {{csrf_field()}}
                                {{  method_field('PUT')}}
                                <input type="hidden" name="_method"  />
                            <button class="btn btn-success"> Accept</button>

                                
                            </form> </div>    

                                    
                        
                                <div class="col col-6"> <form method="post" action="/showdrreason/{{$stus->id}}">
                                        {{csrf_field()}}
                                        {{  method_field('PUT')}}
                                        <input type="hidden" name="_method" />
                                        <button class="btn btn-danger">rejection</button>
                                        </form> </div>                 

                            

                            
                             
                            @endif
                        @endif
                        
                        @endforeach
                        

                                    
                
                                </li>



                                

                </ul>
         
                              @endsection