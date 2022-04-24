<?php
include 'db.php';
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
        <nav>
            Programs
            Add
        </nav>
    </header>
    <section>
        <form action="index.php" method="GET" onchange="this.form.submit()">
            <select name="daySelect" required>
                <option invalid  hidden>Select day</option>
                <option value="workouts">Day 1</option>
                <option value="workouts2">Day 2</option>
            </select>
            <button>Change</button>
        </form>
        <?php 
        $query = "SELECT * from {$_GET['daySelect']}";
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
              
              <p> <?= $id, $exercise, $sets ."x". $repetitions, $weight ." kg". $musclegroup, $rir?> </p>
              <button name="addOne">+1</button>
              <button name="addFive">+5</button>
              <button name="addTen">+10</button>
              
              <?php
          };
        ?>

    </section>

    <footer>
        Copyright
    </footer>
</body>
</html>