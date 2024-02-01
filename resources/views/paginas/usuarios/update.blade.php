@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuário</h1>
</div>
    <form class="row g-3" method="POST" action="{{ route('atualizar.usuario',$findUser->id)}}">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Nome</label>
            <input type="text" value=" {{ isset($findUser->name) ? $findUser->name : @old('name')}} " class="form-control @error('name') is-invalid @enderror" name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="text" value=" {{ isset($findUser->email) ? $findUser->email : @old('email')}} " class="form-control @error('email') is-invalid @enderror" name="email">
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Senha</label>
            <input type="password" value=" {{ isset($findUser->password) ? $findUser->password : @old('password')}} " class="form-control @error('password') is-invalid @enderror" name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
@endsection
