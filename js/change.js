$('.buttonChangeBlock div').on('click',function(){
    let href = $('#buttonChangeOn').attr('href');
     $('.buyBlock').css('display','none');
    $('.buttonChange').removeAttr('id','buttonChangeOn');
    $(this).attr('id','buttonChangeOn');
    let hrefNew = $(this).attr('href');
    $('#'+href).css('display','none');
   $('#'+hrefNew).css('display','flex');
   
});


