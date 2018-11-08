<?php if(!isset($_SESSION)) {session_start();}  ?>

<?php
// List of events
$Reg_no=$_SESSION['Reg_no'];
$json = array();

// Query that retrieves events


// connection to the database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
$request = "SELECT * FROM events WHERE Reg_no=?";

// Execute the query
$result = $bdd->prepare($request) or die(print_r($bdd->errorInfo()));
$result -> execute(array($Reg_no));
// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>
