$(".lang span").on("click", function(){
    let lang = $(this).attr('id');
   
    langshooce(lang);
});

function langshooce(lang){
    $.getJSON('languages/'+lang+'.json', function(data) {
        $.each(data, function(key, val) {
            if(key == 'entrance')
                $('#entrance').text(val);
            if(key=='check')
                $('#check').text(val);
            if(key=='do_login')
                $('#do_login').text(val);
            if(key=='do_signup')
                $('#do_signup').text(val);
            if(key=='login')
            {
                $('#login').attr("placeholder",val);
                $('#loginR').attr("placeholder",val);
            }
            if(key=='password')
            {
                $('#password').attr("placeholder",val);
                $('#passwordR').attr("placeholder",val);
            }  
            if(key=='name')
                $('#name').attr("placeholder",val);
            if(key=='surname')
                $('#surname').attr("placeholder",val);
            if(key=='gender')
                $('#gender').attr("placeholder",val);
            if(key=='password2')
              $('#password_2').attr("placeholder",val);
        });
    });
    }  