<?php 
include "lib/connection.php";

if(isset($_POST['x'])){
    $det_name = $_POST['x'];
    $selectname ="SELECT `id`,`first_name`,`last_name` FROM `doctor_list` WHERE `department`= '$det_name' ";
    $result_name = $conn->query($selectname);
    if($result_name->num_rows > 0){ 
        while($resultname= $result_name->fetch_assoc()){
            $f_name=$resultname['first_name']; 
            $l_name = $resultname['last_name'];
        $resultname_arr[]=array(
            "id" => $resultname['id'],
            "name" => $f_name ." " . $l_name);
    }
    echo json_encode($resultname_arr);   
    }else{
        $resultname_arr[]=array();
        echo json_encode($resultname_arr);
    }
    //return  $result_name;
}else{
    echo "No Doctor";
}



?>