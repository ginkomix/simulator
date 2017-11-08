<?php
require "includes/db.php";
$stask = array();
$sleep = $_GET['sleep'];
$exploration = $_GET['exploration'];
$recreation = $_GET['recreation'];
$restInput = $_GET['restInput'];
$training = $_GET['training'];
$job = $_GET['job'];

$project = R::findAll('users','login = ?', array($_SESSION['logged_users']->login));
foreach (array_reverse($project) as $projec) 
{
    $health = $projec['health']; 
$mood = $projec['mood'];
$study = $projec['study'];
$money = $projec['money'];
$exploration1 = $projec['exploration'];
    $day = $projec['day'];
}
 $day++;
$health*=(($sleep+ $recreation*$restInput +1.5)/10);
$mood*=(($recreation*$restInput+$exploration)/$job);
$study+= $training *0.5;
$money+=$job*10-$training*0-0+2;
$exploration1+=$exploration*0.001*0.75*($mood/10)*$health;

$project = R::findAll('users','login = ?', array($_SESSION['logged_users']->login));
foreach (array_reverse($project) as $projec) 
    $id=$projec['id'];
$project =R::load('users', $id);
$project-> health =  $health;
$project->day= $day;
    $project->mood = $mood;
    $project->study = $study;
    $project->money = $money;
    $project->exploration = $exploration1;
R::store($project);

array_push($stask,$health);
array_push($stask,$mood);
array_push($stask,$study);
array_push($stask,$money);
array_push($stask,$exploration1);
array_push($stask,$day);

echo json_encode($stask);


?>

