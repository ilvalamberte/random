
<?php


(function  () {



    if( !$_POST ) return;

    if( empty($_POST['email'])) //||
    //!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
return;



if( strlen($_POST['password']) < 4 || strlen($_POST['password']) > 20 )

return;




$admin = ['email'=>'lamberteilva@gmail.com', 'name'=>'Ilva'];


session_start();
$_SESSION['flight'] = $flight;
header('Location: index2.php');

}) ();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">

    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
    <title>LOGIN</title>
</head>
<body>




</main>


<main class=" bg-white pa4 black-80">
  <form action="login.php" method="POST" class="measure center">
    <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
      <legend class="f4 fw6 ph0 mh0">Sign In</legend>
      <div class="mt3">
        <label class="db fw6 lh-copy f6" for="email-address">Email</label>
        <input name="email" type="text" maxlength="100" data-validate="email" class="pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
      </div>
      <div class="mv3">
        <label class="db fw6 lh-copy f6" for="password">Password</label>
        <input name="password" type="password" maxlength="100" class="b pa2 input-reset ba bg-transparent hover-bg-black hover-white w-100">
      </div>
  
    </fieldset>
    <div class="">
    <button onClick="return validateForm()" class="f6 link dim ph3 pv2 mb2 dib white bg-dark-green" >LOGIN</button>
    </div>
    <div class="lh-copy mt3">
     
    </div>
  </form>
</main>

</body>
</html>