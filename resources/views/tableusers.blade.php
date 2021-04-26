@extends("layout.app")

@section ("title")
    Галерея
@endsection

@section ("content")
<table class="table  text-center">
    <thead class="table-light">
    <tr >
        <th scope="col">id</th><th  scope="col">имя</th><th scope="col">мэил</th><th scope="col">роль</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr >
            <th scope="col" width="10%">{{$user->id}}</th><td >{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->role}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
    @endsection
