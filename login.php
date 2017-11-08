<?php
require "includes/db.php";
$errors = array();
$user = R::findOne('users', 'login = ?',array($_POST['login']));
if($user)
{
    if( $_POST['password']==$user->password)
    {
        $_SESSION['logged_users'] = $user;
        $error = 1;
        echo $error;
    }
    else
    {
        $errors[] = 'Incorrect password!';  
    }
}
else
{
    $errors[] = 'User with the same login not found!'; 
}
if(!empty($errors) )
{
    echo  array_shift($errors);
}
?>