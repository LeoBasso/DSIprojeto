@extends('base')
@section('title', 'COMPARTILHAR TEXTO')

@section('content')
<div class="flex justify-center">
    <form action="{{ route('share.saveTextPermissions') }}" method="POST" class="border rounded shadow-md p-6">
        @csrf
        <input type="hidden" name="text_id" value="{{ $text->id }}" />

        @if($users->count() > 0)
            <table class="w-full min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-center">
                                <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum usuário encontrado.</p>
        @endif

        <div class="flex justify-center">
            <button  type="submit" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-yellow-300 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Compartilhar</button>
        </div>
    </form>
</div>
@endsection
