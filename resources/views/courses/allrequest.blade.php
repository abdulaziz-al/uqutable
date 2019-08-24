                                           

                                       @extends('layouts.app')

                                       @section('content')
                                       
                                       @if (session('msg'))
                                           <div class="alert ">
                                               <button type="button" class="close" data-dismiss="alert" ></button>
                                               <script>
                                                window.alert("تم الموافقة ")
                                                
                                                 </script>
                                       </div>
                                       @endif
                                       
                                       
                                       @if (session('msgN'))
                                           <div class="alert ">
                                               <button type="button" class="close" data-dismiss="alert" ></button>
                                               <script>
                                                window.alert(" تم حفظ الملاحظة و سوف يتم ارسالها ")
                                                
                                                 </script>
                                       </div>
                                       @endif
                                       
                                                                   
                                         <ul class="responsive-table">
                                           <li class="table-header">
                                         
                                                                       <div class="col col-1">    اسم الطالب </div>
                                                                       <div class="col col-2">   اسم المقرر</div>
                                                                       <div class="col col-3">   المجموعة</div>
                                                                       <div class="col col-4">  الطلب </div>
                                                                       <div class="col col-5"> كود الدكتور</div>
                                                                       <div class="col col-6"></div>
                                                                       <div class="col col-7"></div>  
                                                                   </li>
                                                                   
                                                                           
                                                               
                                                               
                                       
                                       
                                                                   @foreach($stu as $stus)
                                                                   
                                                                   
                                                                   @foreach ($user as $users)
                                       
                                                                   @foreach ($course as $courses)
                                                                       
                                                                       
                                                                   
                                       
                                                                     
                                                                  
                                                                   
                                       
                                                                           
                                                                   @if ($stus->respon_admin == null &&$stus->respon_dr != "Rejection" && $stus->stu_id == $users->id && $stus->test_id == $courses->id)
                                                                   <li class="table-row">           
                                                                        <div class="col col-1">   <a href="/Scheduleadmin/{{$stus->stu_id}}" >{{$users->name}}</a></div>
                                                                        <div class="col col-2">{{$courses->course_name}} </div>
                                                                        <div class="col col-3">{{$courses->group}}</div>
                                                                        <div class="col col-4">{{$stus->request}}</div>
                                                                        <div class="col col-5">{{$stus->respon_dr}}</div>
                                                                       
                                       
                                                                           @if ($stus->respon_dr != null && $stus->respon_dr != "Rejection" )
                                                                           <div class="col col-6"><form method="post" action="/accadmin/{{$stus->id}}">
                                                                               {{csrf_field()}}
                                                                               {{  method_field('PUT')}}
                                                                               <input type="hidden" name="_method"  />
                                                                               <button class="btn btn-success">Accept</button>
                                                                               </form> </div>
                                           
                                           
                                           
                                           
                                                                           {{method_field('PUT')}}
                                                                           <div class="col col-7"> <a href="/shownote/{{$stus->id}}" class="btn btn-danger pull-right ">Note</a></div>
                                                                       
                                                                           @else
                                                                           <div class="col col-6"></div>
                                                                           <div class="col col-7"></div>
                                                                           
                                       
                                                                           
                                                                           @endif
                                                                       
                                                                           @endif 
                                                                      
                                                                           
                                       
                                                                     
                                                                       
                                                                           @endforeach
                                       
                                                                   @endforeach
                                                                   
                                                                              </li>
                                                                       
                                                                   @endforeach
                                                                   
                                       
                                       
                                                                           </li>
                                         </ul>
                                       
                                                               @endsection
