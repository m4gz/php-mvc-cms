<div>
<center>
<h3>modules</h3>
<table>
<tr>
<?php
$array = $this->module->admintools->listFolders("application/modules/");
foreach($array as $each) {
?>
<td><a href="<?php echo URL; ?>admin/module?file=<?php echo $each; ?>"><?php echo $each; ?></a></td>
<?php
}
?>
</tr>
</table>
</center>
</div>