<?php
require "includes/db.php";
$errors = array();
if( trim($_POST['loginR']) == '')
{
    $errors[] = 'Enter login!';
}
if( trim($_POST['email']) == '')
{
    $errors[] = 'Enter Email!';
}
if($_POST['name'] == '')
{
    $errors[] = 'Enter name!';
}
if($_POST['age'] == '')
{
    $errors[] = 'Enter age!';
}
if($_POST['surname'] == '')
{
    $errors[] = 'Enter surname!';
}
if($_POST['sex'] == '')
{
    $errors[] = 'Enter sex!';
}
if($_POST['passwordR'] == '')
{
    $errors[] = 'Enter password!';
}
if(  $_POST['passwordR'] != $_POST['password_2'] )
{
    $errors[] = 'The reenter password is incorrect!';
}
if(R::count('users',"login = ?",array($_POST['loginR'])) > 0)
{
    $errors[] = 'User with such login exists!';
}
if(R::count('users',"email = ?",array($_POST['email'])) > 0)
{
    $errors[] = 'User with such an email exists!';
}
if(empty($errors) )
{
    $user = R::dispense('users');
    $user->login = $_POST['loginR'];
    $user->email = $_POST['email'];
    $user->name = $_POST['name'];
    $user->surname = $_POST['surname'];
    $user->sex = $_POST['sex'];
    $user->age = $_POST['age'];
    $user->health  = 100;
    $user->mood  = 100;
    $user->study  = 0;
      $user->day  = 0;
    $user->money = 0;
    $user->laboratory   = 0;
    $user->recreation   = 0;
    $user->training = 0;
    $user->exploration = 0;
    $user->job = 0;
    $user->password = $_POST['passwordR'];
    $user->avatar = 'avatar1.png';
    R::store($user);
    echo 'User under login '.$_POST['loginR'].' has been successfully registered.';
}
else
{
    echo array_shift($errors);
}
?>
