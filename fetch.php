<?php
$con=mysqli_connect('localhost','root','','cbscrud') or die("connection failed".mysqli_errno());
$request=$_REQUEST;
$col = array(
	0 => 'id',
	1 => 'fname',
	2 => 'lname',
	3 => 'email',
	4 => 'username',
	5 => 'password',
	6 => 'contact'
); //create column like table in database

$sql ="SELECT * FROM customer";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

$data=array();

while($row=mysqli_fetch_array($query)){
	$subdata=array();
	$subdata[]=$row[0];  
	$subdata[]=$row[1];  
	$subdata[]=$row[2];  
	$subdata[]=$row[3];  
	$subdata[]=$row[4];  
	$subdata[]=$row[5];  
	$subdata[]=$row[6]; 
	$data[]=$subdata;

}

$json_data=array(
	"draw" => intval($request['draw']),
	"recordsTotal" => intval($totalData),
	"recordsFiltered" => intval($totalFilter),
	"data" => $data
);

echo json_encode($json_data);
?>