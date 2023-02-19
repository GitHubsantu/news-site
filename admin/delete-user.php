<?php
include "config.php";
if ($_SESSION['user_role'] == 0) {
header("Location: {$site_url}admin/post.php");
}
$u_id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id = {$u_id}";
if (mysqli_query($conn, $sql)){
header("Location: {$site_url}admin/users.php");
}else {
  echo "<p style='color:red;taxt-align:center;margin: 10px 0;>Can\'t Delete this User Record...!!!</P>";
}
mysqli_close($conn,$sql);
?>
