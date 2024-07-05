<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
   public function fornecedor(){
        $fornecedores = Fornecedor::all();

        return view('fornecedor', ['fornecedores' =>$fornecedores]);
   }

   public function create(){

    return view('fornecedor', ['edit' => false]);
   }

   public function store(Request $request){

        try {
            $request ->valfornecedor_idate([
                
                'nomeEmpresa' => 'required|string|max:150',
                'cnpj' => 'required|string|max:14',
                'nomeContato' => 'required|string|max:150',
                'cargoContatoEmpresa' => 'required|string|max:150',
                'enderecoEmpresa' => 'required|string|max:150',
                'telefoneFixo' => 'required|string|max:10',
                'telefoneCelular' => 'required|string|max:15',
                'email' => 'required|string|max:150',
                'descricaoProduto' => 'required|string',

            ]);
            

            $fornecedorStore = new Fornecedor();
            $fornecedorStore ->fornecedor_id = $request->fornecedor_id;
            $fornecedorStore ->nomeEmpresa = $request->nomeEmpresa;
            $fornecedorStore ->cnpj = $request->cnpj;
            $fornecedorStore ->nomeContato = $request ->nomeContato;
            $fornecedorStore ->cargoContatoEmpresa = $request ->cargoContatoEmpresa;
            $fornecedorStore ->enderecoEmpresa = $request ->enderecoEmpresa;
            $fornecedorStore ->telefoneFixo = $request ->telefoneFixo;
            $fornecedorStore ->telefoneCelular = $request ->telefoneCelular;
            $fornecedorStore ->email = $request ->email;
            $fornecedorStore ->descricaoProduto = $request ->descricaoProduto;

            $fornecedorStore->save();

            return redirect('/fornecedor');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
   }

   public function destroy($fornecedor_id){
        Fornecedor::findOrFail($fornecedor_id)->delete();

        return redirect('/fornecedor')->with('msg', 'Cadastro excluido com sucesso');
   }

   public function edit($fornecedor_id){
        $fornecedor = Fornecedor::find($fornecedor_id);

        return view('fornecedor.edit', ['fornecedor'=>$fornecedor]);
   }

   public function update(Request $request, $fornecedor_id){

      // Atualiza o produto com base nos dados do formulário
        $fornecedor = Fornecedor::find($fornecedor_id);
        $fornecedor->update($request->all());

        // Define uma mensagem de sessão para informar ao usuário que a edição foi concluída com sucesso
        session()->flash('sucess', 'Registro editado e atualizado com sucesso');

      // Redireciona o usuário de volta para a página de listagem de fornecedor
        return redirect('/fornecedor');
   }
}
