<?php

use Symfony\Contracts\EventDispatcher\Event;

include 'db.php';
$cookieTable =  $_GET['tablename'] ?? 'workouts';
setcookie('tablename',$cookieTable,time() + 86400, "/"); 




$defaultName = $_GET['tablename'] ?? $_COOKIE['tablename'] ?? 'workouts';



if (isset($_POST['addOne'])){
    $id= $_POST['id'];
    $weight = $_POST['weight'];

    $query = "UPDATE {$_GET['tablename']} SET weight=$weight+1 where id = $id";
    
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
};

if (isset($_POST['addFive'])){
    $id= $_POST['id'];
    $weight = $_POST['weight'];

    $query = "UPDATE {$_GET['tablename']} SET weight=$weight+5 where id = $id";
    
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
};

if (isset($_POST['addTen'])){
    $id= $_POST['id'];
    $weight = $_POST['weight'];

    $query = "UPDATE {$_GET['tablename']} SET weight=$weight+10 where id = $id";
    
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Reps</title>
</head>
<body>
    <header>
  <?php
  include './nav.php';
  ?>
    </header>
    <section class="exercises">
    <form action="index.php" action="GET">

            <select class="selectProgram" name="tablename">
           <?php $query = "SHOW TABLES";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die('No exercises to get');
                  };
                  while($row = mysqli_fetch_assoc($result)){
                    $tablesin = $row['Tables_in_gym'];
                    ?>
                  <option value=<?= $tablesin ?>><?=$tablesin?></option>
                  <?php
                } ?>
            </select>
            <button>Submit</button>
        </form>

        <div class="entries">
          <?php 
        $query = "SELECT * from {$defaultName}";
        $result = mysqli_query($connection, $query);
        if(!$result){
          die('No exercises to get');
        };
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $exercise = $row['exercise'];
          $sets = $row['sets'];
          $repetitions = $row['repetitions'];
          $weight = $row['weight'];
          $musclegroup = $row['musclegroup'];
          $rir = $row['rir'];         
          ?> 
              <form class="entry" action="index.php?tablename=<?=$defaultName?>"  method="POST" >
              

                <p class="hideMe"><select name="id" >
                  <option value="<?=$id?>"><?=$id?></option>
                </select> <input  name="weight" value="<?= $weight?>"/></p>
                <p class="entry__text"> <?= $exercise .' '. $sets ."x". $repetitions .' '. $weight ."Kg"?> </p>
                <div class="entry__buttons">
                  <button class="addButton" name="addOne">+1</button>
                  <button class="addButton" name="addFive">+5</button>
                  <button class="addButton" name="addTen">+10</button>
                </div>
              
              </form>
              
              <?php
          };
          ?>
          </div>

</section>

<?php
    include './footer.php';
    ?>

    <script>
     const entries = document.querySelectorAll('.entry');
     console.log(entries);
        entries.forEach(entry =>{
          entry.addEventListener('click', () =>{
            entry.classList.toggle('completed');
          })
        }) 
    </script>
</body>
</html>