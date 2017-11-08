$('#newDay').on('click',function(){
    $('.newDay').css('display','flex');
    setTimeout(function(){
        $('.newDay').css('display','none');  
    },9000);
     $('#'+$('#buttonChangeOn').attr('href')).css('display','none');
    $('#buttonChangeOn').removeAttr('id','buttonChangeOn');
    $('.buttonChange[href=study]').attr('id','buttonChangeOn');
    $('#'+$('#buttonChangeOn').attr('href')).css('display','flex');
    $.get("newday.php",{
        sleep:$('#0').text(),
        exploration:$('#1').text(),
        recreation: $('#2').text(),
        restInput:$('#restInput').val(),
        training:$('#3').text(),
        job:$('#4').text()
    },
          function(data){
        data =JSON.parse(data);
        for(var id in data)
        {
            $('#health').text(data[0]);
            $('#mood').text(data[1]);
            $('#studyText').text(data[2]);
            $('#money').text(data[3]);
            $('#exploration').text(data[4]);
            $('#day').text(data[5]);
        }
    });   
});
