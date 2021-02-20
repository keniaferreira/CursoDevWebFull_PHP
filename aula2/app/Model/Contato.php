<?php 

namespace App\Model;

use Database\PDO;

class Contato extends PDO{

    private $atributos;

	protected static $tabela = 'contatos';

	public function __set(string $atributo, $valor)
	{
		$this->atributos[$atributo] = $valor;
		return $this;
	}

	public function __get(string $atributo)
	{
		return $this->atributos[$atributo];
	}

	public function __isset($atributo)
	{
		return isset($this->atributos[$atributo]);
	}

    /**
     * Salvar o contato
     * @return boolean
     */
    public function save()
    { 
    	$colunas = $this->preparar($this->atributos);
    	if (!isset($this->id)) {
    		$query = "INSERT INTO ".self::$tabela." (".
    		implode(', ', array_keys($colunas)).
    		") VALUES (".
    		implode(', ', array_values($colunas)).");";
    	} else {
    		foreach ($colunas as $key => $value) {
    			if ($key !== 'id') {
    				$definir[] = "{$key}={$value}";
    			}
    		}
    		$query = "UPDATE ".self::$tabela." SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
    	}
    	if ($conexao = self::getInstance()) {
    		$stmt = $conexao->prepare($query);
    		if ($stmt->execute()) {
    			return $stmt->rowCount();
    		}
    	}
    	return false;
    }

    /**
     * Tornar valores aceitos para sintaxe SQL
     * @param type $dados
     * @return string
     */
    private function escapar($dados)
    {
    	if (is_string($dados) & !empty($dados)) {
    		return "'".addslashes($dados)."'";
    	} elseif (is_bool($dados)) {
    		return $dados ? 'TRUE' : 'FALSE';
    	} elseif ($dados !== '') {
    		return $dados;
    	} else {
    		return 'NULL';
    	}
    }

    /**
     * Verifica se dados são próprios para ser salvos
     * @param array $dados
     * @return array
     */
    private function preparar($dados)
    {
    	$resultado = array();
    	foreach ($dados as $k => $v) {
    		if (is_scalar($v)) {
    			$resultado[$k] = $this->escapar($v);
    		}
    	}
    	return $resultado;
    }

    /**
     * Retorna uma lista de contatos
     * @return array/boolean
     */
    public static function all()
    {
    	$conexao = self::getInstance();
    	$stmt    = $conexao->prepare("SELECT * FROM ".self::$tabela.";");
    	$result  = array();
    	if ($stmt->execute()) {
    		while ($rs = $stmt->fetchObject(Contato::class)) {
    			$result[] = $rs;
    		}
    	}
    	if (count($result) > 0) {
    		return $result;
    	}
    	return false;
    }

    /**
     * Retornar o número de registros
     * @return int/boolean
     */
    public static function count()
    {
    	$conexao = self::getInstance();
    	$count   = $conexao->exec("SELECT count(*) FROM ".self::$tabela.";");
    	if ($count) {
    		return (int) $count;
    	}
    	return false;
    }

    /**
     * Encontra um recurso pelo id
     * @param type $id
     * @return type
     */
    public static function find($id)
    {
    	$conexao = self::getInstance();
    	$stmt    = $conexao->prepare("SELECT * FROM ".self::$tabela." WHERE id='{$id}';");
    	if ($stmt->execute()) {
    		if ($stmt->rowCount() > 0) {
    			$resultado = $stmt->fetchObject(Contato::class);
    			if ($resultado) {
    				return $resultado;
    			}
    		}
    	}
    	return false;
    }

    /**
     * Destruir um recurso
     * @param type $id
     * @return boolean
     */
    public static function destroy($id)
    {
    	$conexao = self::getInstance();
    	if ($conexao->exec("DELETE FROM ".self::$tabela." WHERE id='{$id}';")) {
    		return true;
    	}
    	return false;
    }

}