<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entregador;

class EntregadorController extends Controller
{
    public function entregador(){
        
        $entregadores = Entregador::all();

        return view('entregador', ['entregadores'=>$entregadores]);
    }

    public function create() {
        return view('entregador', ['edit' => false]);
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
            'infoVeiculo' => 'nullable|string|max:255',
            ]);

            // Criar um novo objeto Produto e atribuir os valores dos campos
            $entregadorStore = new Entregador();
            $entregadorStore->nome = $request->nome;
            $entregadorStore->cpf = $request->cpf;
            $entregadorStore->dataNascimento = $request->dataNascimento;
            $entregadorStore->sexo = $request->input('sexo');
            $entregadorStore->estadoCivil = $request->estadoCivil;
            $entregadorStore->email = $request->email;
            $entregadorStore->telefoneCelular = $request->telefoneCelular;
            $entregadorStore->estado = $request->estado;
            $entregadorStore->cidade = $request->cidade;
            $entregadorStore->endereco = $request->endereco;
            $entregadorStore->numero = $request->numero;
            $entregadorStore->bairro = $request->bairro;
            $entregadorStore->infoVeiculo = $request->infoVeiculo;
            // Salvar o objeto Produto no banco de dados
            $entregadorStore->save();

            // Redirecionar de volta à página de produtos
            return redirect('/entregador');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy($identregador){
        Entregador::findOrFail($identregador)->delete();

        return redirect('/entregador')->with('msg', 'Cadastro excluido com sucesso!');
    }

    public function edit($identregador){
        $entregador = Entregador::find($identregador);

        return view('entregador.edit', ['entregador' =>$entregador]);                                                                        
    }

    public function update(Request $request, $identregador) {
        // Atualiza o entregador com base nos dados do formulário
        $entregador = Entregador::find($identregador);
        $entregador->update($request->all());
    
        // Define uma mensagem de sessão para informar ao usuário que a edição foi concluída com sucesso
        session()->flash('success', 'Registro editado com sucesso!');
    
        // Redireciona o usuário de volta para a página de listagem de produtos
        return redirect('/entregador');
    }
}
