
$("#submit_btn").click(function(){
    username = $("#username").val();
    password = $("#password").val();

    $.ajax({url:baseurl + '/login', //same as new post
            data: {user: username, pass: password},
            method: "POST",
            dataType: "json"
        }).done(function(data){
            receivedUserData = data['User'] //table

            if(data['Authenticated'])
            {
                $("#notlogged").css('display','none')
                $("#username").val("")
                $("#password").val("")
                $("#invalid").css("display",'none')
                
                $("#un").text(receivedUserData['Username'])
                $("#hash").text(receivedUserData['PasswordHash'])
                $("#loggedin").css('display','block')       
            } else {
                $("#invalid").css("display",'block')
            }  
        })  
})


$("#back").click(function(){
    $("#loggedin").css('display','none')
    $("#notlogged").css('display','block')
})