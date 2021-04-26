@extends("layout.app")

@section ("title")
    Редактирование
@endsection

@section ("content")
    <h3>Редактирование</h3>

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

  <div class="container" >

        @if (session('success'))

            <div class="alert alert-success">
                {{session('success')}}

            </div>
        @endif

        @if (!session('success'))
            <form action="{{ route('updeittopic',$content->id) }}" method="post" enctype="multipart/form-data">

                {{--  код бесзопасности для формы --}}
                @csrf
                <div class="form-group">
                    <label for="title">Название статьи</label>
                    <input type="text" name="title" placeholder="Название" value="{{$content->title}}'" class="form-control">
                </div>

                <div class="form-group">
                    <label for="message">Текст статьи</label>
                    <textarea  placeholder="Текст статьи" name="message"   class="form-control">{{$content->text}}</textarea>
                </div>

                <div>
                    <label>Выберите категорию:</label>
                    <select  class="form-select form-select-sm" name="category">
                        @foreach($header_categories as $cat)
                            <option value="{{$cat->alias}}"    @if($content->category==$cat->alias) selected @endif
                            >
                                {{$cat->category}}
                            </option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-warning navbar-inverse mt-3" >Отредактировать</button>
            </form>

        @endif

    </div>

@endsection
