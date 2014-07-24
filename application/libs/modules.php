<?php
class module extends Parametres
{
	private $modules = array();
	private $current;
	
	public function __construct() {
		
	}
	public function __call($name,$args)
	{
		echo "call name ".$name;
		return $this->modules[$this->current]->$name($args);		
	}

	public function __get($name)
	{
		$this->current = $name;
		if(!isset($this->modules[$name])) {
			$this->include_path($name);
			$this->modules[$name] = new $name;
		}
		return $this->modules[$name];		
	}

	private function include_path($name) 
	{
		$isfront = parent::$is_backend ? "/backend" : "/frontend";
		include "application/modules/".$name.$isfront."/controller/default.php";
	}
}
?>