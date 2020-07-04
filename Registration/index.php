<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Full Name</label>
  	  <input type="text" name="fullname" value="<?php echo $fullname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
      <div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">
  	</div>
       <div class="input-group">
  	  <label>Whats App Number</label>
  	  <input type="text" name="whatsappnumber" value="<?php echo $whatsappnumber; ?>">
  	</div>
      <div class="input-group">
  	  <label>Marital Status</label>
  	  <input type="text" name="maritialstatus" value="<?php echo $maritialstatus; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Native Location</label>
  	  <input type="text" name="location" value="<?php echo $location; ?>">
  	</div>
      <!--<div class="input-group">
           Gender:  
           <form action="#" ,ethod=""post">
  <input type="radio" name="gender" value="<?php echo $gender ?>"> Male
  <input type="radio" name="gender" value="<?php echo $gender ?>"> Female
  <input type="radio" name="gender" value="<?php echo $gender ?>"> Other  
    </form>
  	</div>-->
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	
  </form>
</body>
</html>
