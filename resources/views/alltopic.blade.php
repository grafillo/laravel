@extends("layout.app")

@section ("title")
   Мои статьи
@endsection

@section ("content")
    <div class="text-left text-success">
        <h6>Мои статьи</h6>
    </div>


    @if (session('success'))

        <div class="alert alert-danger">
            {{session('success')}}

        </div>
    @endif

    @foreach ($content as $cont)

        @include('inc.topic')

    @endforeach


@endsection

