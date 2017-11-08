<?php
require "includes/db.php";
if(isset($_SESSION['logged_users'])) : 
else : 
header("Location:index.php");
endif; 
$project = R::findAll('users','login = ?', array($_SESSION['logged_users']->login));
foreach (array_reverse($project) as $projec) 
    $id=$projec['id'];
$project =R::load('users', $id);
$project->avatar = $_POST['avatar'];
R::store($project);
?>

