<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
      lineNumbers: true,
      mode: "php",
      matchBrackets: true
    });
	
	function relocate(_this) {
		var value = _this.options[_this.selectedIndex].value;
			document.location = "?<?php echo $get; ?>="+value;
	}
</script>