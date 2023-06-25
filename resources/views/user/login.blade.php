@extends('base')

@section('title', 'LOGIN')

@section('content')

<div class="max-w-md mx-auto border">
    <form action="{{ route('user.login') }}" method="POST" class="bg-white shadow-md rounded px-8 py-6">
        @csrf
        <div class="mb-4 flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-circle text-gray-500" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
            <input type="text" name="name" id="username" placeholder="Username" class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha:</label>
            <input type="password" name="password" id="password" placeholder="Password" class="w-full border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex justify-between">
            <button type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-300 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Login</button>
            <a href="{{ route('user.create') }}" type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-300 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Adicionar usuário</a>
        </div>
    </form>
</div>

@endsection
