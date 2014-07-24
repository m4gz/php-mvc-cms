<?php
class login extends Controller_modules 
{
	public $template = array("template/header.php","template/footer.php");
	
	private $model;
	
	public function __construct() {
		echo "__construct <br>";
	}
	
	public function optionsList($dir,$get) 
	{
		$this->model = loadModuleModel("default");
		$this->printListFiles($this->listFolderFiles($dir),$dir,$get);	
	}
	
	public function callit() {
		echo "callit <br>";
	}

}
?>