<?php

class Admin extends Controller
{
	
	protected $view_path = "application/views/admin/";
	protected $model;
	protected $module;
	
    public function __construct()
    {	
		session_start();
		
		if(isset($_SESSION["user_id"])) {
			if($_SESSION["user_id"] == ADMIN_NAME) {
				$this->module = new module();
				parent::$is_backend = true;
			}
			else {
				$this->login();
				die(0);
			}
		}
		else {
				$this->login();
			die(0);
		}
	}

	public function index()
    {
		require $this->view_path."template/header.php";
		require $this->view_path."index.php";
		require $this->view_path."template/footer.php";
	}
	
	public function controllers()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/controller/");
		require $this->view_path."template/header.php";
		require $this->view_path."controllers.php";
		require $this->view_path."template/footer.php";

	}
	
	public function views()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/views/");
		require $this->view_path."template/header.php";
		require $this->view_path."views.php";
		require $this->view_path."template/footer.php";
	}
	
	public function models()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/models/");
		require $this->view_path."template/header.php";
		require $this->view_path."models.php";
		require $this->view_path."template/footer.php";
	}

	public function module()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/modules/");
		require $this->view_path."template/header.php";
		require $this->view_path."template/listmodules.php";
		require $this->view_path."module.php";
		require $this->view_path."template/footer.php";
	}
	
	public function config()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/config/");
		require $this->view_path."template/header.php";
		require $this->view_path."config.php";
		require $this->view_path."template/footer.php";
	}	
	
	public function libs()
    {
        $this->model = $this->loadModel('AdminModel');
		$this->editContent("application/libs/");
		require $this->view_path."template/header.php";
		require $this->view_path."libs.php";
		require $this->view_path."template/footer.php";
	}	
	
	public function logout()
    {
		unset($_SESSION["user_id"]);
		header("location:".URL."admin");
	}
	
    public function login()
    {
		if(isset($_GET["name"]) && isset($_GET["pass"])) {
			if($_GET["name"] == ADMIN_NAME && $_GET["pass"] == ADMIN_PASS) {
				$_SESSION["user_id"] = ADMIN_NAME;
				header("location:".URL."admin");
				exit(0);
			}
			else {
				require $this->view_path."login.php";	
				require $this->view_path."template/footer.php";
			}
		}
		else {
			require $this->view_path."login.php";	
          	require $this->view_path."template/footer.php";
		}
	}
	
	private function editContent($dir) 
	{
		$select = isset($_POST["file"]) ? $_POST["file"] : false;
		$new = isset($_POST["new_file"]) ? $_POST["new_file"] : false;
		$content = isset($_POST["newcontent"]) ? $_POST["newcontent"] : false;
        $this->model->editContent($dir,$select,$new,$content);
	}
}
