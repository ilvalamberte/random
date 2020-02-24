<?php


require_once('PHPMailer/PHPMailerAutoload');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->smtpAuth();
$mail->smtpSecure = 'ssl';
$mail->Host = 'smtp';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Momondo</title>
  <link rel="stylesheet" href="app.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>
  <link rel="stylesheet" href="modal.css">
</head>

<body>
  <nav>
    <a href='' class='active'>momondo</a>
    <a href=''>fly</a>
    <a href=''>hotel</a>
    <a href=''>car</a>
    <a href=''>trips</a>
    <a href=''>My trips</a>
    <a href='login.php'>login</a>

  </nav>

  <section id='search'>
<div>
    <input type="text" placeholder="from city" oninput = getCities() class="txtSearch"></input>

    <div class="cityResults"></div>
</div>

    <button> &lt;- -&gt;</button>
    <input type="text" placeholder="to city"></input>
    <input type="text" placeholder="from date"></input>
    <input type="text" placeholder="to date"></input>
    <button id='btnSearch' class="f3 link dim ph3 pv2 mb2 dib white bg-dark-green mr0">Search</button>
  </section>
  <section id="temporal">
    <img src="temporal.png">
  </section>

  <main>
    <div id='options'>Options</div>
    <div id='results'>
  
      <div id='flights'>
        <!-- <div>
          <div class='flightRoute'>
          </div>
          <div class='flightBuy'></div>
        </div> -->
        <!-- Trigger/Open the Modal -->


<!-- The Modal -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright w3-black">&times;</span>
      <p class="w3-white">Enter email</p>
      <input type="email" id="email" class="fieldset">

      <p class="w3-white">Enter phone number</p>
      <input type="text" class="fieldset">
    </div>
  </div>
</div>
      </div>

    </div>

  </main>



  <script>

      var resultsCity = document.querySelector(".cityResults");

var txtSearch = document.querySelector(".txtSearch");

    (async function getFlights() {
      var jResponse = await fetch('api-get-cities.php')
      var jData = await jResponse.json()

      var sFlightBluePrint = `
        <div class="flight">
        <div class="flightStops">
        
        {{FLIGHTSHERE}}
        
        
        
        
        </div>
        <div class="flightBuy">
        Price: <span class="price">{{price}}</span>
        <button onclick="document.getElementById('id01').style.display='block'"
class="f3 link dim ph3 pv2 mb2 dib white bg-dark-green mr0">Buy</button>
        </div>
 
        </div>

      `


 
      var flights = document.querySelector("#flights");


      var aOrderedSchedule = [];
      for (var i = 0; i < jData.length; i++) {
        var jFlight = jData[i];

        // Copy the blueprint 
        var sFlightBluePrintCopy = sFlightBluePrint;
        //replace the blueprint content
        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{price}}', jFlight.price)


       var sStops = '';
        for (var g = 0; g < jFlight.schedule.length; g++) {


            aOrderedSchedule[jFlight.schedule[g].order] = jFlight.schedule[g];


            

            var sFromDate = new Date(0)
        sFromDate.setUTCSeconds(aOrderedSchedule[i].date);
        sFromDate = sFromDate.toLocaleString('da-DK')   ;
          // console.log(jFlight.schedule[g].id)
          sStops += `
          <div>  <img class="airline-icon" src="icons/${jFlight.schedule[g].airlineIcon}"></div>
          
          <div class="flightRoute">
           <div>ID: <span class="id">{{id}}</span></div>
           <div>FROM: <span class="from">{{from}}</span></div>
           <div>TO: <span class="to">{{to}}</span></div>
           <div>Waiting time: <span class="waitingTime">{{waitingTime}}</span></div>
           <div>Flight time: <span class="flightTime">{{flightTime}}</span></div></div>
           <div>DATE: ${sFromDate}</div>

           
           `

         

          sStops = sStops.replace('{{id}}', jFlight.schedule[g].id);
          sStops = sStops.replace('{{from}}', jFlight.schedule[g].from);
          sStops = sStops.replace('{{to}}', jFlight.schedule[g].to);
          sStops = sStops.replace('{{waitingTime}}', jFlight.schedule[g].waitingTime);
          sStops = sStops.replace('{{flightTime}}', jFlight.schedule[g].flightTime)

        }

        sFlightBluePrintCopy = sFlightBluePrintCopy.replace('{{FLIGHTSHERE}}', sStops)
        
        flights.innerHTML += sFlightBluePrintCopy
      }


    })()




    //search



    async function getCities() {



 
if( txtSearch.value.length == 0 ){
        resultsCity.style.display = 'none'
        return // Return means take me out of the function
      }

      var sSearchFor = txtSearch.value;


      var url = 'api-city-search.php?cityName='+sSearchFor;
      var connection = await fetch(url);
 var sData = await connection.json();


console.log(sData);

// text
      var jData = JSON.parse(JSON.stringify(sData)); // convert text into object  JSON.parse(JSON.stringify(userData))
      var sDivCities = '' // <div>X</div><div>Y</div>
      for(var i = 0; i < jData.cities.length; i++ ){
        // Concatanate
        sDivCities += `<div onclick="selectCity(this)">${jData.cities[i].name}</div>` 
      }
      // Overwrite results
      resultsCity.innerHTML = sDivCities
      resultsCity.style.display = 'block'
    }
  

function selectCity(objectDOM){
  var sCityName = objectDOM.innerHTML
  txtSearch.value = sCityName
  resultsCity.style.display = "none"
}





  </script>


</body>



</html>