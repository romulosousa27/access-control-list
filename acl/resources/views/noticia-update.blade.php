@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>{{$noticia->title}}</h1>
    <p>{{$noticia->description}}</p>
    <b>Autor: {{$noticia->user->name}}</b>

</div>
@endsection
