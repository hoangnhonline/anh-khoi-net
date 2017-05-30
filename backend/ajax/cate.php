<?php 
session_start();
require_once "../model/Backend.php";
$model = new Backend();
$id = (int) $_POST['id'];
$sql = "SELECT * FROM cate WHERE cate_type_id = $id";
$rs = mysql_query($sql);
while($row = mysql_fetch_assoc($rs)){
	echo "<option value='".$row['id']."'>".$row['cate_name']."</option>";
}
?>