<?php

    // use JetBrains\PhpStorm\Language;

    $conn = mysqli_connect("localhost","root","","test1") or die("Connection Failed.!");

    if(isset($_POST['initialRange']) && isset($_POST['finalRange'])){
        $min = $_POST['initialRange'];
        $max = $_POST['finalRange'];
    
        $sql = "SELECT * FROM employee WHERE age BETWEEN {$min} AND {$max} ORDER BY age asc";

    }else{
        $min = "";
        $max = "";
        $sql = "SELECT * FROM employee ORDER BY id asc";
    }
    $result = mysqli_query($conn,$sql) or die("Query Failed.!");
    $output = "";
    if(mysqli_num_rows($result)){
        $serial = 1;
        while($row = mysqli_fetch_assoc($result)){
            $output .= "<tr>
                <td>$serial</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['city']}</td>
            </tr>";
            $serial++;
        }
    }else{
        $output =  "Record Not Found" ; exit;
    }
echo $output;
?>