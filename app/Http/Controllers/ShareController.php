<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Text;
use App\Models\User;

class ShareController extends Controller
{
    public function indexDocument(Document $document)
    {
        $users = User::all();

        return view('share.document', compact('users', 'document'));
    }

    public function indexText(Text $text)
    {
        $users = User::all();

        return view('share.text', compact('users', 'text'));
    }


    public function savePermissions(Request $request)
    {
        $documentId = $request->input('document_id');
        $userIds = $request->input('user_ids', []);

        $document = Document::find($documentId);

        if (!$document) {
            return redirect()->back()->with('erro', 'Documento não encontrado');
        }

        // Define o ID do usuário atual como o compartilhador
        $document->shared_by = auth()->id();
        $document->save();

        // Aqui verifica se o usuário atual tem permissão para compartilhar
        $document->users()->sync($userIds);

        return redirect()->route('uploads.view')->with('sucesso', 'Documento compartilhado com sucesso');
    }


    public function saveTextPermissions(Request $request)
    {
        $textId = $request->input('text_id');
        $userIds = $request->input('user_ids', []);

        $text = Text::find($textId);

        if (!$text) {
            return redirect()->back()->with('erro', 'Documento não encontrado');
        }

        // Define o ID do usuário atual como o compartilhador
        $text->shared_by = auth()->id();
        $text->save();

        // aqui verifica se o usuário atual tem permissão para compartilhar
        $text->users()->sync($userIds);

        return redirect()->route('uploads.view')->with('sucesso', 'Texto compartilhado com sucesso');
    }

    public function showSharePage(Document $document, Text $text)
    {
        $users = User::all();

        // Obtém os documentos compartilhados apenas para o usuário logado
        $sharedDocuments = $document->sharedDocuments()->where('user_id', auth()->id())->get();

        // Obtém os textos compartilhados apenas para o usuário logado
        $sharedTexts = $text->sharedTexts()->where('user_id', auth()->id())->get();

        // Obtém o conteúdo do texto compartilhado
        $textContent = $text->content;

        return view('share.show', compact('document', 'users', 'text', 'sharedDocuments', 'sharedTexts', 'textContent'));
    }
}
