

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "vistaar");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//Calculaitng the time out for the music room - only one hour slots allowed
$time_out = $_POST['time_in']+1;

 // MySQL INJECTION
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);
$time_in = mysqli_real_escape_string($link, $_REQUEST['time_in']);
$instrument = mysqli_real_escape_string($link, $_REQUEST['instrument']);


$sql = "INSERT INTO appointments (name,email, date, time_in, time_out, instrument) VALUES ('$name', '$email', '$date', '$time_in', 'time_out', instrument')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
