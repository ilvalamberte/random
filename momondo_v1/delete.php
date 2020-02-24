<?php 



require 'users.php';



$flightId = $_GET['id'];

deleteFlight($flightId);
//$flight  = getFlightById($flightId);

//var_dump($flight);

header("Location: index2.php");