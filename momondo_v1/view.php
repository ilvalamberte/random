<?php
require 'users.php';



$flightId = $_GET['id'];
$flight  = getFlightById($flightId);

//var_dump($flight);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>
<body>
    <table>

    <tbody>

<tr>
<th>ID</th>

<td><?php echo $flight['id'] ?></td>
</tr>
<tr>
<th>FROM</th>

<td><?php echo $flight['from'] ?></td>
</tr>

<tr>
<th>TO</th>

<td><?php echo $flight['to'] ?></td>
</tr>

<tr>
<th>WAITING TIME</th>

<td><?php echo $flight['waitingTime'] ?></td>
</tr>

<tr>
<th>FLIGHT TIME</th>

<td><?php echo $flight['flightTime'] ?></td>
</tr>

    </tbody>
    </table>
</body>
</html>