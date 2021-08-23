<?php

//objektas - car. columns - id, manufacturer, model, year, fuel, distance status.
include("./DB.php");

//jeigu norim kazka sukurti, ieskosime POST'e
if(isset($_POST['create'])){
    store();

    header("location:./"); //DEDASI TIK I POST metodus, tam kad iseit is posto
    die;                    //kad reloadinant mygtukas neklaustu resubmission
}

if(isset($_GET['edit'])){        //ieskom masinos(siuo atveju)
    $car = (array) find($_GET['edit']);  //cia paziurim ka EDIT'as atsinesa
   
   
}

if(isset($_POST['update'])){
    update();

    header("location:./");
    die;
}
//destroy
if(isset($_POST['delete'])){
    destroy();

    header("location:./");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>autoplius17</title>
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>
<body>

<form action="" class="form" method="post">
    <div class="form-group row mt-4">
        <label class="col-sm-2 col-form-label" >Gamintojas</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="manufacturer" value="<?= (isset($car))? $car['manufacturer'] : "" ?>">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label" >Modelis</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="model" value="<?= (isset($car))? $car['model'] : "" ?>">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label" >Metai</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="year" value="<?= (isset($car))? $car['year'] : "" ?>">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label" >Degalai</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="fuel" value="<?= (isset($car))? $car['fuel'] : "" ?>">
        </div>
    </div>
    <div class="form-group row mt-2">
        <label class="col-sm-2 col-form-label" >Rida</label>
        <div class="col-sm-4">
            <input class="form-control" type="text" name="distance" value="<?= (isset($car))? $car['distance'] : "" ?>">
        </div>
    </div>
    
    <div class="form-group row mt-4">
       <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <?php if(isset($car)){  //kada turim kintamaji $car?- kai pasapudziam redagavimo mygtuka
            //ir iskvieciam editinimo dali
                echo '<button class="btn btn-primary" style="width:100% " type="submit" name="update" value="'.$car['id'].'">atnaujinti</button>';
            }else{
                echo '<button class="btn btn-danger" style="width:100% " type="submit" name="create">prideti</button>';
            }?>  
            <!-- //i value idedam value="'.$car[$id].'", konkreciai ka norim  -->
        </div>
    </div>


    <!-- //duomenu atvaizdavimui kuriam table -->
<table class="table">
    <tr>
        <th>id</th>
        <th>manufacturer</th>
        <th>model</th>
        <th>year</th>
        <th>fuel</th>
        <th>distance</th>
        <th>status</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
    <!-- //foreach yra php, ji uzdarom nes bus daug rasymo  -->
     <?php foreach (all() as $car) { ?>  
        <tr>
            <td><?=$car['id']?></td>
            <td><?=$car['manufacturer']?></td>
            <td><?=$car['model']?></td>
            <td><?=$car['year']?></td>
            <td><?=$car['fuel']?></td>
            <td><?=$car['distance']?></td>
            <td><?=$car['status']?></td>
            <td>
                <a class="btn btn-success" href="?edit=<?=$car['id']?>">Edit</a>
            </td>
            <td>
                <form action="" method="post">
                    <button calss="btn btn-danger" type="submit" name="delete" value="<?=$car['id']?>">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>





</table>




</form>

    
</body>
</html>