<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
              include "config.php";
              $sql = "SELECT * FROM settings";
              $result = mysqli_query($conn, $sql) or die ("connection Failed!!!!!");
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
               ?>
                <span><a href="http://localhost:8080/news-site/"><?php echo $row['footerdesc']; ?></a></span>
              <?php }
            } ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>