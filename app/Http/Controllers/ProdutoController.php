<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;


class ProdutoController extends Controller
{
    public function product(){
        
        $produtos = Produto::all();

        return view('produto', ['produtos'=>$produtos]);
    }

    public function create() {
        return view('produto', ['edit' => false]);
    }
    

    public function store(Request $request){
        try {
            //code...
            // Definir regras de validação
            $request->validate([
                'nomeProduto' => 'required|string|max:255',
                'categoria' => 'required|string|max:255',
                'quantidade' => 'required|integer|min:0',
                'valorProduto' => 'required|numeric|min:0',
                'descricaoProduto' => 'required|string',
            ]);

            // Criar um novo objeto Produto e atribuir os valores dos campos
            $produtoStore = new Produto();
            $produtoStore->nomeProduto = $request->nomeProduto;
            $produtoStore->categoria = $request->categoria;
            $produtoStore->quantidade = $request->quantidade;
            $produtoStore->valorProduto = $request->valorProduto;
            $produtoStore->descricaoProduto = $request->descricaoProduto;

            // Salvar o objeto Produto no banco de dados
            $produtoStore->save();

            // Redirecionar de volta à página de produtos
            return redirect('/produto');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy($id){
        Produto::findOrFail($id)->delete();

        return redirect('/produto')->with('msg', 'Cadastro excluido com sucesso!');
    }

    public function edit($id){
        $produto = Produto::find($id);

        return view('produto.edit', ['produto' =>$produto]);                                                                        
    }

    public function update(Request $request, $id) {
        // Atualiza o produto com base nos dados do formulário
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
    
        // Define uma mensagem de sessão para informar ao usuário que a edição foi concluída com sucesso
        session()->flash('success', 'Registro editado com sucesso!');
    
        // Redireciona o usuário de volta para a página de listagem de produtos
        return redirect('/produto');
    }
    
    
    
}
