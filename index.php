<?php
require "includes/db.php";
?>
<?php
$site_name = 'Rocket Scientist';
$site_name5 = 'here';
include "includes/header.php";
?>
<header>
    <?php if(isset($_SESSION['logged_users'])) : ?>
    <li><a class="<? print $site_name4; ?>" href="room.php">Room</a></li>
    <li> <a href="logout.php"><?php echo $_SESSION['logged_users']->login; ?> (Выйти)</a></li>
    <?php else : ?>

    <?php endif; ?>
    
<div class="lang">
<span id="EN">EN</span>
<span id="ru">RU</span>
</div>

</header>
<content>
    <div id="preload"></div>
    <div class="content">
        <div class="login-block">

            <span id="entrance">Enter</span>
            <span id="check">Registration</span>
            <span id="loadLogin"></span>
            <div class="errors"></div>
            <div id="loginBlock">

                <form >
                    <p>
                        <input type="text" id="login" placeholder="Login" >
                    </p>
                    <p>
                        <input type="password" id="password" placeholder="Password" >
                    </p> 
                    <p>
                        <button onclick="return false"  class="buttonLogin" id="do_login" >Login</button>   
                    </p>
                </form>

            </div>
            <div id="signumBlock">

                <form >
                    <p>
                        <input type="text" id="loginR" placeholder="Login:" >
                    </p>
                    <p>
                        <input type="email" id="email" placeholder="Email:" >
                    </p>
                         <p>
                        <input type="text" id="name" placeholder="Name:" >
                    </p>
                    <p>
                        <input type="text" id="surname" placeholder="Surname:" >
                    </p>
                    
                    <p>
                        <input type="number" id="age" placeholder="Age:" >
                    </p>
                    <p>
                        <select id="sex">
                            <option  value="man.png">Man</option>
                            <option value="woman.png">Woman</option>
                        </select>
                    </p>
                    <p>
                        <input type="password" id="passwordR" placeholder="Password:">
                    </p>
                    <p>
                        <input type="password" id="password_2" placeholder="Reenter password: " >
                    </p>
                    <p>
                        <button type="submit" onclick="return false" class="buttonLogin" id="do_signup">Registration</button>   
                    </p>
                </form> 

            </div>
        </div>
    </div>  
</content>
<?php
include "includes/footer.php";
?>
<footer>
</footer>









