<?php
if (isset($_POST['order_id']) && $_POST['order_id']!="") {
 $order_id = $_POST['order_id'];
 $url = "http://localhost/phprestapi/api/".$order_id;
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 
 echo "<table>";
 echo "<tr><td>Order ID:</td><td>$result->order_id</td></tr>";
 echo "<tr><td>Name:</td><td>$result->name</td></tr>";
 echo "</table>";
}
    ?>