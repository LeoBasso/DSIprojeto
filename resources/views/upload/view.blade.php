@extends('base')
@section('title', 'MEUS UPLOADS')

@section('content')

<div class="mb-5">
    <form action="{{ route('upload.filtrar') }}" method="GET" class="flex justify-center items-center">
        <div class="flex flex-grow">
            <div>
                <label for="nome">Nome do arquivo:</label>
                <input type="text" name="nome" id="nome" class="border border-gray-300 rounded-lg px-1 py-1">
            </div>
            <div>
                <label for="data_upload">Data de Upload:</label>
                <input type="date" name="data_upload" id="data_upload" class="border border-gray-300 rounded-lg px-1 py-1">
            </div>
        </div>
        <div class="inline-flex">
            <button type="submit" class="mr-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-200 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Filtrar</button>
            <a href="{{ route('uploads.view') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-red-200 focus:ring focus:ring-red-100">Limpar</a>
        </div>
    </form>
</div>
<div class="mb-5">
    <h2>MEUS DOCUMENTOS</h2>
    @if($documents->count() > 0)
    <table class="w-full min-w-full divide-y divide-gray-200 border border-gray-300 shadow">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data de Upload</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Excluir</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($documents as $document)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->id }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $document->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <a href="{{ route('sharedoc.document', $document->id) }}" class="inline-flex items-center justify-center w-full gap-1.5 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Compartilhar</a>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <form action="{{ route('upload.apagar', $document->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum documento encontrado.</p>
    @endif
</div>

<div class="mb-10">
    <h1>MEUS TEXTOS</h1>
    @if($texts->count() > 0)
    <table class="w-full min-w-full divide-y divide-gray-200 border border-gray-300 shadow">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Conteúdo</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data de Upload</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Excluir</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Editar</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($texts as $text)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $text->id }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{!! $text->content !!}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $text->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <a href="{{ route('sharetext.text', $text->id) }}" class="inline-flex items-center justify-center w-full gap-1.5 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Compartilhar</a>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <form action="{{ route('upload.apagartext', $text->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <a href="{{ route('upload.edittext', $text->id) }}" class="text-blue-600 hover:underline">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum texto encontrado.</p>
    @endif
</div>
@endsection
