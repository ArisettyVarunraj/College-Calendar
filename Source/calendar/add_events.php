<?php if(!isset($_SESSION)) {session_start();}  ?>

<?php
// Values received via ajax
$Reg_no=$_SESSION['Reg_no'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// connection to the database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
} catch (Exception $e) {
    exit($e);
}

// insert the records
$sql = "INSERT INTO events (title, start, end,Reg_no) VALUES (:title, :start, :end, :Reg_no )";
$q = $bdd->prepare($sql);
$q->execute(array(':title' => $title, ':start' => $start, ':end' => $end, ':Reg_no'=>$Reg_no));
?>