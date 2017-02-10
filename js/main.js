
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

var con_1 = 0;
var con_2 = 0;
var con_3 = 0;
var con_4 = 0;
$("#pass").keyup(function(){
    var val = $(this).val();
    if(val.length<8 ){
        $(".form_test").addClass("bad_");
        $(".form_test").removeClass("ok_");
        $(".form_test").html("Password needs to be at least 8 <i class='icon-warning'></i>");
        con_1 = 0;
    } else if(val.length>=8){
        $(".form_test").addClass("ok_");
        $(".form_test").removeClass("bad_");
        $(".form_test").html("Good password <i class='icon-wink'></i>");
        con_1 = 1;
    }
});
$("#pass2").keyup(function(){
    var val = $(this).val();
    var val2 = $("#pass").val();
    if(val != val2 ){
        $(".form_test").addClass("bad_");
        $(".form_test").removeClass("ok_");
        $(".form_test").html("Passwords don't match <i class='icon-warning'></i>");
        con_2 = 0;
    } else if(val == val2) {
        $(".form_test").addClass("ok_");
        $(".form_test").removeClass("bad_");
        $(".form_test").html("Passwords match <i class='icon-wink'></i>");
        con_2 = 1;
    }
});
$("#email").keyup(function(){
    var val = $(this).val();
    if(validateEmail(val)){
        $(".form_test").addClass("ok_");
        $(".form_test").removeClass("bad_");
        $(".form_test").html("Email valid <i class='icon-wink'></i>");
        con_3 = 1;
    } else {
        $(".form_test").addClass("bad_");
        $(".form_test").removeClass("ok_");
        $(".form_test").html("Email not valid <i class='icon-warning'></i>");
        con_3 = 0;
    }
});
$("#nick").keyup(function(){
    var val = $(this).val();
    $.ajax({
        url: 'controllers/validar.php',
        type: 'post',
        dataType: 'json',
        data: {nick:val},
        beforeSend:function () {
            console.log("enviando peticion");
        },
        success : function () {
        $(".form_test").addClass("bad_");
        $(".form_test").removeClass("ok_");
        $(".form_test").html("User already exists <i class='icon-warning'></i>");
        con_4 = 0;
        }
    })
        .done(function () {
            $(".form_test").addClass("bad_");
            $(".form_test").removeClass("ok_");
            $(".form_test").html("User already exists <i class='icon-warning'></i>");
            con_4 = 0;
        })
        .fail(function () {
            $(".form_test").addClass("ok_");
            $(".form_test").removeClass("bad_");
            $(".form_test").html("User available <i class='icon-wink'></i>");
            con_4 = 1;
        })


});

$(".regis").click(function(){
    var yes = con_1+con_2+con_3+con_4;
    console.log(yes);
    if(yes==4){
        var num = 0;
        $(".require").each(function(){
            console.log($(this).val());
            if($(this).val() == '' || $(this).val() == null){
                $(this).addClass("focus");
            } else {
                $(this).removeClass("focus");
                num++;
            }
        });
        if(num<8){
            open_d("There are empty fields, check the form");
        } else {
            $(".form_test").addClass("ok_");
            $(".form_test").removeClass("bad_");
            $(".form_test").html("All correct! <i class='icon-wink'></i>");
            if($("#pass1").val() === $("#pass2").val()){
                var inputFileImage = document.getElementById("imagen");
                var file = inputFileImage.files[0];
                var name = $("#name").val();
                var twoname = $("#twoname").val();
                var user = $("#user").val().toLowerCase();
                var pass = $("#pass1").val();
                var email = $("#email1").val().toLowerCase();
                var gender = $("#gender").val().toLowerCase();
                var natives = $("#native").val().toLowerCase();
                var form_data = new FormData();
                form_data.append('name',name);
                form_data.append('twoname',twoname);
                form_data.append('user',user);
                form_data.append('pass',pass);
                form_data.append('email',email);
                form_data.append('gender',gender);
                form_data.append('natives',natives);
                form_data.append('file', file);
                $.ajax({
                    url: "register.php",
                    type: 'POST',
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(data){
                        var dat = data.trim();
                        if(dat>"0"){
                            open_m("Thanks for the information, now we redirect you to the placement test.");
                            setTimeout(function(){
                                window.location = "../platform/modules/test_start.php?name="+name+"&user="+user+"&native="+natives+"&id="+dat;
                            }, 2000);
                        } else if(dat=="-1"){
                            open_d("Existing user or email, please check the information");
                        } else if(dat=="0"){
                            open_d("Failed to connect to database, please try again");
                        }
                    }
                });

            } else {

                open_d("The passwords don't match, check the form");
            }
        }
    } else {
        $(".form_test").addClass("bad_");
        $(".form_test").removeClass("ok_");
        $(".form_test").html("Error: User exist, passwords don't match or password must be 8 characters <i class='icon-warning'></i>");
    }
});