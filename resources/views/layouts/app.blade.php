<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  
      @yield('title') | UQU
    
    </title>
    <link  rel="icon"  href="{!!asset('/images/uqupic_burned.png')!!}" />

   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{asset('js/test.js')}}"></script>
 
  <script>$(document).ready(function() {
      $(document).delegate('.open', 'click', function(event){
        $(this).addClass('oppenned');
        event.stopPropagation();
      })
      $(document).delegate('body', 'click', function(event) {
        $('.open').removeClass('oppenned');
      })
      $(document).delegate('.cls', 'click', function(event){
        $('.open').removeClass('oppenned');
        event.stopPropagation();
      });
    });


    </script> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>
<body>

  <div class="header">
    <img src="/images/uqupic_burned.png"  >

    
   
    
<div class="open">
    <span class="cls"></span>
    <span>

    <ul class="sub-menu ">
     <li> <a href="/">الرئيسية</a></li>
      @if(!Auth::guest()  && Auth::user()->isadmin==1 &&  Auth::user()->isdoctor==0 )
     <li> <a href="{{route('courses.index')}}">المقررات المطروحة</a></li>
    <li><a href="/allrequest">الطلبات</a></li>

      @elseif(!Auth::guest()  && Auth::user()->isadmin== 0 &&  Auth::user()->isdoctor==1 )
     <li> <a href="/drpage">المواد</a></li>
      <li><a href="/showReqdr/{{auth::user()->id}}">الطلبات </a></li>
      <li><a href="/showReqcode">التاريخ</a></li>

      
      @elseif(!Auth::guest()&& Auth::user()->isadmin== 0 &&  Auth::user()->isdoctor==0 )
      <li><a href="/stupage"> المقررات المطروحة </a></li>
      <li><a href="/showstureason">طلباتي</a></li>
      <li><a href="/Schedulepage">جدولي</a></li>
      

      
      @endif
                        @guest
                            
                                <li><a  href="{{ route('login') }}">{{ __('تسجيل دخول') }}</a>  </li>
                            
                            @if (Route::has('register'))
                            
                                  <li>  <a href="{{ route('register') }}">{{ __('مستخدم جديد') }}</a></li>
                            
                            @endif
                        @else
                           
                                <li><a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a></li>

                              
                                  <li>  <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل حروج') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               

                        @endguest
                  
                
    
        </nav>


     
    </ul>
  </span>
  <span class="cls"></span>
</div>
</div>

<div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
    
    </section>
 


<script src="{{asset('js/app.js')}}"></script>

<script>
  
  $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var title = button.data('mytitle') 
      var description = button.data('mydescription') 
      var cat_id = button.data('catid') 
      var modal = $(this)
      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #des').val(description);
      modal.find('.modal-body #cat_id').val(cat_id);
})
  $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var cat_id = button.data('catid') 
      var modal = $(this)
      modal.find('.modal-body #cat_id').val(cat_id);
})
</script>

</body>
</html>