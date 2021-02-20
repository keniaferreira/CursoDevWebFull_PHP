<?php

namespace Database;

class PDO
{
	private static $conexao;

	const DRIVER = "mysql";
	const HOST   = "localhost";
	const PORT   = "3306";
	const DB     = "projeto_mvc";
	const USER   = "root";
	const PASS   = "";

	public static function getInstance()	
	{
		if (is_null(self::$conexao)) {
			self::$conexao = new \PDO(self::DRIVER.':host='.self::HOST.';port='.self::PORT.';dbname='.self::DB, self::USER, self::PASS);
			self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			self::$conexao->exec('set names utf8');
		}
		return self::$conexao;
	}

}