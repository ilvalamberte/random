
<?php
require 'users.php';







if($_SERVER['REQUEST_METHOD'] === "POST") {

    //var_dump($_POST);
    
    createFlight($_POST);
    
    header ("Location: index2.php");
    }
    
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
    

<main class="pa4 bg-grey">
<h3>Create User</h3>
<form method="POST" action="" class="measure center">
    <div class="form-group tc">

<label for="">ID</label>
<input name="id" value="<?php echo $flight["id"] ?>" class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">

    </div>

    <div class="form-group tc ma1">
        
        <label for="">FROM</label>
        <input name="from" value="<?php echo $flight["from"] ?>" class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
        
            </div>

            <div class="form-group tc ma1">
        
        <label for="">TO</label>
        <input name="to" value="<?php echo $flight["to"] ?>" class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
        
            </div>

            <div class="form-group tc">
        
        <label for="">WAITING TIME</label>
        <input name="waitingTime" value="<?php echo $flight["waitingTime"] ?>"class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
        
            </div>

            <div class="form-group tc ma1">
        
        <label for="">FLIGHT TIME</label>
        <input name="flightTime" value="<?php echo $flight["flightTime"] ?>" class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
        
            </div>

            <button class="f6 link dim ph3 pv2 mb2 dib white bg-dark-green">SUBMIT</button>

</form>

</main>
</body>
</html>
