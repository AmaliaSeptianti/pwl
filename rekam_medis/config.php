<?php
// create mysql connection in php
$conn = new mysqli('localhost', 'root', '', 'pwl_rekam_medis');
// check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
// create sql query to select data from table
// $sql = "SELECT * FROM patients";
// // execute query
// $result = $conn->query($sql);
// // check if any records were returned
// if($result->num_rows > 0){
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["age"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
// // close connection
