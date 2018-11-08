<!DOCTYPE html>
<html>
<head>
  <title>Student Signup | Amrita School of Engineering </title>
   <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blood Donation">
        <meta name="keywords" content="donate,blood,recipients,blood group">
        <meta name="author" content="Jayaraj, Varun Raj,Lava Kumar,Venkatesh">
        <meta charset="utf-8">
        <link rel="icon" href="images/icon.png">
        <title>Amrita School of Engineering</title>
        <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body bgcolor="#ccffff"> 
  <?php include('function.php'); ?>
 <header>
            <div class="container">
                <div id="branding">
                    <a href="index.php"> <img src="projpic.png" width="160" height="80"></a>
                </div>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

                <nav>
                    <ul>
                        <li><a href="index.php" >Home</a></li>
                        <li class="current"><a href="ssup.php">Student Signup</a></li>
                        <li><a href="ssin.php">Student Singin</a></li>
                        <li><a href="fsup.php">Faculty Signup</a></li>
                        <li><a href="fsin.php">Faculty Singin</a></li>
                        
                    </ul>
            <div class="container1" >
                  
                <?php  if (isset($_SESSION['Reg_no'])) : ?>
                    <strong></strong>

                    

                <?php endif ?>
             </div>
                </nav>
            </div>
        </header>
<form method="post" action="ssup.php">

<p align="center">
<img   src="projpic.png"   width="500" height="100" ></p><hr>

 <h1 style="color:#006666" size="50"><center>Student Sign Up</center></h1>
      <p><center>Please fill in this form to create an account.</center></p>
      <hr>
<p align="center">
    <label for="First Name"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="first_name" required>
<label for="Last Name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="last_name" required>
<br>
<br>


      <label for="id"><b>Student Reg-Id</b></label>
      <input type="text" placeholder="Enter id" name="reg_no" required>
<br>
<br>
      <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
<br>
<br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
<br>
<br>

      <label for="psw-repeat"><b>Re-enter Password</b></label>
      <input type="password" placeholder="Re-enter Password" name="psw-repeat" required>
<br>
<br>
       <label for="number"><b>Phone number</b></label>
    <input type="text" name="ph_no"  minlength="10" maxlength="13" required>  
<br>
</p>
      <p align="center"><b>Department:</b>
<select name="dept">
  <option value=" CSE">COMPUTER SCIENCE</option>
  <option value="ECE">ELECTRONICS AND COMUNICATION </option>
  <option value="EEE">ELECTRICAL AND ELECTRONICS</option>
  <option value="EIE">ELECTRONICS AND INSTRUMENTATATION</option>
 <option value="MECH">MECHANICAL</option>
</select>
</p>
<br>
<p align="center">

  <button type="submit" class="btn" name="sbmt" value ="Resitred">Sign Up</button>
 <button type="reset" class="cancelbtn">Reset</button>
</p>
    </div>
 
</div>

 </form>
<?php
if(isset($_POST["sbmt"])) {
  $cn=makeconnection();
  $s="insert into students(Reg_no,first_name,last_name,email,password,ph_no,dept) values('" . $_POST["reg_no"] ."','" . $_POST["first_name"] . "','" . $_POST["last_name"] . "','" . $_POST["email"] . "','" . $_POST["psw"] . "','" . $_POST["ph_no"] . "','" . $_POST["dept"] .  "')";
  mysqli_query($cn,$s);
  mysqli_close($cn);    
  if($s>0)
  {
  echo "<script>alert('Record Save');</script>";
  }
  else
  {echo "<script>alert('Record save');</script>";
  }
    
}

// Check if image file is a actual image or fake image

    

// Check if file already exists

?>
</body>
</html>
