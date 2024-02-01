@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar novo usuário</h1>
</div>
    <form class="row g-3" method="POST" action="{{route('cadastrar.usuario')}}">
        @csrf
        <div class="col-md-12">
            <label class="form-label">Nome</label>
            <input type="text" value=" {{ @old('name')}} " class="form-control @error('name') is-invalid @enderror" name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <label class="form-label">Email</label>
            <input type="text" value=" {{ @old('email')}} " class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <label class="form-label">Senha</label>
            <input type="password" value="{{ @old('password')}}" class="form-control @error('password') is-invalid @enderror" name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
