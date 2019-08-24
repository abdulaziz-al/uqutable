@extends('layouts.app')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" ></button>
        <strong>OK</strong> {{session('msg')}}
</div>
@endif

               
                  <table  >
                            <tr>
                                
                                <th>Class</th>
                                <th>Doctor</th>
                                <th>Group</th>
                                <th>Time</th>
                                <th></th>
                                <th></th>
                            </tr>
                         


                            @foreach($stu as $stus)
                            
                                

                            
                                  
                                
                                <tr>
                                    @if ($stus->stu_id == $name && $stus->respon_dr != null && $stus->respon_admin == "Accept" )
                                        
                                    @foreach ($course as $courses)

                                    @if ($courses->id == $stus->course_id)
                                        
                                    <td>{{$courses->class}}</td>
                                    @foreach ($user as $users)
                                   @if($users->id==$courses->doctor_id  )
                                <td>{{$users->name}}</td>
                                @endif
                                @endforeach
                                    <td>{{$courses->group}}</td>
                                    
                                    <td>{{$courses->time}}</td>
                                    @endif

                                    @endforeach
                                    <td></td>
                                    <th></th>

                              
                                    @endif

                                @endforeach
                        
                            


                        </table>

                        @endsection