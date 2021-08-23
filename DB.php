<?php

    function connection (){
      // Create connection
        return $conn = new mysqli("localhost", "root", "", "autoplius");

    }

    //getData
    function all() {
        $conn = connection();
        $sql ="SELECT * from cars";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    function find($id){  //edit'as
        $sql ='SELECT * from cars where id = "'.$id.'"';  
        $conn = connection();  //atsidarom connection
        $car = $conn->query($sql);
        $conn->close();
        return (array) $car->fetch_assoc();  //atvaizduoja visa car info

    } 

    function store() {
        // $car = [];
        // $car['id']   eini i phpmyadmin,pridedi item i lenetele, ir copy INSERT koda
        $sql = "INSERT INTO `cars` (`id`, `manufacturer`, `model`, `fuel`, `year`, `distance`, `status`) 
        VALUES (NULL, '".$_POST['manufacturer']."', '".$_POST['model']."',
                        '".$_POST['fuel']."', '".$_POST['year']."', 
                        '".$_POST['distance']."' , '".$_POST['status']."');";
         $conn = connection();
         $conn->query($sql);
         $conn->close();

    }

    function update () {
        $sql = "UPDATE `cars` 
        SET `manufacturer` = \"".$_POST['manufacturer']."\",`model` = \"".$_POST['model']."\",
         `fuel` = \"".$_POST['fuel']."\", `year` = \"".$_POST['year']."\",
          `distance` = \"".$_POST['distance']."\"
          WHERE `cars`.`id` = \"".$_POST['update']."\";"; //viedoj id indexo irasem $_post['update]
        //ueskom klaidu, issiechoinam sql, ie ziurim ka virs parasytas kodas sukure
        //gavau----UPDATE `cars` SET `manufacturer` = bmw,`model` = qw, `fuel` = sddf, `year` = 0000000, `distance` = 123 WHERE `cars`.`id` = 5;
        //tuomet nusikopijuoji virsuj parasyta query, eini i phpMyadmin ir paste'ini, ziuri error
        //  echo $sql; die;
         $conn = connection();
         $conn->query($sql);
         $conn->close();
     }

    function destroy() {
        $sql = 'DELETE FROM `cars` WHERE `cars`.`id` = '.$_POST['delete'];
        // echo $sql; die;
        $conn = connection();
        $conn->query($sql);
        $conn->close();
    }    

?>