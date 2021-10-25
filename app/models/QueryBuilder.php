<?php

/**
 *Строитель запросов к базе данных
 */
namespace App\models;

use PDO;
use App\models\Connection;
use Aura\SqlQuery\QueryFactory;

class QueryBuilder
{
	private $pdo;
	private $queryFactory;

	function __construct()
	{
		$this->queryFactory = new QueryFactory('mysql');
		$config = include '../config/config.php';
		$this->pdo = Connection::make($config['connect']);
	}

	public function queryPdo(){
		return $this->pdo;
	}

	public function getPagination($tible, $setPaging){
		$select = $this->queryFactory->newSelect();

		$select
		->cols(['*'])
		->from($tible)
		->setPaging($setPaging)
		->page($_GET['page'] ?? 1);



		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		return $sth->fetchAll(PDO::FETCH_OBJ);  
	}

	public function getAll($table){

		$select = $this->queryFactory->newSelect();
		$select
		->cols(['*'])
		->from($table);

		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		return $sth->fetchAll(PDO::FETCH_OBJ);
	}

	public function getOne($id, $table){
		$select = $this->queryFactory->newSelect();

		$select
		->cols(['*'])
		->from($table)
		->bindValue('id', $id)
		->where('id = :id');

		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		return $sth->fetch(PDO::FETCH_OBJ);
	}

	public function insert($table, $data){
		$insert = $this->queryFactory->newInsert();
		$insert
		->into($table)
		->cols($data);


		$sth = $this->pdo->prepare($insert->getStatement());

		$sth->execute($insert->getBindValues());
	}

	public function update($id, $table, $data){
		$update = $this->queryFactory->newUpdate();

		$update
		->table($table)
		->cols($data)
		->where('id = :id')
		->bindValue(':id', $id);


		$sth = $this->pdo->prepare($update->getStatement());

		$sth->execute($update->getBindValues());
	}

	public function delete($id,$table){
		$delete = $this->queryFactory->newDelete();

		$delete
		->from($table)
		->where('id = :id')
		->bindValue('id', $id);

		$sth = $this->pdo->prepare($delete->getStatement());

		$sth->execute($delete->getBindValues());
	}

	public function search($title, $table){
		$select = $this->queryFactory->newSelect();

		$select
		->cols(['*'])
		->from($table)
		->bindValue('title', $title)
		->where('title = :title');

		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		return $sth->fetch(PDO::FETCH_OBJ);
	}

/*
*amount Возврашает количество данных в таблице
*принисает название таблицы $table
* 
 */
public function amount($table){
	$select = $this->queryFactory->newSelect();
	$select
	->cols(['*'])
	->from($table);

	$sth = $this->pdo->prepare($select->getStatement());

	$sth->execute($select->getBindValues());

	return $sth->rowCount();
}


}