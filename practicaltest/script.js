function liveSearch(){
    var searchPhrase=$("#liveSearch").val();
    //check whether is empty
    if(searchPhrase){
        //send the get ajax to server
        $.get("server.php",{action: 'liveSearch', phrase: searchPhrase}, function(response){
            //check if response start with Error:
            if(response.startsWith("E:")){
                $("#searchResults").html("");
                $("#error").html(response.slice(2))
            }else{
                $("#error").html("")
                $("#searchResults").html(response);
            }

        });
    }else{
        $("#searchResults").html("");
        $("#error").html("Keyword cannot be empty.Please enter a search term");
    }
    
    
}
