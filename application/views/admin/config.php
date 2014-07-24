<form name="template" id="template" method="post">
<?php
if(isset($_GET["file"])) {
	$file = $_GET["file"];
	$is_file = strpos($file,".php");
}
else {
	$is_file = false;
}
?>
<select name="file" id="file" onchange="relocate(this);">
    <option value="new">New...</option>
<?php
	$dir = 'application/config';
	$this->module->admintools->ListFiles($dir,$file);
?>
</select>
<?php 
if($is_file === false) {
	echo $dir."/";
	if (isset($_GET["file"])) {
			if($_GET["file"] != "new") echo $file."/";
	}
?>
<input name="new_file" id="new_file" width="125">
<?php
}
?>
<textarea name="newcontent" id="newcontent">
<?php 
if($is_file) {
	echo htmlspecialchars($this->model->readFile($dir ."/". $file));
	}
else {
echo "<?php";
?>


<?php
echo "?>";
}
?>
</textarea>
<button type="submit">submit</button>
</form>
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
      lineNumbers: true,
      mode: "php",
      matchBrackets: true
    });
	
	function relocate(_this) {
		var value = _this.options[_this.selectedIndex].value;
			document.location = "?file="+value;
	}
</script>