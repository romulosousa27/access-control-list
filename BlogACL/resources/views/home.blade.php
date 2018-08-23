@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">Dashboard</div>

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
        @can('view', $post)
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
            <b>Autor: {{$post->user->name}}</b>
            <a href="{{url("/post/$post->id/update")}}">editar</a>
            <hr>
        @endcan
    @empty
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-danger">Nenhum Post Cadastrado</p>
                </div>
            </div>
        </div>
    </div>

    @endforelse
</div>
@endsection
