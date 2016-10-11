<?php 
class model{
	var $id;
	var $obj;
	var $table;
	function __construct($_table){
		$this->table = $_table;
		$this->id = null;
		$this->obj = null;
	}
	public function select_id($_id){
		$this->id = $_id;
		$this->obj = $this->get_data();
		if($this->obj == null){$this->id = null;return null;}
	}
	public function get($column){
		return $this->obj[$column];
	}
	private function get_data(){
		$_id = $this->id;
		$_table = $this->table;
		$sql = mysql_query("SELECT * FROM $_table WHERE id='$_id'");
		$check = mysql_num_rows($sql);
		if($check != 1){return null;}
		if($read = mysql_fetch_array($sql)){return $read;}
	}
	public function set($column,$value){
		$_id = $this->id;
		$_table = $this->table;
		if(!empty($value) and $this->obj[$column] != $value){
			$sql = "UPDATE $_table SET $column='$value' WHERE id='$_id'";
			if(mysql_query($sql)){return true;}else{return false;}
		}else{return false;}
	}
}
function getModels($table,$query=null){
	$modelList = array();
	if($query == null){
		$sql = mysql_query("SELECT id FROM $table");
	}else{
		$sql = mysql_query("SELECT id FROM $table WHERE $query");
	}
	while($read = mysql_fetch_array($sql)){
		$newModel = new model($table);
		$newModel->select_id($read["id"]);
		$modelList[] = $newModel;
	}
	return $modelList;
}
function addModel($table,$args){
	$sql = mysql_query("SHOW COLUMNS FROM $table WHERE field <> 'id'");
	$insert = "";
	$values = "";
	while($read = mysql_fetch_array($sql)){
		$column = $read['Field'];
		if(isset($args[$column])){
			$values .= "'".$args[$column]."',";
			$insert .= $column.',';
		}
	}
	$values = rtrim($values,",");
	$insert = rtrim($insert,",");
	$insert_sql = "INSERT INTO $table($insert) VALUES($values)";
	if(mysql_query($insert_sql)){
		return true;
	}else{
		return false;
	}
}
?>