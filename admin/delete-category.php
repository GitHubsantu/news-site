<?php
include "config.php";
$u_id = $_GET['id'];
$sql = "DELETE FROM category WHERE category_id = {$u_id}";
if (mysqli_query($conn, $sql)){
header("Location: {$site_url}admin/category.php");
}else {
  echo "<p style='color:red;taxt-align:center;margin: 10px 0;>Can\'t Delete this Category...!!!</P>";
}
mysqli_close($conn,$sql);
?>
