<?php
    //SQL OOP
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'sqloop';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL OOP</title>
    <link rel="stylesheet" href="../CRUD/style.css">
</head>
<body>
    <div class="container">
    <h1>SQL OOP</h1>
    <?php
        // DB CONNECTION CHECK
        $connect = new mysqli($servername,$username,$password,$db);
        if($connect->connect_error){
            echo "Connection failed!".mysqli_connect_error();
        }else{
            echo "<div class='isa_success'>Connected Successfully!</div>";
        }        

        //CREATE DB
        if (!mysqli_select_db($connect,$db)) {
            $createDB = "CREATE DATABASE $db";
            if ($connect->query($createDB) == true) {
                echo "<div class='isa_info'>Database created Successfully!</div>";
            }else{
                echo "<div class='isa_error'>Failed to create a Database!".$connect->error."</div>";
            }
        }else{
            echo "<div class='isa_info'> $db Database already exist</div>";
        }

        // CREATE TABLE
        // $create_table = "CREATE TABLE user(
        //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     username VARCHAR(20) NOT NULL,
        //     email VARCHAR(20),
        //     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // )";

        // $select_table = "SELECT id FROM TABLE user";
        // $select_table_result = $connect->query($select_table);
        // if ($connect->query($create_table) == true) {
        //     echo "Table created Successfully";
        // }else {
        //     echo "Table created Failed".$connect->error;
        // }

        // INSERT DATA TO DB
        $error = [];
        $name = $email = '';
        if (isset($_POST['submit'])) {
            if (empty($_POST['username'])) {
                $error = "Pleaes enter your name";
            }else{
                $name = $_POST['username'];
            }
            if (empty($_POST['email'])) {
                $error = "Please enter your Email";
            }else{
                $email = $_POST['email'];
            }

            if (empty($error) === true ) {
                $insert_query = "INSERT INTO user (username,email) VALUES('$name','$email')";
                if ($connect->query($insert_query)) {
                    echo "<div class='isa_success'>Data inserted Successfully</div>";
                }else{
                    echo "<div class='isa_error'>Failed to insert data</div>";
                }
            }else{
                echo $error;
            }
        }

        // UPDATE DATA
        $update = false;
        $u_name = $u_email = '';
        if (isset($_GET['edit'])) {
            $update = true;
            $u_id = $_GET['edit'];
            $u_select_query = "SELECT * FROM user WHERE id=$u_id";
            $u_select_query_result = $connect->query($u_select_query);
            // $select_assoc = mysqli_fetch_assoc($u_select_query_result);
            $select_assoc = $u_select_query_result->fetch_assoc();
            $u_name = $select_assoc['username'];
            $u_email = $select_assoc['email'];
        }
        if (isset($_POST['update'])) {
            $updated_id = $_POST['id'];
            $updated_name = $_POST['username'];
            $updated_email = $_POST['email'];
            $update_query = "UPDATE user SET username= '$updated_name', email='$updated_email' WHERE id=$updated_id";
            if ($connect->query($update_query)) {
                echo "<div class='isa_success'>Data Updated Successfully</div>";
            }else{
                echo "<div class='isa_error'>Failed to insert data".$connect->error . "</div>";
            }
        }

        // DELETE DATA
        if (isset($_GET['delete'])) {
            $del_id = $_GET['delete'];
            $del_query = "DELETE FROM user WHERE id=$del_id";
            if ($connect->query($del_query)) {
                echo "<div class='isa_success'>Data Deleted Successfully</div>";
            }else{
                echo "<div class='isa_error'>Failed to Delete data".$connect->error . "</div>";
            }
        }

    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $u_id ?>">
            Name: <input type="text" name="username" value="<?php echo $u_name?>"> <br><br>
            Email: <input type="text" name="email" value="<?php echo $u_email?>"><br><br>
            <?php
            if ($update == true) { ?>
                <input type="submit" name="update" value="Update"><br><br>
            <?php }else{ ?>
                <input type="submit" name="submit" value="Submit"><br><br>
            <?php } ?>
        </form>

        <?php
        // SELECT DATA FROM TABLE
            $select_query = "SELECT id,username,email,reg_date FROM user";
            $select_query_result = $connect->query($select_query);
            if ($select_query_result->num_rows > 0) {
                echo "<table id='selecttable'><tr><th>ID</th><th>Name</th><th>Email ID</th><th>Reg Date</th><th colspan='2'>Action</th>";
                while ($row=$select_query_result->fetch_assoc()) {
                    echo "<tr><td>".$row['id']
                    ."</td><td>".$row['username']
                    ."</td><td>".$row['email']
                    ."</td><td>".$row['reg_date']
                    ."</td><td><a href='sql.php?edit=$row[id]' class='btn'>Edit </a>"
                    ."</td><td><a href='sql.php?delete=$row[id]' class='btn'>Delete</a>";
                }
            }
        ?>
    </div>
</body>
</html>