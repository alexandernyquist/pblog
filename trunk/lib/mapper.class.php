<?php
/*
Mapper base class

TODO:
This class should contain at least the following methods:
get($id)
get($cond)
insert($obj)
update($obj)
*/
Abstract Class Mapper
{
	public function __construct()
	{
		$this->db = DB::singleton();
	}
	
	public function all($table, $type, $cond = null)
	{
		$sql = 'SELECT * FROM ' . $table;
		
		if($cond !== null)
			$sql .= $this->getCond($cond);
		
		
		$objs = $this->db->query($sql)->fetchAll(PDO::FETCH_CLASS, $type);
		
		return $objs;
	}
	
	public function get($table, $type, $cond = null)
	{
		$sql = 'SELECT * FROM ' . $table . $this->getConds($cond);

		$obj = $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
		
		return $obj;
	}
	
	public function insert($table, $object)
	{
		$data = $object->getData();
		$columns = array_keys($data);
		
		$sql = 'INSERT INTO ' . $table . ' (' . implode($columns, ', ') . ') VALUES (\'' . implode($data, '\',\'') . '\')';
		
		echo $sql;
		
		$query = $this->db->query($sql);
	}
	
	/* Private helper functions */
	private function getConds($cond)
	{
		$sql = '';
		
		if($cond !== null)
		{
			$what = ' WHERE ';
			
			foreach($cond as $column => $value)
			{
				if(!is_int($value))
					$value = '\'' . $value . '\'';
				
				$sql .= $what . $column . ' = ' . $value;
				
				$what = ' AND ';
			}
		}
		
		return $sql;
	}
}
?>