<?php
// load php
class load 
{
	public static $shell;
	
	public static function init() 
	{	
		self::$shell = new shell();	
	
	}
	
	public static function module()
	{
		self::$shell->dir = "application/modules/";
		return self::$shell;
	}

}

class shell extends Parametres{

	private $modules = array();
	
	public $isfront = true;
	public $dir = "";
	
	public function __call($name,$args) 
	{
		$dir = $this->dir.$name;
		$isfront = parent::$is_backend ? "/backend" : "/frontend";
		include "application/modules/".$name.$isfront."/controller/default.php";
		
		if(!isset($this->modules[$name])) {
			$this->modules[$name] = new $name($args);
		}
			return $this->modules[$name];	
	}
	
}
?>