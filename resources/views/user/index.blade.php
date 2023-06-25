@extends('base')

@section('title', 'Usuários')

@section('content')

<p>Página de Usuários</p>

<a href="{{ route('user.create') }}" class="">Adicionar usuário</a>
<a href="{{ route('user.login') }}" class="">Fazer Login</a>
@endsection