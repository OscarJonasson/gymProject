<?php 
include 'db.php';

function test_inputs($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['table'])){
    $nameOfTable = test_inputs($_POST['nameOfTable']);

    $query = "CREATE TABLE `$nameOfTable` (
        `id` int NOT NULL AUTO_INCREMENT,
        `exercise` varchar(100) NOT NULL,
        `sets` int NOT NULL,
        `repetitions` int NOT NULL,
        `weight` int NOT NULL,
        `musclegroup` varchar(50) NOT NULL,
        `rir` int NOT NULL,
        PRIMARY KEY (`id`)
       ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
       
       $result = mysqli_query($connection, $query);
}


if(isset($_POST['submit'])){
    $tablename = $_POST['tablename'];
    $exercise = test_inputs($_POST['exercise']);
    $sets = $_POST['sets'];
    $reps = $_POST['repetitions'];
    $weight = $_POST['weight'];
    $musclegroup = $_POST['musclegroup'];
    $rir = $_POST['rir'];


$query = "INSERT into `$tablename` values(NULL,'$exercise', $sets,$reps,$weight,'$musclegroup', $rir)";
$result = mysqli_query($connection, $query);
// $query = "INSERT INTO todos(task,date) VALUES('$task','$date')"; 
// $query = "INSERT into $tablename values(null, '$exercise', $sets, $reps, $weight, '$musclegroup', $rir)";

// $result = mysqli_query($connection, $query);

    

    if(!$result){
        die("Could not post. Sorry.");
     }

}

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
      <a href="/gymProject">
        <img src="./weightlogo.svg" alt="barbell"/>
      </a>
        <nav>
          <ul class="links">
            <li class="links__link">
              <a href="./index.php?tablename=<?=$_GET['tablename']?>" > Programs </a>
            </li>
            <li class="links__link">
              <a href="./create.php?tablename=<?=$_GET['tablename']?>"> Create </a>
            </li>
            <li class="links__link">
              <a href="./edit.php?tablename=<?=$_GET['tablename']?>"> Edit </a>
            </li>
          </ul>
        </nav>
    </header>
    <section class="createProgram">
    <h2>Create your program</h2>
    <div class="create__container">
        <h3>Program name</h3>

        <form class="createTable" action="create.php?tablename=" method="POST">
            <div class="separator">
            <label for="nameOfTable">Program name</label>
            <input type="text" name="nameOfTable" id="nameOfTable">
            </div>
            <div class="createProgram__btn" >
                <button name="table">Submit</button>
            </div>
        </form>

        <form class="createProgram__fields" action="create.php?tablename=<?=$_GET['tablename']?>" method="POST">
           <input class="hideMe" type="text" name="tablename" value=<?=$_GET['tablename']?>>
            <div class="separator">
                <label for="exercise">Exercise</label>
                <input type="text" name="exercise" id="exercise" required>
            </div>
            <div class="separator">
                <label for="sets">Sets</label>
                <input type="number" name="sets" id="sets" required>
            </div>
            <div class="separator">
                <label for="reps">Reps</label>
                <input type="number" name="repetitions" id="reps" required>
            </div>
            <div class="separator">
                <label for="weight">Weight</label>
                <input type="number" name="weight" id="weight" required>
            </div>
            <div class="separator">

                <label for="musclegroup">Muscle group</label>
                <select type="text" name="musclegroup" id="musclegroup" required>
                    <option value="upper_body">Upper Body</option>
                    <option value="lower_body">Lower Body</option>
                </select>
            </div>
            <div class="separator">
                <label for="rir">RIR</label>
                <input type="number" name="rir" id="rir">
            </div>
            <div class="createProgram__btn">
                <button name="submit">Submit</button>
            </div>
        </form>


        <form class="selectCurrent" action="create.php" action="GET">
            <select name="tablename">
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

        <section class="entries entriesCreate">
        <ul class="currentProgram">
        <?php 
        $query = "SELECT * from {$_GET['tablename']}";
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
                  <li>
                      <?=  $exercise .' '. $sets ."x". $repetitions .' '. $weight ."Kg "?>
                    </li>
                    <?php
          };
          ?>
          </ul>
        </section>

    </div>

    </section>
    
</body>
</html>