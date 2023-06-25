<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Text;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function uploadDoc(Request $request)
    {
        $request->validate([
            // Formatos permitidos: PDF, DOC, DOCX | Tamanho máximo: 2MB
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();

        // Salvar o documento no diretório de armazenamento
        $file->storeAs('public', $filename);

        // Salvar informações do documento no banco de dados
        $document = new Document;
        $document->name = $filename;
        // Armazenar o caminho completo do arquivo
        $document->path = $file->storeAs('public', $filename);
        $document->user_id = auth()->user()->id; // Atribuir o ID do usuário logado
        $document->save();

        return redirect()->route('uploads.view')->with('sucesso', 'Documento salvo com sucesso');
    }


    public function uploadText(Request $request)
    {
        $conteudo = $request->input('conteudo');
    
        // Salvar o texto no banco de dados
        $text = new Text;
        $text->content = $conteudo;
        $text->user_id = auth()->user()->id; // Atribuir o ID do usuário logado
        $text->save();
    
        return redirect()->route('uploads.view')->with('sucesso', 'Texto salvo com sucesso');
    }
    
    public function viewUploads()
    {
        $user = auth()->user();
        $documents = $user->documents;
        $texts = $user->texts; // Adicione esta linha para buscar os textos

        return view('upload.view', compact('documents', 'texts'));
    }

    public function apagar(Document $document)
    {
        // Verifica se o método de acesso é DELETE
        if (request()->isMethod('DELETE')) {
            // Apaga o documento do banco de dados
            $document->delete();
            return redirect()->route('uploads.view')->with('sucesso', 'Documento apagado com sucesso');
        }
        return view('upload.view');
    }

    public function apagartext(Text $text)
    {
        // Verifica se o método de acesso é DELETE
        if (request()->isMethod('DELETE')) {
            // Apaga o texto do banco de dados
            $text->delete();
            return redirect()->route('uploads.view')->with('sucesso', 'Texto apagado com sucesso');
        }
        return view('upload.view');
    }

    public function editarTexto(Text $text)
    {
        return view('upload.edit', compact('text'));
    }

    public function atualizarTexto(Request $request, Text $text)
    {
        $conteudo = $request->input('conteudo');

        // Atualizar o texto no banco de dados
        $text->content = $conteudo;
        $text->save();

        return redirect()->route('uploads.view')->with('sucesso', 'Texto atualizado com sucesso');
    }
}
