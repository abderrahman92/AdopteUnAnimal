<?php

namespace Core;

use \PDO;

class Database
{

	private $dbName;
	private $dbUser;
	private $dbPass;
	private $dbHost;
	private $pdo;

	public function __construct($dbName, $dbUser, $dbPass, $dbHost)
	{
		$this->dbName = $dbName;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
		$this->dbHost = $dbHost;
	}

	private function getPDO()
	{
		if ($this->pdo == null) {
			$pdo = new PDO('mysql:dbname=' . $this->dbName . ';host=' . $this->dbHost, $this->dbUser, $this->dbPass);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	public function query($query)
	{
		$request = $this->getPDO()->query($query);
		$datas = $request->fetchAll(PDO::FETCH_OBJ);
		//$datas = $request->fetchAll();
		return $datas;
	}

	public function prepare($query, $values)
	{
		$request = $this->getPDO()->prepare($query);
		$request->execute($values);
		$datas = $request->fetchAll(PDO::FETCH_OBJ);
		return $datas;
	}
}
