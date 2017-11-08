$(window).on('load', function() {

    $("#preload").animate({
        opacity:'0',   
    },1000); 

    setTimeout(function(){
        $("#preload").css("display","none");
    },1000);
});
$("#entrance").on("click",function(){
    $("#check").css("background","none");  
    $("#entrance").css("background","#d1d1d1");
    $("#loginBlock").show();
    $("#signumBlock").hide();
    $(".errors").hide();
});  
$("#check").on("click",function(){
    $("#entrance").css("background","none");  
    $("#check").css("background","#d1d1d1");    
    $("#loginBlock").hide();
    $("#signumBlock").show();
    $(".errors").hide();
});   
$("#do_login").on("click",function(){
    $.ajax({
        url:"http://simulator/login.php", 
        type: "POST",
        data:({
            login: $("#login").val(),
            password: $("#password").val()
        }),
        dataType:"HTML",
        beforeSend:beforeLogin ,
        success: successLogin
    });
});
function beforeLogin(){
    $(".loadLogin").show();
}
function successLogin(data){
    $(".loadLogin").hide();
    if(parseInt(data) == 1)
        document.location.href = "room.php";
    else
    {
        $(".errors").text(data);
        $(".errors").show();
    }
}
$("#do_signup").on("click",function(){
    $.ajax({
        url:"http://simulator/signum.php", 
        type: "POST",
        data:({
            loginR: $("#loginR").val(),
            email: $("#email").val(),
            name: $("#name").val(),
            surname: $("#surname").val(),
            age: $("#age").val(),
            sex: $("#sex").val(),
            passwordR: $("#passwordR").val(),
            password_2: $("#password_2").val()
        }),
        dataType:"HTML",
        beforeSend:beforesignum ,
        success: successsignum
    });
});
function beforesignum(){
    $(".loadLogin").show();
}
function successsignum(data){
    $(".loadLogin").hide();
    $(".errors").text(data);
    $(".errors").show();
}
$(document).on('contextmenu',function(e){
    e.preventDefault();
});












