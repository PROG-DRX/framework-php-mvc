<?php 

namespace core\classes;

use PDO;
use PDOException;
use Exception;

class Database{

	private $conn;

	private function connect(){

		/*
		1- Ligar;
		2- Comunicar;
		3- Fechar;
		*/
		$this->conn = new PDO(
			'mysql:'.
			'host='.MYSQL_SERVER.';'.
			'dbname='.MYSQL_DATABASE.';'.
			'charset='.MYSQL_CHARSET,
			MYSQL_USER,
			MYSQL_PASS,
			array(PDO::ATTR_PERSISTENT => true)
		);

		//DEBUG
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	private function disconnect(){
		$this->conn = null;
	}

	public function select($sql, $parameters = null){

		if(!preg_match('/^SELECT/i', $sql)){
			throw new Exception('Não é uma expressão SELECT');
		}

		$this->connect();

		$results = null;

		try {

			if(!empty($parameters)){
				$execute = $this->conn->prepare($sql);
				$execute->run($parameters);
				$results = $execute->fetchAll(PDO::FETCH_CLASS);
			} else {
				$execute = $this->conn->prepare($sql);
				$execute->execute();
				$results = $execute->fetchAll(PDO::FETCH_CLASS);

			}
			
		} catch (PDOException $e) {

			return false;
		}

		$this->disconnect();

		return $results;
	}

	public function insert($sql, $parameters = null){

		if(!preg_match('/^INSERT/i', $sql)){
			throw new Exception('Base de Dadods - Não é uma expressão INSERT');
		}

		$this->connect();


		try {

			if(!empty($parameters)){
				$execute = $this->conn->prepare($sql);
				$execute->run($parameters);
			} else {
				$execute = $this->conn->prepare($sql);
				$execute->execute();
			}
			
		} catch (PDOException $e) {

			return false;
		}

		$this->disconnect();
	}

	public function update($sql, $parameters = null){

		if(!preg_match('/^UPDATE/i', $sql)){
			throw new Exception('Base de Dados - Não é uma expressão UPDATE');
		}

		$this->connect();

		$results = null;

		try {

			if(!empty($parameters)){
				$execute = $this->conn->prepare($sql);
				$execute->run($parameters);
				$results = $execute->fetchAll(PDO::FETCH_CLASS);
			} else {
				$execute = $this->conn->prepare($sql);
				$execute->execute();
				$results = $execute->fetchAll(PDO::FETCH_CLASS);

			}
			
		} catch (PDOException $e) {

			return false;
		}

		$this->disconnect();

		return $results;
	}

	public function delete($sql, $parameters = null){

		if(!preg_match('/^DELETE/i', $sql)){
			throw new Exception('Base de Dados - Não é uma expressão SELECT');
		}

		$this->connect();

		$results = null;

		try {

			if(!empty($parameters)){
				$execute = $this->conn->prepare($sql);
				$execute->run($parameters);
				$results = $execute->fetchAll(PDO::FETCH_CLASS);
			} else {
				$execute = $this->conn->prepare($sql);
				$execute->execute();
				$results = $execute->fetchAll(PDO::FETCH_CLASS);

			}
			
		} catch (PDOException $e) {

			return false;
		}

		$this->disconnect();

		return $results;
	}

	public function statement($sql, $parameters = null){

		if(preg_match('/^(SELECT|INSERT|UPDATE|DELETE)/i', $sql)){
			throw new Exception('Base de Dados - Instrução inválida');
		}

		$this->connect();

		$results = null;

		try {

			if(!empty($parameters)){
				$execute = $this->conn->prepare($sql);
				$execute->run($parameters);
				$results = $execute->fetchAll(PDO::FETCH_CLASS);
			} else {
				$execute = $this->conn->prepare($sql);
				$execute->execute();
				$results = $execute->fetchAll(PDO::FETCH_CLASS);

			}
			
		} catch (PDOException $e) {

			return false;
		}

		$this->disconnect();

		return $results;
	}

}




/*

	CRUD
	Create - INSERT;
	Read - SELECT;
	Update - UPDATE;
	Delete - DELETE

define('MYSQL_SERVER', 		'localhost')
define('MYSQL_DATABASE', 	'php_framework_mvc')
define('MYSQL_USER', '		user_php_framework_mvc')
define('MYSQL_PASS', 		'')
define('MYSQL_CHARSET', 	'utf-8')

*/