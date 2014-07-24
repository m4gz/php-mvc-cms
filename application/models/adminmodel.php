<?php
/**
admin model
**/

class AdminModel
{
	
    public function editContent($folder,$select,$new,$content)
    {		
		if($content) {
			if($select) {
				if($new) {
					if($select != "new") {
						if(strpos($select,".php") === false) {
							$this->writeFile($folder.$select."/".$new,$content);	
						}
						else {
							$this->writeFile($folder.$select.$new,$content);	
						}
					}
					else {
						$this->writeFile($folder.$new,$content);	
					}
				}
				else {
					$this->writeFile($folder.$select,$content);	
				}
			}
		}
	}
	
	public function writeFile($File,$data)
	{
		$fh = fopen($File, 'w') or die("can't open file");
		fwrite($fh, htmlspecialchars_decode($data));
		fclose($fh);
	}
	
	public function readFile($File)
	{
		$fh = fopen($File, 'r') or die("can't open file");
		$data = fread($fh, filesize($File));	
		fclose($fh);
		return $data;
	}
	
	public function getFiles($dir) 
	{
		return array_diff(scandir($dir), array('..', '.'));
	}

}
