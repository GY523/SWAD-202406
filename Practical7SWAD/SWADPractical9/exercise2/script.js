function submitName(){
    var username=$("#inputName").val();
    //send the post request with the username
    $.post('greet.php',{action:"submitName", name:username}, function(response){
        $("#greetingsContainer").html(response);
    })
}

$(document).ready();