<?php 

namespace App\Controller;

use App\Model\Contato;

class ContatosController extends Controller{

   /**
    * Lista os contatos
   */
   public function listar()
   {
   	$contatos = Contato::all();
   	return $this->view('contato/listar', ['contatos' => $contatos]);
   }

    /**
     * Mostrar formulario para criar um novo contato
    */
    public function formulario()
    {
    	return $this->view('contato/cadastrarEditar');
    }

    /**
     * Mostrar formulário para editar um contato
    */

    /**
     * Salvar o contato submetido pelo formulário
    */
    public function editarSalvar()
    {
        $contato = null;
        if(isset($_GET['id'])) {
            $id      = $_GET['id'];
            $contato = Contato::find($id);
            return $this->view('contato/cadastrarEditar', ['contato' => $contato]);
        }
        else if(isset($_GET['criar'])){
            $contato           = new Contato;
        }        
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        if ($contato->save()) {
            return $this->listar();

        }
    }

    /**
     * Atualizar o contato conforme dados submetidos
    */
    public function atualizar()
    {
    	$id                = $_GET['id'];
    	$contato           = Contato::find($id);
    	$contato->nome     = $this->request->nome;
    	$contato->telefone = $this->request->telefone;
    	$contato->email    = $this->request->email;
    	$contato->save();

    	return $this->listar();
    }

    /**
     * Apagar um contato conforme o id informado
    */
    public function excluir()
    {
        $id      = $_GET['id'];
    	$contato = Contato::destroy($id);
    	return $this->listar();
    }
}