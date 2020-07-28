<?php

session_start();

$name = "";
$role = "";
$email = "";
$userID = "";
$errors = array();
//setting up database
$db = mysqli_connect('localhost', 'root', '', 'flowerdb');

//when register button clicked
if (isset($_POST['register'])) {
    $role = filter_input(INPUT_POST, 'role');
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $userID = filter_input(INPUT_POST, 'userID');
    $password_1 = filter_input(INPUT_POST, 'password_1');
    $password_2 = filter_input(INPUT_POST, 'password_2');

    //validation
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($userID)) {
        array_push($errors, "User ID is required");
    }
    if (empty($password_1 || $password_2)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Password does not match");
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO users (userID, email, password, name, role)"
                . "VALUES('$userID', '$email', '$password_1', '$name', '$role')";

        mysqli_query($db, $sql);
        $_SESSION['userID'] = $userID;
        header('location: home.php');
    }
}

//login
if (isset($_POST['login'])) {
    $userID = filter_input(INPUT_POST, 'userID');
    $password_1 = filter_input(INPUT_POST, 'password_1');

    //validation
    if (empty($userID)) {
        array_push($errors, "User ID is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE userID='$userID' AND password='$password_1'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['userID'] = $userID;
            header('location: home.php');
        }else{
            array_push($errors, "Wrong UserID/Password");
        }
    }
}

//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>