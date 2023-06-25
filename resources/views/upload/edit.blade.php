@extends('base')
@section('title', 'Editar Texto')

@section('content')

<form action="{{ route('upload.updateText', $text->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="conteudo" class="block text-sm font-medium text-gray-700">Conteúdo:</label>
        <textarea name="conteudo" class="tinymce-editor border border-gray-300 rounded-md px-3 py-2 w-full h-40"></textarea>
     </div>
    <button  type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-300 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Salvar</button>
</form>
@endsection