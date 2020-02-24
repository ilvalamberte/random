<?php


function getFlights() {

  return json_decode(file_get_contents("admin_data.json"), true);

  

//echo '<pre>';
    //var_dump($flights);
   // echo '</pre>';
    //exit;


}

//getFlights();



function getFlightById($id) {


    $flights = getFlights();

    foreach ($flights as $flight ) {
        if ($flight['id'] == $id) {
            return $flight;
        }
    }
return null;
}





function createFlight($data) {

$flights = getFlights();


$flights[] = $data;


file_put_contents( "admin_data.json", json_encode($flights));
return $data;

}



function updateFlight($data, $id) {


$flights = getFlights();

foreach ($flights as $i =>$flight) {
    if($flight['id'] == $id) {
$flights[$i] = array_merge($flight, $data);
    }
}


file_put_contents( "admin_data.json", json_encode($flights));

}





function deleteFlight($id) {

$flights = getFlights();

foreach($flights as $i => $flight) {
if( $flight['id'] == $id) {
array_splice($flights,$i, 1);

}


};
putJson($flights);

}




function putJson($flights) {

file_put_contents("admin_data.json", json_encode($flights));

}