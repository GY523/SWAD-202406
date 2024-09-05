<?php
require("database.php");
//error reporting
include("error_handling.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Search & View Book Records</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Live Search - View Book Records</h2>
    <label>Search: <input type="text" id="liveSearch" placeholder="Live Search" onkeyup="liveSearch()"></label>
    
    <div id="error"></div>
    <table border="1">
        <thead>
            <tr>
                <td>No.</td>
                <td>Book Title</td>
                <td>Book Author</td>
                <td>Book Genre</td>
                <td>Book Publisher</td>
                <td>Book ISBN</td>
            </tr>
        </thead>
        <tbody id="searchResults">
            <?php //to query db and show all books with info
            $sql="SELECT * FROM book_details";
            $result=$con->query($sql);
            if($result->num_rows==0){
                echo "No books in the DB";
            }else{
                $i=1;
                while($row=$result->fetch_assoc()){
                    //name: id,title,author, genre, publisher, ISBN
                    $title=$row['title'];
                    $author=$row['author'];
                    $genre=$row['genre'];
                    $publisher=$row['publisher'];
                    $isbn=$row['ISBN'];
                    echo "<tr> <td>$i</td> <td>$title</td> <td>$author</td> <td>$genre</td> <td>$publisher</td> <td>$isbn</td> </tr>";
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
    
</body>
</html>
