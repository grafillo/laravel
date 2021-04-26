@extends("layout.app")

@section ("title")
    Регистрация
@endsection

@section ("content")

    <div class="col text-center">
{{--        <x-auth-validation-errors class="mb-1" :errors="$errors" />--}}

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

        <h4>Вход</h4>

        <form method="POST" action="{{ route('login') }}">
        @csrf

         <div>Email address</div>
         <div>
            <input type="email" value="{{ old('email')}}" name="email" class="input-group-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required />
        </div>

            <div class="mt-1">Password</div>
         <div>
                <input type="password"  name="password" class="input-group-sm" id="exampleInputPassword1" required />
          </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <button type="submit" class="btn btn-primary">Войти</button>

        </form>

    </div>

@endsection

