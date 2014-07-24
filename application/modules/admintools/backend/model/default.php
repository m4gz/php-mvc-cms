<?php
class admintools_model 
{
	
	private function compare_f($a,$b) 
	{
		if(strpos($a,".php") === false) return 1;
		if(strpos($b,".php") === false) return 0;
	}

	public function GetListFolders($dir)
	{
		$ffs = scandir($dir);
		usort($ffs, array($this, 'compare_f'));
		foreach($ffs as $k=>$ff){
			if($ff != '.' && $ff != '..'){
				$return[] = $ff;
				}
			}
		return $return;
	}
	
	public function listFolderFiles($dir)
	{
		$ffs = scandir($dir);
		usort($ffs, array($this, 'compare_f'));
		$return = false;
		foreach($ffs as $k=>$ff){
			if($ff != '.' && $ff != '..'){
				if(is_dir($dir.'/'.$ff))  {
					$recur = $this->listFolderFiles($dir.'/'.$ff);
					if($recur) {
						$return[$dir][] = $this->listFolderFiles($dir.'/'.$ff);
					}
				}
				else {
				$return[$dir][] = $ff;
				}
			}
		}
		return $return;
	}
	
	public function printListFiles($arr,$dir,$get_param,$in_dir = "")
	{
		foreach($arr as $each) {
			if(is_array($each)) {
				if(key($each) != "0") {
					$in_dir = key($each);
					$cut_dir = substr($in_dir,strlen($dir)+1);
					$selected = "";
					if($get_param == $cut_dir) {
						$selected = "selected ";
					}
					echo "<option ".$selected."value=".$cut_dir.">".$cut_dir."</option>";
				}
				$this->printListFiles($each,$dir,$get_param,$in_dir);
			} 
			else {
				$cut_dir = substr($in_dir,strlen($dir)+1)."/";
				$selected = "";
				echo $get_param. "----". $cut_dir.$each;
				if($get_param == $cut_dir.$each) {
					$selected = "selected ";
				}
				echo "<option ".$selected."value=".$cut_dir.$each.">~ ".$each."</option>";
			}
		}
	}

}
?>