<?php include "header.php";
include "config.php";
if ($_SESSION['user_role'] == 0) {
header("Location: {$site_url}admin/post.php");
}
if (isset($_POST['sumbit'])) {
include 'config.php';
$id = $_GET['id'];
$caa_id = mysqli_real_escape_string($conn,$_POST['cat_id']);
$u_category = mysqli_real_escape_string($conn,$_POST['cat_name']);
$sql1 = "SELECT category_name FROM category WHERE category_name = '{$u_category}'";
$result = mysqli_query($conn,$sql1) or die('conection Failed!!!');
if (mysqli_num_rows($result) > 0) {
  echo "<p style='color:red;taxt-align:center;margin: 10px 0;'>Category Already Exists.</p>";
} else {
  $sql = "UPDATE category SET category_name = '{$u_category}' WHERE category_id = '{$caa_id}'";
  mysqli_query($conn,$sql);
  header("Location: {$site_url}admin/category.php");
      }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                include 'config.php';
                 $c_id = $_GET['id'];
                 $sql2 = "SELECT * FROM category WHERE category_id = {$c_id}";
                 $result2 = mysqli_query($conn, $sql2) or die("connection Failed!!!!!");
                 if (mysqli_num_rows($result2) > 0) {
                   while ($row = mysqli_fetch_assoc($result2)){

                 ?>
                  <form action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                    }
                    }
                   ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
