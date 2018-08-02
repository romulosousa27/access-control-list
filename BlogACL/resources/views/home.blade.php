@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Listando todos os Posts -->
    @forelse($posts as $post)
        <h1>{{$post->title}}</h1>
        <p>{{$post->description}}</p>
        <b>Autor: {{$post->user->name}}</b>
        <a href="{{url("/post/$post->id/update")}}">editar</a>
        <hr>
    @empty
        <p>Nenhum Post Cadastrado</p>
    @endforelse
</div>
@endsection
