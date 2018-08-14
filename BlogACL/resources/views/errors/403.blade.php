@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">Acesso Negado!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você não tem autorização para isso!
                </div>
            </div>
            <div>
                <a href="{{ URL::previous() }}"><button class="btn btn-danger">Voltar</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
