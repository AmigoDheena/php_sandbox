<?php
    //DB CONNECTION
    $servername = 'localhost';
    $db_name = 'crud';
    $username = 'root';
    $password = '';
    $connect = mysqli_connect($servername,$username,$password,$db_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>PHP CRUD</h1>
    <?php 
        // CHECK DB CONNECTION
        if (!$connect) {
            echo "<div class='isa_error'>Connection Error! ".mysqli_connect_error()."</div>";
            // die();
        }else{
            echo "<div class='isa_info'>DB Connected Successfully!</div>";            
        }

        //CREATE DATABASE
        // if (mysqli_query($connect,"CREATE DATABASE crud")) {
        //     echo "<div class='isa_info'>Database created Successfully!</div>";
        // }else{
        //     echo "<div class='isa_error'>Failed to create Database</div>";
        // }

        // CREATE TABLE
        // $c_table = "CREATE TABLE user(
        //     id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     username varchar(20) NOT NULL,
        //     email varchar(20) NOT NULL,
        //     reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // )";
        // if (mysqli_query($connect,$c_table)) {
        //     echo "<div class='isa_info'>Table created Successfully!</div>";
        // }else{
        //     echo "<div class='isa_error'>Failed to create Table!</div>";
        // }

        // INSERT DATA TO TABLE
        $u_name = $u_email = '';
        $error = [];
        if (isset($_POST['submit'])) {
            if (empty($_POST['username'])) {
                $error = "Please enter your Name!";
            }else{
                $name =  $_POST['username'];
            }
            if (empty($_POST['email'])) {
                $error = "Please enter your ValidEmail!";
            }else{
                $email = $_POST['email'];
            }
            if (empty($error) === true) {
                $insert_data = "INSERT INTO user(username,email) VALUES('$name','$email')";
                if (mysqli_query($connect,$insert_data)) {
                    echo "<div class='isa_success'>Data inserted Successfully!</div>";
                }else{
                    echo "<div class='isa_error'>Failed to insert Data!</div>";
                }
            }
            else{
                echo $error;
            }
        }

        // UPDATE DATA
        $update = false;
        if (isset($_GET['edit'])) {
            $update = true;
            $u_id = $_GET['edit'];
            $uselect_query = "SELECT * FROM user WHERE id=$u_id";
            $select_arr = mysqli_query($connect,$uselect_query);
            $select_asso = mysqli_fetch_array($select_arr);
            $u_name = $select_asso['username'];
            $u_email = $select_asso['email'];
        }
        if (isset($_POST['update'])) {
            $up_id = $_POST['id'];
            $up_name = $_POST['username'];
            $up_email = $_POST['email'];
            $up_query = "UPDATE user SET username='$up_name', email='$up_email' WHERE id=$up_id";
            if (mysqli_query($connect,$up_query)) {
                echo "<div class='isa_success'>Data Updated Successfully!</div>";
            }else{
                echo "<div class='isa_error'>Failed to Update Data!</div>";
            }            
        }

        // DELETE DATA
        if (isset($_GET['delete'])) {
            $del_id = $_GET['delete'];
            $del_query = "DELETE FROM user WHERE id=$del_id";
            if (mysqli_query($connect,$del_query)) {
                echo "<div class='isa_success'>Data Deleted Successfully!</div>";
            }else{
                echo "<div class='isa_error'>Failed to Delete Data!</div>";
            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $u_id ?>">
        Name: <input type="text" name="username" value="<?php echo $u_name ?>"> <br>
        Email: <input type="email" name="email" value="<?php echo $u_email ?>"> <br><br>
        <?php
        if ($update == true) { ?>
            <input type="submit" name="update" value="Update"><br><br>
        <?php }else{ ?>
            <input type="submit" name="submit" value="Submit"><br><br>
        <?php } ?>
    </form>

    <?php       
        //SELECT ROWS FROM TABLE
        $select = "SELECT id,username,email,reg_date FROM user";
        $select_query = mysqli_query($connect,$select);

        if (mysqli_num_rows($select_query) > 0) {
            echo "<table id='selecttable'><tr><th>ID</th><th>Name</th><th>Email ID</th><th>Reg Date</th><th colspan='2'>Action</th>";
            while($row = mysqli_fetch_assoc($select_query)){
                echo "<tr><td>".$row['id']
                    ."</td><td>".$row['username']
                    ."</td><td>".$row['email']
                    ."</td><td>".$row['reg_date']
                    ."</td><td><a href='index.php?edit=$row[id]' class='btn'>Edit</a>"
                    ."</td><td><a href='index.php?delete=$row[id]' class='btn'>Delete</a>";
            }
        }        
    ?>
</div>
</body>
</html>