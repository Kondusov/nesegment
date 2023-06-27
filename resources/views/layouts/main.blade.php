<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NeSegment</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('main.index') }}"><span>NeSegment</span></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('main.index') }}">Главная <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Лоты</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                <a class="dropdown-item" href="{{ route('post.index') }}">Активные лоты</a>
                                <a class="dropdown-item" href="{{ route('post.arhiv.index') }}">Завершенные лоты</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории ТС</a>
                            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                                @foreach( $categories as $category)
                                    <a class="dropdown-item" href="{{ route('category.post.index', $category->id) }}" >{{ $category->title }}</a>
                                 @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.contacts') }}">Контакты</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personal.main.index') }}"><i class="fas fa-address-card"></i> Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" >
                                @csrf
                                <input type="submit" value="Выход" class="btn "><i class="fas fa-sign-out-alt"></i>
                            </form>        
                        </li>
                        @endauth
                        @guest()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('personal.main.index') }}"><i class="fas fa-address-card"></i> Войти</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')
    
    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
            </div>
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="#!">Политика</a>
                    <a href="#!">Правила</a>
                    <a href="#!">Карта сайта</a>
                </nav>
                <p class="mb-0">© NeSegment. 2023 <a href="https://nesegment.ru" target="_blank" rel="noopener noreferrer" class="text-reset"></a> . Все права защищены.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>