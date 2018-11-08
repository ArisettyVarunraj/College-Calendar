<?php session_start();  ?>
<html>
<head>
	<title>Student Login | Amrita School of Engineering Bangalore</title>
	 <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blood Donation">
        <meta name="keywords" content="donate,blood,recipients,blood group">
        <meta name="author" content="Jayaraj, Varun Raj,Lava Kumar,Venkatesh">
        <meta charset="utf-8">
        <link rel="icon" href="images/icon.png">
        <title>Amrita School of Engineering</title>
        <link rel="stylesheet" href="css/style.css">
</head>
<body bgcolor="#eeccff">
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
                        <li><a href="ssup.php">Student Signup</a></li>
                        <li class="current"><a href="ssin.php">Student Singin</a></li>
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
<p align="center">
<img   src="projpic.png"   width="500" height="100" >
</p>
<form action="ssin.php" method="post">

<h2 style="color:#440066;font-size:40px;"><center>Student Signin<center></h2> 
 <p style="text-align:center;">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="reg_no" required>
</p>
<br>
 <p style="text-align:center;">
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
<p>
<br>

   <p style="text-align:center;">     
      <button type="submit" name="sbmt">Login</button></p>
<p style="text-align:center;">     
      <button type="submit">Forgot password??</button></p>
     
 </form>
 <?php

$_SESSION['userstatus']="";

if(isset($_POST["sbmt"])) 
{
	
	$cn=makeconnection();			

			$s="select *from students where Reg_no='" . $_POST["reg_no"] . "' and password='" .$_POST["psw"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["Reg_no"]=$_POST["reg_no"];
       $_SESSION['userstatus']="yes";
//header("location:donor/index.php");
echo "<script>location.replace('home.php');</script>";
	}
	else
	{
		echo "<script>alert('Invalid User Name Or Password');</script>";
	}
		
		}	
?> 

</body>
</html>