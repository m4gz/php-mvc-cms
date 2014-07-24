<?php
class admintools extends Controller
{
	private $model;
	
	protected $view_path = "application/modules/admintools/backend/view/";
	
	public function __construct() {
	}

	public function listFolders($dir) {
		$this->model = $this->loadModuleModel("admintools_model");
		return $this->model->GetListFolders($dir);
	}

	public function ListFiles($dir,$get) {
		$this->model = $this->loadModuleModel("admintools_model");
		$this->model->printListFiles($this->model->listFolderFiles($dir),$dir,$get);
	}
	
	public function PrintJs($get) {
		require $this->view_path."script.php";
	}
}
?>