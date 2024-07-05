<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function usuario()
    {

        $usuarios = Usuario::all();

        return view('usuario', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuario', ['edit' => false]);
    }

    public function store(Request $request)
    {
        try {
            //code...
            // Definir regras de validação
            $request->validate([
                'nome' => 'required|string|max:255',

            ]);

            // Criar um novo objeto Usuario e atribuir os valores dos campos
            $usuarioStore = new Usuario();
            $usuarioStore->nome = $request->nome;

            // Salvar o objeto Usuario no banco de dados
            $usuarioStore->save();

            // Redirecionar de volta à página de Usuarios
            return redirect('/Usuario');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();

        return redirect('/Usuario')->with('msg', 'Cadastro excluido com sucesso!');
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        return view('usuario.edit', ['usuario' => $usuario]);
    }

    public function update(Request $request, $id)
    {
        // Atualiza o Usuario com base nos dados do formulário
        $Usuario = Usuario::findOrFail($id);
        $Usuario->update($request->all());

        // Define uma mensagem de sessão para informar ao usuário que a edição foi concluída com sucesso
        session()->flash('success', 'Registro editado com sucesso!');

        // Redireciona o usuário de volta para a página de listagem de Usuarios
        return redirect('/Usuario');
    }
}
