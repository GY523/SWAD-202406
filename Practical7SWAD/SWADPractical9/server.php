<?php
$con= new mysqli("localhost","root","","ajax_demo");

if($con->connect_error){
    echo "failed to connect to database:". $con->connect_error;
    exit();
}

if($_SERVER["REQUEST_METHOD"]==="GET"){
    if(isset($_GET['action']) && $_GET['action']==="display"){
        $sql= "SELECT * FROM users";
        $result=$con->query($sql);
        
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                echo "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td><button onclick='editUser(".$row['id'].")'>Edit</button>
                    <button onclick='deleteUser(".$row['id'].")'>Delete</button>
                    </td>
                </tr>";
            }
        }else{
            echo "<tr><td colspan='3' >No users found.</td>
                </tr>";
        }
    }elseif(isset($_GET['action']) && $_GET['action']==='search'){
        $search= $_GET['search'];
        $sql ="SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%';";
        $result=$con->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
            }
        }else{
            echo "<tr>
                <td colspan='2'>No results found</td>
            </tr>";
        }
    }elseif(isset($_GET['action']) && $_GET['action']==='getSingleUser'){
        $userId= $_GET['id'];
        $sql= "SELECT * FROM users WHERE id=$userId";

        $result=$con->query($sql);
        if($result->num_rows > 0){
            $user= $result->fetch_assoc();
            echo json_encode($user);
        }else{
            echo "User not found.";
        }
    }
}elseif($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['action']) && $_POST['action']==='add'){
        $name= $_POST['name'];
        $email=$_POST['email'];
        $sql= "INSERT INTO users (name,email) VALUES ('$name','$email')";

        if($con->query($sql)){
            echo "User added successfully";
        }else{
            echo "Error: ".$sql."<br>".  $con->error;
        }
    }else if(isset($_POST['action']) && $_POST['action']==='edit'){
        $userId= $_POST['id'];
        $name= $_POST['name'];
        $email= $_POST['email'];
        $sql= "UPDATE users SET name='$name', email='$email' WHERE id=$userId ";

        if($con->query($sql)){
            echo "User updated successfully";
        }else{
            echo "Error: ". $sql."<br>". $con->error;
        }
    }else if(isset($_POST['action']) && $_POST['action']==='delete'){
        $userId=$_POST['id'];
        $sql = "DELETE FROM users WHERE id=$userId";

        if($con->query($sql)){
            echo "User deleted successfully";
        }else{
            echo "Error: ".$sql ."<br>". $con->error;
        }
    } 
}

?>