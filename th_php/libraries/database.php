<?php
class Database{
	public $pdo, $sql, $cursor;
	
	function database(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=ban_sach_online_db","root","");
    }
}
