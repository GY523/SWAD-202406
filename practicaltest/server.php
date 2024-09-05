<?php
require("database.php");

if(isset($_GET['action']) && $_GET['action']==='liveSearch'){
    $sPhrase= $_GET['phrase'];
    //name: id,title,author, genre, publisher, ISBN
    $sql="SELECT * FROM book_details WHERE title LIKE '%$sPhrase%' 
    OR author LIKE '%$sPhrase%' 
    OR genre LIKE '%$sPhrase%' 
    OR publisher LIKE '%$sPhrase%'
    OR ISBN LIKE '%$sPhrase%'";
    $result=$con->query($sql);
    if($result->num_rows ==0){
        echo "E:No matching records found for the keyword entered";
    }else{
        //print the query results out
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
}
?>