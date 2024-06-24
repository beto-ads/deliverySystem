<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function cliente(){
        
        $clientes = Cliente::all();

        return view('cliente', ['clientes'=>$clientes]);
    }

    public function create() {
        return view('cliente', ['edit' => false]);
    }

    public function store(Request $request){
        try {
            //code...
            // Definir regras de validação
            $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'dataNascimento' => 'required|date',
            'sexo' => 'required|string|in:masculino,feminino',
            'estadoCivil' => 'required|string',
            'email' => 'required|email|max:255',
            'telefoneCelular' => 'required|string|max:15',
            'estado' => 'required|string',
            'cidade' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            
            ]);

            // Criar um novo objeto Produto e atribuir os valores dos campos
            $clienterStore = new cliente();
            $clienterStore->nome = $request->nome;
            $clienterStore->cpf = $request->cpf;
            $clienterStore->dataNascimento = $request->dataNascimento;
            $clienterStore->sexo = $request->input('sexo');
            $clienterStore->estadoCivil = $request->estadoCivil;
            $clienterStore->email = $request->email;
            $clienterStore->telefoneCelular = $request->telefoneCelular;
            $clienterStore->estado = $request->estado;
            $clienterStore->cidade = $request->cidade;
            $clienterStore->endereco = $request->endereco;
            $clienterStore->numero = $request->numero;
            $clienterStore->bairro = $request->bairro;
            
            // Salvar o objeto Produto no banco de dados
            $clienterStore->save();

            // Redirecionar de volta à página de produtos
            return redirect('/cliente');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy($id){
        Cliente::findOrFail($id)->delete();

        return redirect('/cliente')->with('msg', 'Cadastro excluido com sucesso!');
    }

    public function edit($id){
        $cliente = Cliente::find($id);

        return view('cliente.edit', ['cliente' =>$cliente]);                                                                        
    }

    public function update(Request $request, $id) {
        // Atualiza o clienter com base nos dados do formulário
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
    
        // Define uma mensagem de sessão para informar ao usuário que a edição foi concluída com sucesso
        session()->flash('success', 'Registro editado com sucesso!');
    
        // Redireciona o usuário de volta para a página de listagem de produtos
        return redirect('/cliente');
    }
}
