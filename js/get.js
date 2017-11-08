$("#test").on("click",function(){
    $.ajax({
        url:"http://www.ginkomix.tk/get/get.php", 
        type: "POST",
        data:({
            test:'hi!'
            
        }),
        dataType:"HTML",
        beforeSend:beforesignum ,
        success: successsignum
    });
});
function successsignum(data){
    
    alert(data);
    
}