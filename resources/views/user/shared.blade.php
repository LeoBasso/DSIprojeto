@extends('base')
@section('title', 'COMPARTILHADOS COMIGO')

@section('content')
<div class="mb-5">
    <h1>DOCUMENTOS RECEBIDOS</h1>
    @if($sharedDocuments->count() > 0)
    <table class="w-full min-w-full divide-y divide-gray-200 mb-8 border rounded shadow-md">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Compartilhado por</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sharedDocuments as $document)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $document->sharedByUser->name }}</td>
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
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Ação</th>
                <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Excluir</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sharedTexts as $text)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{!! $text->content !!}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $text->sharedByUser->name }}</td>
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
