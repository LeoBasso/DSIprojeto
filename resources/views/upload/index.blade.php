@extends('base')

@section('title', 'UPLOAD')

@section('content')

<div class="mx-auto max-w-lg">
    <div class="mb-5">
        <table class="w-full min-w-full divide-y divide-gray-200 shadow-md border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Upload de documentos</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        <form action="{{ route('upload.doc')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <br>
                            <button type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-200 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">
                                Salvar
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-5">
        <table class="w-full min-w-full divide-y divide-gray-200 shadow-md border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Upload de textos</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        <form action="{{ route('upload.text') }}" method="POST">
                            @csrf
                            <textarea name="conteudo" class="tinymce-editor border border-gray-300 rounded-md px-3 py-2 w-full h-40"></textarea>
                            <br>
                            <button type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-200 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">
                                Salvar
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

@endsection
