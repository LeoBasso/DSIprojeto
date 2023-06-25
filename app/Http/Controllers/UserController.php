<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function createSave(Request $data)
    {
        $data = $data->toArray();

        //CRIPTOGRAFA
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return redirect()->route('user.login')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function login(Request $data)
    {
        if (request()->isMethod('POST')) {
            $login = $data->validate([
                'name' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($login)) {
                return redirect()->route('upload');
            } else {
                return redirect()->route('user.login')->with('erro', 'Usuário ou senha inválidos');
            }
        }
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }

    public function viewShared()
    {
        $user = auth()->user();
        $sharedDocuments = $user->sharedDocuments;
        $sharedTexts = $user->sharedTexts;

        return view('user.shared', compact('sharedDocuments', 'sharedTexts'));
    }
}
