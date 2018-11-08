<?php if(!isset($_SESSION)) {session_start();}  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

  <link href='./lib/fullcalendar.min.css' rel='stylesheet'/>
  <link href='./lib/fullcalendar.print.css' rel='stylesheet' media='print'/>

        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Blood Donation">
        <meta name="keywords" content="donate,blood,recipients,blood group">
        <meta name="author" content="Jayaraj, Varun Raj,Lava Kumar,Venkatesh">
        <meta charset="utf-8">
        <title>Amrita School of Engineering</title>
        <link rel="stylesheet" href="../css/style.css">
   
  <script src='./lib/jquery.min.js'></script>
  <script src='./lib/moment.min.js'></script>
  <script src='./lib/jquery-ui.custom.min.js'></script>
  <script src='./lib/fullcalendar.min.js'></script>
  <script>

    $(document).ready(function () {
      function fmt(date) {
        return date.format("YYYY-MM-DD HH:mm");

      }

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },

        events: "events.php",

        // Convert the allDay from string to boolean
        eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
            event.allDay = true;
          } else {
            event.allDay = false;
          }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
          var title = prompt('Event Title:');
          if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: 'add_events.php',
              data: 'title=' + title + '&start=' + start + '&end=' + end,
              type: "POST",
              success: function (json) {
                //alert('Added Successfully');
              }
            });
            calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
            );
          }
          calendar.fullCalendar('unselect');
        },

        editable: true,
        eventDrop: function (event, delta) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });
        },
        eventClick: function (event) {
          var decision = confirm("Do you want to remove event?");
          if (decision) {
            $.ajax({
              type: "POST",
              url: "delete_event.php",
              data: "&id=" + event.id,
              success: function (json) {
                $('#calendar').fullCalendar('removeEvents', event.id);
                //alert("Updated Successfully");
              }
            });


          }

        },
        eventResize: function (event) {
          var start = fmt(event.start);
          var end = fmt(event.end);
          $.ajax({
            url: 'update_events.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
              //alert("Updated Successfully");
            }
          });

        }

      });

    });

  </script>
  <style>

    body {
      text-align: center;
      font-size: 14px;
      font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

    }

    #calendar {
      width: 900px;
      margin: 0 auto;
    }

  </style>
</head>
<body>
  <?php include('../function.php'); ?>
    <?php

    if($_SESSION['userstatus']=="")
    {
    //header("location:../login.php");
        echo "<script>location.replace('login.php');</script>";
    }
    
    ?>
     <?php
            
    $cn=makeconnection();
            $s="select * from students where Reg_no='" . $_SESSION["Reg_no"] . "'";
            
    $q=mysqli_query($cn,$s);
    $r=mysqli_num_rows($q);
    
    $data=mysqli_fetch_array($q);
    $name=$data[2];
    
    $id=$data[0];
    //echo $name;
    mysqli_close($cn);

?>
<header>
            <div class="container">
                <div id="branding">
                    <a href="index.php"> <img src="../projpic.png" width="160" height="80"></a>
                </div>
                <nav>
                    <ul>
                        <li class="current"><a href="../index.php" >Home</a></li>
                        <li><a href="../ssup.php">Student Signup</a></li>
                        <li><a href="../ssin.php">Student Singin</a></li>
                        <li><a href="../fsup.php">Faculty Signup</a></li>
                        <li><a href="../fsin.php">Faculty Singin</a></li>
                        
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
<p id="Welcome">Welcome   <?php echo @$name;  ?>
     <?php echo $_SESSION['Reg_no'] ?>
</p>
 
<div id='calendar'></div>
</body>
</html>
