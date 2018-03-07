<?php
require 'dbconfig/config.php';
?>
<html>
<head>
<link rel="stylesheet" href="main.css">
<script>
function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='dd-mysqli.php?cat=' + val ;
}
function disableselect()
{

<?Php
if(isset($cat) and strlen($cat) > 0){
echo "document.f1.subcat.disabled = false;";}
else{echo "document.f1.subcat.disabled = true;";}
?>

}

</script>
</head>
<body>
    <div class='a'>
      <h1>PET ADOPTION</h1>
      <ul class="h" type="none">
      <li><a class="s" href="logout.php">Logout</a></li>
     <!--<li><a class="s" href="Register">Register </a></li>-->
      <li><a class="s" href="about.php">About </a></li>
      </ul>
    </div>
	<div class="la">
    <form action="adopt.php" method="post">
	 <label>Category :</label>
    <select name="category" onchange=\"reload(this.form)\"><option value=''>Select one</option>
    <?php
       $res=mysqli_query($con,"SELECT DISTINCT category,cat_id FROM category ORDER BY category");
       while($row=mysqli_fetch_array($res)){
    ?>
    <option><?php echo $row["category"];?></option>
    <?php
    }
    ?>
    </select><br><br>
	<label>Breed :</label>
    <select name="breed">
    <?php
        $res=mysqli_query($con,"SELECT DISTINCT breed FROM category ORDER BY breed");
        while($row=mysqli_fetch_array($res)){
    ?>
    <option><?php echo $row["breed"];?></option>
    <?php
    }
    ?>
    </select><br><br>
    <label>Gender :</label>
    <select name="gender">
    <?php
       $res=mysqli_query($con,"SELECT DISTINCT gender FROM category ORDER BY gender");
       while($row=mysqli_fetch_array($res)){
    ?>
    <option><?php echo $row["gender"];?></option>
    <?php
    }
   ?>
   </select><br><br>
   <label>Color :</label>
   <select name="color">
   <?php
       $res=mysqli_query($con,"select * from adpt");
       while($row=mysqli_fetch_array($res)){
   ?>
   <option><?php echo $row["color"];?></option>
   <?php
   }
   ?>
   </select><br><br>
   <label>Size :</label>
   <select name="size">
   <?php
      $res=mysqli_query($con,"select * from adpt");
      while($row=mysqli_fetch_array($res)){
   ?>
   <option><?php echo $row["size"];?></option>
   <?php
   }
   ?>
   </select><br><br>
   <input type="submit" value="adopt" name="submit_btn">
  </form>
  </div>
  <?php
	    if(isset($_POST['submit_btn'])){
			$category=stripslashes($_POST['category']);
            $breed=stripslashes($_POST['breed']);
            $color=stripslashes($_POST['color']);
			$gender=stripslashes($_POST['gender']);
			$size=stripslashes($_POST['size']);
	        $query="INSERT INTO adpt(category,breed,color,gender,size)VALUES('$category','$breed','$color','$gender','$size')";
	        $sql=mysqli_query($con,$query);
	        if($sql){
		         echo '<script type="text/javascript">alert("done successfully")</script>';
	    	}
	        else{
		        echo '<script type="text/javascript">alert("error")</script>';
	        }
	  }
  ?>
</body>
</html>
