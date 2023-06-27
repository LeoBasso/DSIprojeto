@extends('base')
@section('title', 'COMPARTILHADOS COMIGO')

@section('content')


<div class="mb-5">
    <form action="{{ route('upload.filtrar') }}" method="GET" class="flex justify-center items-center">
        <div class="flex flex-grow">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="border border-gray-300 rounded-lg px-1 py-1">
            </div>
            <div>
                <label for="compartilhado_por">Compartilhado por:</label>
                <input type="text" name="compartilhado_por" id="compartilhado_por" class="border border-gray-300 rounded-lg px-1 py-1">
            </div>
            <div>
                <label for="data_upload">Data de Upload:</label>
                <input type="date" name="data_upload" id="data_upload" class="border border-gray-300 rounded-lg px-1 py-1">
            </div>
        </div>
        <div class="inline-flex">
            <button type="submit" class="mr-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-200 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Filtrar</button>
            <a href="{{ route('user.shared') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-red-200 focus:ring focus:ring-red-100">Limpar</a>
        </div>
    </form>
</div>

<div class="mb-5">
    <h1>DOCUMENTOS RECEBIDOS</h1>
    @if($sharedDocuments->count() > 0)
    <table class="w-full min-w-full divide-y divide-gray-200 mb-8 border rounded shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Compartilhado por</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data de Upload</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sharedDocuments as $document)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->sharedByUser->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->created_at->format('d/m/Y') }}</td>
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
    <p>Nenhum documento compartilhado encontrado.</p>
    @endif
</div>
<div class="mb-5">
    <h1>TEXTOS RECEBIDOS</h1>
    @if($sharedTexts->count() > 0)
    <table class="w-full min-w-full divide-y divide-gray-200 mb-8 border rounded shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Compartilhado por</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data de Upload</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Excluir</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sharedTexts as $text)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{!! $text->content !!}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $text->sharedByUser->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $text->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <a href="{{ route('upload.edittext', $text->id) }}" class="text-blue-600 hover:underline">Editar</a>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    <form action="{{ route('upload.apagartext', $text->id) }}" method="POST">
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
    <p>Nenhum texto compartilhado encontrado.</p>
    @endif
</div>
@endsection