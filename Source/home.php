<?php if(!isset($_SESSION)) {session_start();}  ?>
<html>
    <head>

        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blood Donation">
        <meta name="keywords" content="donate,blood,recipients,blood group">
        <meta name="author" content="Jayaraj, Varun Raj,Lava Kumar,Venkatesh">
        <meta charset="utf-8">
        <link rel="icon" href="images/icon.png">
        <title>Amrita School of Engineering</title>
        <link rel="stylesheet" href="css/style.css">
   

    </head>
<body bgcolor="white">

    <?php include('function.php'); ?>
    <?php

    if($_SESSION['userstatus']=="")
    {
    //header("location:../login.php");
        echo "<script>location.replace('login.php');</script>";
    }
    
    ?>
<p align="center">

</p>
  <?php
            
    $cn=makeconnection();
            $s="select * from students where Reg_no='" . $_SESSION["Reg_no"] . "'";
            
    $q=mysqli_query($cn,$s);
    $r=mysqli_num_rows($q);
    
    $data=mysqli_fetch_array($q);
    $name=$data[2];
    
    
    //echo $name;
    mysqli_close($cn);

?>
  <header>
            <div class="container">
                <div id="branding">
                    <a href="index.php"> <img src="projpic.png" width="160" height="80"></a>
                </div>

     

                <nav>
                    <ul>
                        <li class="current"><a href="home.php" >Home</a></li>
                        <li><a href="calendar/index.php">Calendar </a></li>
                        
                        
                    </ul>
            <div class="container1" >
                  
                <?php  if (isset($_SESSION['Reg_no'])) : ?>
                    <strong style="float: right;">Welcome   <?php echo @$name;  ?></strong>

                    <small>
                        
                        <br>
                        <a href="index.php?logout='1'" style="color: red;float: right;position: relative;">logout</a>
                    </small>

                <?php endif ?>
             </div>
                </nav>
            </div>
        </header>
 <section id="home_body">
           
                <a href="calendar/index.php" class="calendar">Click on the Calendar</a>
            
        </section>

<footer>Blood Donation , Copyrights &copy; 2017</footer>
   </body>
</html>