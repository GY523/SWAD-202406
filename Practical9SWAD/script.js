function addUser() {
    var name = $('#name').val();
    var email = $('#email').val();
    $.post('server.php', { action: 'add', name: name, email: email }, function (response) {
        displayUsers();
    });
}
function displayUsers() {
    $.get('server.php', { action: 'display' }, function (response) {
        $('#userTable').html(response);
    });
}
function liveSearch() {
    var searchValue = $('#search').val();
    $.get('server.php', { action: 'search', search: searchValue }, function (response) {
        $('#searchResults').html(response);
    });
}

function editUser(userId){
    $.get('server.php', {action:"getSingleUser", id:userId}, function(response){
        var user= JSON.parse(response);
        var updatedName= prompt("Enter new user name", user.name);
        var updatedEmail= prompt("Enter new user email", user.email);

        //use the value to insert into the database
        if(updatedName!== null || updatedEmail!==null){
            $.post('server.php', {action: 'edit', id:userId, name: updatedName, email: updatedEmail},function(response){
                
                displayUsers();
                alert(response);
            });
        }
    });

    
}

function deleteUser(userId){
    if(confirm("Are your sure you want to delete this user?")){
        $.post('server.php', {action: 'delete', id:userId}, function(response){
            displayUsers();
        });
    }
}

$(document).ready(function () {
    displayUsers();
});