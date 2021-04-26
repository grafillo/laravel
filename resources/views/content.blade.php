@extends("layout.app")

@section ("title")
    Авторизация аякс
@endsection

@section ("content")
    <div class="">

        @if (session('success'))

            <div class="alert alert-danger">
                {{session('success')}}

            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>

            </div>
        @endif

            <div class="text-left text-success">
            <h5> {{$name_category->category}}</h5>
            </div>
        @foreach($category as $cont)

{{--                @foreach ($content->type as $cont)--}}

                @include('inc.topic')

{{--                    @endforeach--}}

        @endforeach

            <div class="d-flex justify-content-center ">

                {{$category->links()}}

            </div>


    </div>

@endsection


