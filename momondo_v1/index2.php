<?php 


session_start();





require 'users.php';

$flights = getFlights();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
    <title>Document</title>
</head>
<body>
    


<table class="tableCont" id="table2">


<thead>
<tr>



<th class="f4 measure-narrow lh-title ma2">ID</th>
<th class="f4 measure-narrow lh-title ma2">FROM</th>

<th class="f4 measure-narrow lh-title ma2">TO</th>
<th class="f4 measure-narrow lh-title ma0">WAITING TIME</th>

<th class="f4 measure-narrow lh-title ma0">FLIGHT TIME</th>
<th class="f4 measure-narrow lh-title ma0">DATE</th>
<div class="center">
<th class="f2 measure-narrow lh-title mv0">ACTIONS</th>
</div>
</tr>

</thead>
<tbody>

<?php foreach($flights as $flight):?>

<tr>

<td><?php echo $flight['id'] ;?></td>
<td><?php echo $flight['from'] ;?></td>
<td><?php echo $flight['to'] ;?></td>
<td><?php echo $flight['waitingTime'] ;?></td>
<td><?php echo $flight['flightTime'] ;?></td>
<td><?php echo $flight['date'] ;?></td>



<div class="center">

<td>

<a class="f6 link dim ph3 pv2 mb2 dib white bg-dark-green" href="view.php?id=<?php echo $flight['id'] ?>" class="btn">View</a>
<a class="f6 link dim ph3 pv2 mb2 dib white bg-dark-green" href="update.php?id=<?php echo $flight['id'] ?>" class="btn">Update</a>
<a class="f6 link dim ph3 pv2 mb2 dib white bg-dark-green" href="delete.php?id=<?php echo $flight['id'] ?>" class="btn">Delete</a>
</td>

</div>



</tr>

<?php endforeach;; ?>
</tbody>

</table>

<div class="center">
<a class="f3 link dim ph3 pv2 mb2 dib white bg-dark-green mr0"  href="create.php" class="tc">CREATE</a>

<a class="f3 link dim ph3 pv2 mb2 dib white bg-dark-green mr0"  href="logout.php">LOGOUT</a>
</div>
</body>
</html>