<?php
// ************************************************
// This file has been written by David Domingues
// you are free to use it and change it as you need
// but i will ask you to keep this header on the file
// and never remove it.
// webrickco@gmail.com
// ************************************************
// PHP Document
namespace webrickco\model {
    class CRUD {
		var $model;
		var $arr_fields = array();
		
        public function __set($name, $value) 
		{ 
			$this->$name = $value; 
		} 
        
        function __construct($model, $tableName) 
		{
			$arr_tables = array();
			$tableFound = false;
			$this->model=$model;
			$arr_tables = $this->model->getTables();
			
			foreach ($arr_tables as $table) {
				if ($table == $tableName)
					$tableFound=true;
			}
			if (!$tableFound)
				die("This table does not exists in the database!");
			
			$this::createFieldsProp($tableName);
			
            return 0;
        }
        
		private function createFieldsProp($tableName) 
		{
			$this->arr_fields = $this->model->getFields($tableName);
			
			foreach($this->arr_fields as $columns) {
				if(!property_exists($this, $columns['Field'])) { 
					$this->$columns['Field'] = '';
				}
			}
		}
		
        function create($tableName)
        { 
            print 'insert';
			
			foreach($this->arr_fields as $columns) {
				print_r($columns);
			}
			print 'qq'.$this->specialeventprice;
        }
    }
}
?>