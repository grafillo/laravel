<html>
    <head>
        <title>@yield ('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="http://laratest/resources/css/app.css" >
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    </head>

<body>
<div class="mb-2" >
            <header class=" d-flex justify-content-center py-3 border-bottom">

                    <ul class="nav nav-pills ">
                        <li class="nav-item"><a href="{{Route("index")}}"  class="nav-link mb-2

                        @if(Request::is('/')) active @endif">Все статьи</a></li>

                        @foreach ($header_categories as $cat)
                            <li class="nav-item"><a href="{{Route('category',$cat->alias)}}" alias='{{$cat->alias}}'
                             class="nav-link @if(Request::path() == 'get/'.$cat->alias) active @endif">{{$cat->category}}</h6> </a></li>
                          @endforeach
                    </ul>
            </header>
</div>

        <div class="container">

            <div class="row">
                <div class="col-9 col ">@yield ('content') </div>

                <div class="col-3 col text-right" >
                   @guest
                        <div class="">
                            <a type="button" class="btn btn-outline-danger me-2 btn-block" href="{{route('admin')}}">Войти как админ</a>
                        </div>
                        <div class="">
                            <a type="button" class="btn btn-outline-success me-2 btn-block" href="{{route('autologin')}}">Войти как юзер</a>
                        </div>
                        <div class="mt-1">
                            <a type="button" class="btn btn-outline-primary me-2 btn-block" href="{{route('login')}}">Вход</a>
                        </div>
                        <div class="mt-1">
                            <a type="button" class="btn btn-outline-primary btn-block" href="{{route('register')}}">Регистрация</a>
                          </div>
                    @endguest

                @auth
                    @if(Auth::user()->role=='admin')
                            <h6>Вы вошли как <span class="text-danger"> {{Auth::user()->name}} </span> </h6>
                             <a type="button" class="btn btn-success btn-block" href="{{ route('userstable')}}">Пользователи</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-primary mt-1" type="submit">Выйти</button>
                            </form>
                        @endif

                    @if(Auth::user()->role=='user')
                        @php $quantity = session('quantity');  @endphp
                        <div class="">
                            <h6>Вы вошли как <span class="text-primary"> {{Auth::user()->name}} </span> </h6>

                            <h6><a href="{{route('alltopics')}}"> Ваши статьи </a>
                              (@isset($quantity){{$quantity}}@endisset)
                                </h6>
                            <a href="{{route('indextopic')}}"><h6>Добавить статью</h6> </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-primary" type="submit">Выйти</button>
                            </form>
                        </div>
                        @endif
                @endauth
                </div>
            </div>
      </div>
</body>

    <footer class="footer bg-light text-center">
        <div class="navbar-fixed-bottom row-fluid mb-0 mt-2" >
            <p class="text-muted">hotgraf@list.ru <br> 2021</p>
        </div>
    </footer>

    <div class="modal " id="mymodal" tabindex="-1" >
        <div class="modal-dialog  modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body text-center ">

                    <p>Удалить эту запись навсегда?</p>

                    <button type="button" id="modalYes" class="btn  btn-danger" data-bs-dismiss="modal">Да</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Нет</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        console.log( document.querySelectorAll('.btn-warning'));

        var url;

        $(document).ready(function(){
            $('.btn-danger').click(function(e){

                url = $(this).attr("href");
                e.preventDefault();
                $(this).blur();
                $('.modal').modal('show');

            })

        })

        $('#modalYes').click( function (){

            $(location).attr('href',url);
        });

    </script>


</html>

