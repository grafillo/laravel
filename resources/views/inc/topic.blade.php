

<div class="row mb-0 mt-3 " ><h5><b><a href="{{route('gettopic',$cont->id)}}">{{$cont->title}}</a></b></h5></div>
    <div class="row alert-secondary">{{$cont->getCategory->category}}</div>

    <div class="row ">

    <div class="img-container mt-0 border " >

    @foreach($cont->getImage as $image)
     <img src=" {{asset('/storage/').'/'.$image->source}}" class="img-responsive"  width="200" >
    @endforeach
    </div>
        <div class="col mt-0">
        {{Str::limit($cont->text,150, '...')}}

    </div>

</div>
<div class="text-right"><span class="small-text">Автор:{{$cont->autor}}</span></div>
@can('update',$cont)
    <div class="mt-1">
    <a type="button" class="btn btn-warning" id="btndelete"   href="{{ route("edittopic", $cont->id) }}">Редактировать</a>
    <a type="button" class="btn btn-danger"    href="{{ route("deletetopic", $cont->id) }}">Удалить</a>
    </div>
@endcan

