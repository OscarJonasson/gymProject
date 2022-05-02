<?php
include './sessions.php';

if($loginCheck){
    header('Location: index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $user_name  and $password == $pass_word){
        login();
        header('Location: index.php');
        exit;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Reps</title>
</head>
<body>

<main class="container">
    <div class="entries">
        <h1>LOGIN</h1>
        <form class="login" method="POST" action="./login.php">
            <div class="separator">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="separator">
                <label for="username">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button>Submit</button>
        </form>
    </div>
</main>
    <?php include './footer.php' ?>
</body>
</html>