<h2>Delivery Info Web Service Client </h2>
<h3>Powered by Glory Florist</h3>
<form method="post">
    <p>Select date range and click "go" to view </p>
    <label for="start">Start Date</label>
    <input type="date" name="start" value="">
    <label for="end">End Date</label>
    <input type="date" name="end" value="">
    <input type="submit" value="submit" name="submit"/>
</form>

<?php
if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $url = "http://localhost/gloryflorist/Controllers/WebServices/queryDelivery.php?start=" . $start . "&end=" . $end;
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    $result = json_decode($response);
    //$myArray = json_decode(json_encode($myObj), true);
    $array = (array) $result->deliveryList;
    foreach ($array as $a) {
        echo "<p>";
        echo "Id          : ".$a->id          ."<br/>";
        echo "Sender      : ".$a->sender      ."<br/>";
        echo "Recipient   : ".$a->recipient   ."<br/>";
        echo "Contact     : ".$a->contact     ."<br/>";
        echo "Method      : ".$a->method      ."<br/>";
        echo "Date        : ".$a->date        ."<br/>";
        echo "Timeslot    : ".$a->timeslot    ."<br/>";
        echo "Address     : ".$a->address     ."<br/>";
        echo "Company     : ".$a->company     ."<br/>";
        echo "Asset type  : ".$a->asset_type  ."<br/>";
        echo "City/town   : ".$a->city_town   ."<br/>";
        echo "Postcode    : ".$a->postcode    ."<br/>";
        echo "Delivery fee: ".$a->deliveryfee ."<br/></p>";
        
        
    }
}
        
        
