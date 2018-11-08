<html>
    <head>

        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blood Donation">
        <meta name="keywords" content="donate,blood,recipients,blood group">
        <meta name="author" content="Jayaraj, Varun Raj,Lava Kumar,Venkatesh">
        <meta charset="utf-8">
        <title>Amrita School of Engineering</title>
        <link rel="stylesheet" href="css/style.css">
   
        <style>
      .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}      
body{
    background-color: #e9f0f7;
}

</style>
    </head>
<body bgcolor="white">
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
                        <li class="current"><a href="index.php" >Home</a></li>
                        <li><a href="ssup.php">Student Signup</a></li>
                        <li><a href="ssin.php">Student Singin</a></li>
                        <li><a href="fsup.php">Faculty Signup</a></li>
                        <li><a href="fsin.php">Faculty Singin</a></li>
                        
                    </ul>
            <div class="container1" >
                  
                <?php  if (isset($_SESSION['Reg_no'])) : ?>
                    <strong><?php echo $_SESSION['Reg_no']['first_name']; ?></strong>

                    <small>
                        
                        <br>
                        <a href="index.php?logout='1'" style="color: red;">logout</a>
                    </small>

                <?php endif ?>
             </div>
                </nav>
            </div>
        </header>
        <section id="showcase">
            <div class="container">
                
            </div>
        </section>



<footer>Blood Donation , Copyrights &copy; 2017</footer>
</body>
</html>
