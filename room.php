<?php
require "includes/db.php";
?>
<?php if(isset($_SESSION['logged_users'])) : 
else : 
header("Location:simulator/index.php");
endif; ?>
<?php
$site_name = 'Rocket Scientist';
$site_name4 = 'here';
include "includes/header.php";
?> 
<div id="preload"></div>
<div class="newDay">
    <div class="annimation">
        <img src="images/skay.png" class="skay" alt="">
        <img src="images/skay.png" class="skay1" alt="">
        <img src="images/moon.png" class="star" alt="">
        <img src="images/star.png" class="star1" alt="">
        <img src="images/star.png" class="star2" alt="">
        <img src="images/star.png" class="star3" alt="">
        <img src="images/star.png" class="star4" alt="">
        <img src="images/star.png" class="star5" alt="">
        <img src="images/star.png" class="star6" alt="">
        <img src="images/skay.png" class="skay2" alt="">
        <img src="images/skay.png" class="skay3" alt="">
        <img class="sane" src="images/sane.png" alt="">
        <img class="centerAnimation" src="images/center.png" alt="">
    </div>
</div>

<div id="formTraining">
    <div class="form">
        <div class="formCenter" >
            <span>Change the form of Studying</span>
            <div class="formText"><p>Full time</p><div class="buttonBuy">Buy</div></div>
            <div class="formText"><p>Distant</p><div class="buttonBuy">Buy</div></div>
            <div class="formText"><p>Self learning</p><div class="buttonBuy">Buy</div></div>
        </div>
        <div class="buttonBuy" href="formTraining">Cancel</div>
    </div>
</div>
<div id="formTraining2">
    <div class="form">
        <div class="formCenter" >
            <span>Change of work</span>
            <div class="formText"><p>Brigadier</p><div class="buttonBuy2">Get a job</div></div>
            <div class="formText"><p>Laborer</p><div class="buttonBuy2">Get a job</div></div>
            <div class="formText"><p>Pocket money</p><div class="buttonBuy2">Get a job</div></div>
        </div>
        <div class="buttonBuy"  href="formTraining2">Cancel</div>
    </div>
</div>
<div id="formTraining3">
    <div class="form">
        <div class="formCenter" >
            <span>New cooperation</span>
            <div class="formFlexCenter3">
                <div class="usernameFind">
                    <p>Invite:</p>
                    <input placeholder="username" type="text">
                    <div class="buttonBuy3" >Save</div>
                </div>
                <div class="usernameFind">
                    <div id="usersFind">
                        <span>Invitation:</span>

                        <p>user1</p>
                        <p>user2</p>
                        <p>user3</p>
                    </div>
                </div>

                <div class="usernameFind">
                    <p>Cooperation name:</p>
                    <input placeholder="Название" type="text">

                </div>
            </div>
        </div>
        <div class="buttonBuy" id="cancel3">Save</div>
    </div>
</div>
<div class="buttonRun" id="newDay"> <div class="triangl"></div>
    <p>next day</p>
