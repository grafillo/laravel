@extends("layout.app")

@section ("title")
    Галерея
@endsection

@section ("content")

       @foreach ($content as $cont)

        <div class="row mb-0 mt-3 " ><h4>{{$cont->title}}</h4></div>
        <div class="img-container text-danger">{{$cont->getCategory->category}}</div>

        <div class="row ">

            <div class="col mt-0">
            <div class="img-container mb-3 border " >

                @foreach($cont->getImage as $image)
                    <img src=" {{asset('/storage/').'/'.$image->source}}" class="img-responsive"  width="100%" >
                @endforeach
            </div>

                {{$cont->text}}
            </div>
        </div>

        @can('update',$cont)
            <div class="mt-1">
                <a type="button" class="btn btn-warning" id="btndelete"   href="{{ route("edittopic", $cont->id) }}">Редактировать</a>
                <a type="button" class="btn btn-danger"    href="{{ route("deletetopic", $cont->id) }}">Удалить</a>
            </div>
        @endcan

    @endforeach


@endsection


