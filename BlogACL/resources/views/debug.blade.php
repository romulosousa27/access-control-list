@extends('layouts.app')

@section('content')

<div class="container">
    <ul class="list-group">
        <li class="list-group-item bg-success text-uppercase text-white">Usuário: {{$user}}</li>
        <!-- REGRAS -->
        @foreach ( $roles as $role )
            <li class="list-group-item">{{$role->name}}</li>
        @endforeach
    </ul>
</div>

@endsection
