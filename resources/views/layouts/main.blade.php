<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> :: Проекты</title>
    <link rel="stylesheet" href= "{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{route('main.index')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Edica"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('main.index')}}">Проекты</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}">Категории</a>
                        </li>



                        <li class="d-flex justify-content-between">
                        
                    
                          
                            
                            @auth()
                            <a class="nav-link" href="{{route('personal.main.index')}}">Страница пользователя: {{auth()->user()->name}} </a>
                            
                            @if(auth()->user()->role === '0')
                                <a class="nav-link" href="{{route('admin.main.index')}}"><i class="fas fa-user-shield"></i> </a>
                        @else
                            
                        @endif

                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <input class="nav-link border-0 bg-red" type="submit" value="Выйти">
                                    </form>
                                </li>
            
                            </ul>
                            @endauth
                           
                            @guest()
                            
                            <a class="nav-link" href="{{route('personal.main.index')}}">Войти</a>
                            @endguest

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

   @yield('content')

   
    {{asset('')}}
    <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>