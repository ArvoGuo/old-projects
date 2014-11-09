<?php
header ( 'Content-Type: text/html; charset=utf-8' );
class Mysql {
	private $host;
	private $user;
	private $pwd;
	private $dbName;
	private $charset;
	private $conn;
	
	public function __construct() {
		
//				$this->host = 'localhost';
//				$this->user = 'root';
//				$this->pwd = '123456';
		$this->host = '115.28.133.116';
		$this->user = 'root';
		$this->pwd = 'b4d61fb89d';
		$this->dbName = 'pictest';
		$this->charset = 'UTF8';
		$this->conn = $this->connect ( $this->host, $this->user, $this->pwd );
		$this->switchDb ( $this->dbName );
		$this->setChart ( $this->charset );
	}
	
	private function connect($h, $u, $p) {
		return mysql_connect ( $h, $u, $p );
	}
	
	public function switchDb($dbName) {
		$this->query ( 'use ' . $dbName );
	}
	
	public function setChart($char) {
		$sql = 'set names ' . $char;
		$this->query ( $sql );
	
	}
	
	public function query($sql) {
		mysql_query ( $sql, $this->conn );
	}
	public function returnQuery($sql) {
		return mysql_query ( $sql, $this->conn );
	}
	public function getAll($sql) {
		$list = array ();
		$rs = $this->returnQuery ( $sql );
		if (! $rs) {
			return false;
		}
		while ( $row = mysql_fetch_assoc ( $rs ) ) {
			$list [] = $row;
		}
		return $list;
	
	}
	public function getRow($sql) {
		$rs = $this->query ( $sql );
		if (! $rs) {
			return false;
		
		}
		return mysql_fetch_assoc ( $rs );
	}
	public function getOne($sql) {
		$rs = $this->query ( $sql );
		if (! $rs) {
			return false;
		}
		$row = mysql_fetch_row ( $rs );
		return $row [0];
	
	}
	public function updateID($id) {
		$uid;
		if (strlen ( $id ) == 1) {
			$uid = "000" . $id;
		} elseif (strlen ( $id ) == 2) {
			$uid = "00" . $id;
		} elseif (strlen ( $id ) == 3) {
			$uid = "0" . $id;
		} else {
			$uid = $id;
		}
		return $uid;
	}
	public function getNum($sql) {
		$result = mysql_query ( $sql );
		$_num = mysql_num_rows ( $result );
		return $_num;
	}
}
class info extends Mysql{
	public function insert($name,$pic2,$pic4,$btn,$ms,$fj,$sex,$age){
		date_default_timezone_set ( 'PRC' );
		$createDate = date ( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO info(
	NAME,
	PIC2,
	PIC4,
	BTN,
	MS,
	FJ,
	SEX,
	AGE,
	CREATEDATA
	) VALUES(
	'{$name}',
	'{$pic2}',
	'{$pic4}',
	'{$btn}',
	'{$ms}',
	'{$fj}',
	'{$sex}',
	{$age},
	'{$createDate}'
	)";
		$this->query($sql);
	}
	public function findAll(){
		$sql="select ID,PIC2,PIC4,BTN,MS,FJ,AGE,SEX from info";
		return $this->getAll($sql);
	}
	public function findName(){
		//$sql = "select * from table where id in (select max(id) from table group by [去除重复的字段名列表,....])"
		$sql= "select * from info as a where ID=(select min(ID) from info where NAME=a.NAME)";
			return $this->getAll($sql);
	}
	public function findSomeOne($name){
		$sql = "select * from info where NAME='{$name}'";
		return $this->getAll($sql);
	}
	public function delete(){
		$name = "周哲安";
		$sql = "delete * from info where NAME='{$name}'";
		$this->query($sql);
		echo mysql_error();
	}
	
}
class user extends Mysql {
	public function insert($uname, $usex, $utel, $uemail, $uaddress, $laccount, $lpassword) {
		date_default_timezone_set ( 'PRC' );
		$ucreateDate = date ( 'Y-m-d H:i:s' );
		$sql = "INSERT INTO user(
	UNAME,
	USEX,
	UTEL,
	UEMAIL,
	UADDRESS,
	UCREATEDATE
	) VALUES(
	'{$uname}',
	'{$usex}',
	'{$utel}',
	'{$uemail}',
	'{$uaddress}',
	'{$ucreateDate}'
	)";
		$this->query ( $sql );
		//更新uid
		$id = mysql_insert_id ();
		$Uid = $this->updateID ( $id );
		$sql = "update user set UID = '{$Uid}' where ID= '{$id}'";
		$this->query ( $sql );
		$sql = "insert into userlogin (
		UID,
		LACCOUNT,
		LPASSWORD
		) values(
		'{$Uid}',
		'{$laccount}',
		'{$lpassword}'
		)";
		$this->query ( $sql );
	
	}
	public function ifHasAccount($laccount) {
		$sql = "SELECT * FROM userlogin WHERE LACCOUNT='{$laccount}'";
		$_num = $this->getNum ( $sql );
		if ($_num == 0) {
			return false;
		}
		return true;
	
	}
	public function fetchLogin($laccoutn, $lpassword) {
		$sql = "select * from userlogin where LACCOUNT='{$laccoutn}' and LPASSWORD='{$lpassword}'";
		$result = $this->returnQuery ( $sql );
		if (! mysql_fetch_assoc ( $result )) {
			return false;
		}
		return true;
	
	}
	public function getAllInfo($kind) {
		$sql = "select * from user where UKIND=$kind and UISDELETED=0";
		return $this->getAll ( $sql );
	}
	public function updateInfo($uid,$uname,$usex,$utel,$uemail,$uaddress){
		$sql = "update user set UNAME='{$uname}',USEX='{$usex}',UTEL='{$utel}',UEMAIL='{$uemail}',UADDRESS='{$uaddress}' where UID ='{$uid}'";
		if($this->returnQuery($sql)){
			return true;
		}
		return false;
	}
	public function deleteOne($uid){
		$sql = "update user set UISDELETED = 1 where UID = '{$uid}'";
		if($this->returnQuery($sql)){
			return true;
		}
		return false;
	}

}

class manager extends Mysql {
	public function fetchLogin($root, $password) {
		$sql = "select * from manager where ROOT='{$root}' and PASSWORD='{$password}'";
		$result = $this->returnQuery ( $sql );
		if (! mysql_fetch_assoc ( $result )) {
			return false;
		}
		return true;
	
	}

}

//$user = new user ();
//echo "<pre>";
//print_r($user->getAll("select * from user where UKIND=0"));
// $t = new info();
// $list = array();
// $list = $t->findName();
// echo mysql_error();
// echo "<pre>";
// print_r($list);


?>