</div>
<div class="room">
    <div class="content">
        <div class="buttonChangeBlock">
            <div class="buttonChange" href="study" id="buttonChangeOn">Profile</div>
            <div class="buttonChange" href="laboratory">Invent</div>
            <div class="buttonChange" href="research">Laboratory</div>
            <div class="buttonChange" href="rest">Rest</div>
            <div class="buttonChange" href="training">Studying </div>
            <div class="buttonChange" href="work">Work</div>
            <div class="buttonChange" href="cooperation">Cooperation</div> 
        </div>
        <div class="main">
            <div class="buyBlock">
                <div class="buyBlockText">
                    <p>Name:</p>
                    <p>Cost:</p>
                    <p>Aptitude</p>
                </div>
                <div class="buttonBuy">Buy</div>

            </div>
            <div class="educationBlock">
                <div class="educationBlockText">
                    <p>Master program:</p>
                    <p>Cost:</p>
                    <p>Abilities</p>
                    <p>Number of points</p>
                </div>
                <div class="buttonEducation" href="formTraining">Change</div>
            </div>
            <div class="educationBlock2">
                <div class="educationBlockText">
                    <p>Salary:</p>
                    <p>You can work no more:</p>
                    <p>Education</p>
                </div>
                <div class="buttonEducation" href="formTraining2">Change</div>

            </div>
            <div id="study">
                <div class="profile" >
                    <div class="mainCenter">
                        <?php
                        $project = R::findAll('users','login = ?', array($_SESSION['logged_users']->login));
                        foreach (array_reverse($project) as $projec) { ?>
                        <p><?php echo $projec['name'].' '.$projec['surname']; ?></p>
                        <div class="sex">
                            <p>Gender: </p><img src="images/<?php echo $projec['sex'];?>" alt="">
                            <span>
                                <?php if($projec['sex']=='man.png') echo 'Male' ; else echo 'Female';?>
                            </span> 
                        </div>
                        <div class="divide">
                            <p><?php echo $projec['age'];?> years</p>
                            <p >Health: <span id="health"><?php echo $projec['health'];?></span></p>
                            <p>Mood: <span id="mood"><?php echo $projec['mood'];?></span></p>
                            <p>Money: <span id="money"><?php echo $projec['money'];?></span></p>
                            <p>Available days: <span id="day"><?php echo $projec['day'];?></span></p>
                        </div>
                        <div class="divide">
                            <p>Invent a rocket engine: 0%, total <span id="exploration"><?php echo $projec['exploration'];?></span>%</p>
                            <p>Laboratory: <?php echo $projec['laboratory'];?>%</p>
                            <p>Rest: <?php echo $projec['recreation'];?>%</p>
                            <p>Studying: <span id="studyText"><?php echo $projec['study'];?></span>%, master program 0%</p>
                        </div>
                        <p>Work: <?php echo $projec['job'];?></p>
                        <p>Actual cooperation: no</p>
                        <?php if(isset($_SESSION['logged_users'])) : ?>
                        <li> <a href="logout.php"><?php echo $_SESSION['logged_users']->login; ?> (out)</a></li>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php } ?>
                        
                    </div>
                </div>
                <div class="routine">
                    <div class="mainCenter numberBlock">
                        <p class="routineH">Timetable</p>
                        <div class="selectNumber">
                            <p class="ollNumber">Total: 24 hours, balance: <span id="sizeNow">2</span> hours</p>
                            <div class="numberSignature">
                                <span>Sleep</span>
                                <div class="selectButton" > 
                                    <div class="num"  id="0">7</div>
                                    <div class="select"  id="div0">
                                    </div>
                                </div>
                                <span class="hours">hours</span>
                            </div>
                            <div class="numberSignature">
                                <span>Invent </span>
                                <div class="selectButton" >
                                    <div class="num" id="1">4</div>
                                    <div class="select" id="div1"></div>
                                </div>
                                <span class="hours">hours</span>
                            </div>
                            <div class="numberSignature">
                                <span>
                                    <select id="restInput">
                                        <option  value="0.5">Rest</option>
                                        <option value="-1">Friends</option>
                                        <option value="0.25">Books</option>
                                        <option value="-0.5">TV</option>
                                        <option value="0.5">Promenade</option>
                                        <option value="1">Sport</option>
                                    </select>
                                </span>
                                <div class="selectButton" >
                                    <div class="num" id="2">3</div>
                                    <div class="select" id="div2"></div>
                                </div>
                                <span class="hours">hours</span>
                            </div>
                            <div class="numberSignature">
                                <span>Studying </span>
                                <div class="selectButton" >
                                    <div class="num" id="3">4</div>
                                    <div class="select" id="div3"></div>
                                </div>
                                <span class="hours">hours</span>
                            </div>
                            <div class="numberSignature">
                                <span>Work</span>
                                <div class="selectButton" >
                                    <div class="num" id="4">4</div>
                                    <div class="select" id="div4"></div>
                                </div>
                                <span class="hours">hours</span>
                            </div> 
                        </div> 
                    </div>
                </div>
                <div  class="profileAvatar">
                    <div class="mainCenter centerAvatar">
                        <div class="bgImgProfile">
                            <div id="avatarBlock">
                                <div class="closeAvatarBlock">Close</div>
                                <div class="avatarImg">
                                    <img src="images/avatar1.png" id="avatar1.png" alt="">
                                    <img src="images/avatar2.png" id="avatar2.png" alt="">
                                    <img src="images/avatar3.png" id="avatar3.png" alt=""> 
                                </div>
                            </div>
                            <div class="bgImgProfileHov">
                            </div>
                            <?php
                            $project = R::findAll('users','login = ?', array($_SESSION['logged_users']->login));
                            foreach (array_reverse($project) as $projec) { ?>
                            <img id="imgProfile" src="images/<?php echo $projec['avatar'];?>" alt=""> 
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
            <div id="laboratory">
                <div class="laboratoryMain">
                    <img src="images/roket.png" alt="">
                    <img src="images/roket.png" alt="">
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                        <p class="informatiomH">Actual properties</p>
                        <div class="informatiomText">
                            <p>Actual progress: 0%</p>
                            <br>
                            <p>Actual element: no</p>
                            <p>Progress element: 0%</p>
                            <p>Costs: 0 hour / day</p>
                            <p>Points :  0 points / day</p>
                            <p>Probability: 0%</p>
                        </div> 

                    </div>
                </div>
            </div>
            <div id="research">
                <div class="laboratoryMain researchImages">
                    <img href="1" src="images/research.png" class="researchBought" alt="">
                    <img href="2" src="images/research.png"  alt="">
                    <img href="3" src="images/research.png" alt="">
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                        <p class="informatiomH">Actual properties</p>
                        <div class="informatiomText">
                            <p id="nameImg"></p>
                            
                        </div> 

                    </div>
                </div>
            </div>
            <div id="rest">
                <div class="laboratoryMain researchImages">
                    <img src="images/research.png" class="researchBought" alt="">
                    <img src="images/research.png"  alt="">
                    <img src="images/research.png" alt="">
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                       <p class="informatiomH">Actual properties</p>
                        <div class="informatiomText">
                            <p>Amount points: 0</p>
                            <br>
                            <p>Total items: 0</p>
                            <p>Bought: 0</p>
                            <p>Actual item: </p>
                            <p>Cost: 0 $</p>
                            <p>Total sum of money: 0</p>
                        </div> 

                    </div>
                </div>
            </div>
            <div id="training">
                <div class=" trainingImages">
                    <div class="education" href="pupil"><img src="images/avatar1.png" alt="">
                        <div class="educationChange educationHave"></div></div>
                    <div class="education " ><img src="images/avatar1.png" alt="">
                        <div class="educationChange educationHave"></div></div>
                    <div class="education"><img src="images/avatar1.png" alt="">
                        <div class="educationChange"></div></div>
                    <div class="education"><img src="images/avatar1.png" alt="">
                        <div class="educationChange"></div></div>
                    <div class="education"><img src="images/avatar1.png" alt="">
                        <div class="educationChange"></div></div>
                    <div class="education"><img src="images/avatar1.png" alt="">
                        <div class="educationChange"></div></div>
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                        <p class="informatiomH">Actual properties</p>
                        <div class="informatiomText">
                            <p>Amount points: 0</p>
                            <br>
                            <p>Actual items: <span id="thisElement">not selected</span></p>
                            <p>Progress of the element: 0%</p>
                            <p>Costs: 0 hour / day</p>
                            <p>Points :  0 points / day</p>
                            <p>Probability: 0%</p>
                        </div> 

                    </div>
                </div>
            </div>
            <div id="work">
                <div class=" trainingImages">
                    <div class="work " ><img src="images/avatar1.png" alt=""><div class="educationChange educationHave"></div></div>
                    <div class="work " ><img src="images/avatar1.png" alt=""><div class="educationChange educationHave"></div></div>
                    <div class="work"><img src="images/avatar1.png" alt=""><div class="educationChange"></div></div>
                    <div class="work"><img src="images/avatar1.png" alt=""><div class="educationChange"></div></div>
                    <div class="work"><img src="images/avatar1.png" alt=""><div class="educationChange"></div></div>
                    <div class="work"><img src="images/avatar1.png" alt=""><div class="educationChange"></div></div>
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                        <p class="informatiomH">Actual properties</p>
                        <div class="informatiomText">
                            <p>Amount points: 0</p>
                            <br>
                            <p>Total Levels: 0</p>
                            <p>Passed: 0</p>
                            <p>Actual element: </p>
                            <p>Type of studying: </p>
                            <p>Costs: 0 $</p>
                            <p>Total money: 0</p>
                        </div> 

                    </div>
                </div>
            </div>
            <div id="cooperation">
                <div class="cooperationMain">
                    <div class="cooperationMy">
                        <p class="informatiomH">My cooperation</p>
                        <div class="informatiomBlockButton">
                            <div class="informatiomImg">
                                <img src="images/multy-user.png" alt="">
                                <span>Classmates</span>
                            </div>
                            <div class="buttonCooperation">
                                <div class="buttonBuy">Remove</div>
                                <div class="buttonBuy">View</div>
                                <div class="buttonBuy">Play</div>
                            </div>
                        </div>
                        <div class="informatiomBlockButton">
                            <div class="informatiomImg">
                                <img src="images/multy-user.png" alt="">
                                <span>Friends</span>
                            </div>

                            <div class="buttonCooperation">
                                <div class="buttonBuy">Remove</div>
                                <div class="buttonBuy">View</div>
                                <div class="buttonBuy">Play</div>
                            </div>
                        </div>
                    </div>
                    <div class="cooperationAdd">
                        <p class="informatiomH2">Uploaded cooperation</p>
                        <div class="informatiomBlockButton">
                            <div class="informatiomImg">
                                <img src="images/multy-user.png" alt="">
                                <span>Neighbors</span>
                            </div>

                            <div class="buttonCooperation">
                               <div class="buttonBuy">Remove</div>
                                <div class="buttonBuy">View</div>
                                <div class="buttonBuy">Play</div>
                            </div>
                        </div>
                    </div>
                    <div class="buttonRun2 buttonEducation" href="formTraining2" > <div class="triangl"></div>
                        <p >Add</p>
                    </div>
                </div>
                <div class="laboratoryInformation">
                    <div class="informatiomCenter">
                        <p class="informatiomH">New cooperation</p>
                        <div class="informatiomText">
                            <p>Current progress: 0%</p>
                        </div> 

                    </div>
                </div>
            </div>
        </div>



    </div>

</div>
<?php
include "includes/footer.php";
?> 
