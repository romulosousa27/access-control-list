@extends('layouts.app')

@section('content')
<div class="container">
    @forelse($noticias as $n)
        <h1>{{$n->title}}</h1>
        <p>{{$n->description}}</p>
        <b>Autor: {{$n->user->name}}</b>
        <a href="{{url("/noticia/$n->id/update")}}">editar</a>
    @empty
        <p class="bg-danger">Nenhuma Noticia Vinculada</p>
    @endforelse
</div>
@endsection
