@extends("layout.app")

@section ("title")
    Авторизация аякс
@endsection

@section ("content")
    <h3>Создать новую статью</h3>

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
            <form action="{{ route('addtopic') }}" method="post" enctype="multipart/form-data">

                 @csrf
                <div class="form-group">
                    <label for="title">Введите название</label>
                    <input type="text" name="title" placeholder="Название" value="{{old('title')}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="message">Текст статьи</label>
                    <textarea  placeholder="Текст статьи" name="message"  class="form-control">{{old('message')}}</textarea>
                </div>

                <div>
                    <label>Выберите категорию:</label>
                    <select  class="form-select form-select-sm" name="category">
                        @foreach($header_categories as $cat)
                        <option value="{{$cat->alias}}">{{$cat->category}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="image" >
                </div>

                <button type="submit" class="btn btn-primary navbar-inverse mt-3" >Опубликовать</button>
            </form>

        @endif

    </div>

@endsection
