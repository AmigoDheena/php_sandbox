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
        /*if (mysqli_query($connect,"CREATE DATABASE crud")) {
            echo "<div class='isa_info'>Database created Successfully!</div>";
        }else{
            echo "<div class='isa_error'>Failed to create Database</div>";
        }*/

        // CREATE TABLE
        /*$c_table = "CREATE TABLE user(
            id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username varchar(20) NOT NULL,
            email varchar(20) NOT NULL,
            reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($connect,$c_table)) {
            echo "<div class='isa_info'>Table created Successfully!</div>";
        }else{
            echo "<div class='isa_error'>Failed to create Table!</div>";
        }*/

        // INSERT DATA TO TABLE
        $name = $email = '';
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
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        Name: <input type="text" name="username" value="<?php echo $name ?>"> <br>
        Email: <input type="email" name="email" value="<?php echo $email ?>"> <br><br>
        <input type="submit" name="submit" value="Submit"><br><br>
    </form>

    <?php
function br($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

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