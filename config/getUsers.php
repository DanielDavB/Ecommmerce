<?php

include "connection.php";

if(isset($_POST["add_record"])){
    $insertStatement = $mysql->prepare("INSERT INTO users(username,password,email)VALUES(?,?,?)");
    $insertStatement->bind_param("sss",$_POST["username"],$_POST["password"],$_POST["email"]);
    $insertStatement->execute();
}

if(isset($_POST["delete_record"])){
    $id = $_POST["record_to_delete"];
    $deleteStatement = $mysql->prepare("DELETE FROM users WHERE id= ?");
    $deleteStatement ->bind_param("i", $id);
    $deleteStatement->execute();
}

$result = $mysql->query("SELECT * FROM users");
$rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <section class="container">
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>email</th>
            <th>actions</th>
        </tr>
        <?php
        foreach($rows as $row){
            printf("
            <tr>
                <td>$row[id]</td>
                <td>$row[username]</td>
                <td>$row[password]</td>
                <td>$row[email]</td>
                <td>
                    <div class=\"class= d-flex\">
                        <a class=\"btn btn-primary\" style=\"width: 132px;\" href=\"updateUser.php?id=$row[id]&pass=$row[password]&email=$row[email]\">Update Record</a>
                        <form action=\"GetUsers.php\" method=\"POST\">
                            <input type=\"submit\" name=\"delete_record\" style=\"width: 132px;\" class=\"btn btn-danger mx-2\" value=\"Delete Record\"></input>
                            <input type=\"hidden\" name=\"record_to_delete\" value=\"$row[id]\"></input>
                        </form>
                    </div>
                </td>
            </tr>
            ");
        }
        
        ?>
    </table>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modelId">Add</button>

    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="getUsers.php" method="POST">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" name="add_record" class="btn btn-success" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
  

</body>
</html>