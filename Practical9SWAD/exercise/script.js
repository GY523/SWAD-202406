function displayData(currentPage=1){
    //total page can be defined as 4 as it is fixed in fetch data
    //total page is needed for pagination button
    var total_page=4;
    // to get the specific data for a page. input needed is current page

    var item_per_page=3;
    $.get('fetch_data.php', {page:currentPage},function(response){
        //get the data for current page in format of array
        var dataArr=JSON.parse(response);
        //print out the data to the container
        var data="";
        for(var i=0;i<item_per_page;i++){
            data+="<div>"+dataArr[i]+"</div>";
        }
        $("#content").html(data);

        //create pagination button base one     
        var pagination="";
        if(currentPage==1){
            for (var i=currentPage;i<currentPage+3;i++){
                pagination+="<button onclick='displayData("+i+")' >"+ i+"</button>";
            }
        }else{
            for (var i=currentPage-1;i<currentPage+2;i++){
                pagination+="<button onclick='displayData("+i+")' >"+ i+"</button>";
            }
        }
        
        $("#pagination").html(pagination);
    });
}

$(document).ready(function(){
    displayData();
})