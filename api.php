<?php
header("Content-Type:application/json");
if (isset($_GET['order_id']) && $_GET['order_id']!="") {
	include('conn.php');
	$order_id = $_GET['order_id'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `user` WHERE order_id=$order_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$name = $row['name'];
	response($order_id, $name);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($order_id,$name){
	$response['order_id'] = $order_id;
	$response['name'] = $name;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>