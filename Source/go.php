<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullcalendarevents";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST["submit"]) == "submit" && isset($_POST["eventTitle"]) != "")
  {
    $sql = "INSERT INTO events (title, event_date)
        VALUES ('".$_POST['eventTitle']."', '".$_POST['eventDate']."')";
    if (mysqli_query($conn,$sql)) {
        echo "New event added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
  //echo "Connected successfully";
$sql = "SELECT title, event_date as start FROM events";
$result = mysqli_query($conn,$sql); 
$myArray = array();
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }

} 
else 
{
    echo "0 results";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/
bootstrap.min.css'>
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      dayClick: function(date, jsEvent, view) {

        $("#successModal").modal("show");
        $("#eventDate").val(date.format());

      },
      events: <?php echo json_encode($myArray); ?>
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>
  <div class="modal fade" id="successModal" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
  </div>
  <div class="modal-body">
    <form action="go.php" method="post">
    <div class="form-group">
      <label for="eventtitle">Event Title:</label>
      <input type="eventTitle" name="eventTitle" class="form-control" id="eventTitle" required="">
      <input type="hidden" name="eventDate" class="form-control" id="eventDate">
    </div>
    <button type="submit" value="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
</div>
</div>
</div>

</body>
</html>