<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORMS</title>
    <style>
        * {
        box-sizing: border-box;
        }

        input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        }

        input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }

        .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        padding-bottom: 50px;
        width: 20%;
        margin-left: 40%;
        }
        span{
            color: red;
        }
        table, tr, td {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center;">Form</h1>
    <?php
    $name_error = $email_error = $url_error = $comment_error = $gender_error = '';
    $name = $email = $url = $comment = $gender = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $comment = $_POST['comment'];
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            }
            
            if (empty($name)) {
                $name_error = "Please Enter your Name!";
            }
            if (empty($email)) {
                $email_error = "Please Enter your Email!";
            }else{
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "Invalid email format"; 
                 }
            }
            if (empty($url)) {
                $url_error = "Please Enter your URL!";
            }else{
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
                    $url_error = "Invalid URL"; 
                 }
            }
            if (empty($comment)) {
                $comment_error = "Please Enter your Comment!";
            }
            if (!isset($_POST['gender'])) {
                $gender_error = "Please Select your Gender!";
            }
            if (empty($name_error or $email_error or $url_error or $comment_error or $gender_error)) {
                echo "<table>";
                echo "<tr><td>Name</td><td>".$name."</td></tr>";  
                echo "<tr><td>Email</td><td>".$email."</td></tr>";  
                echo "<tr><td>URL</td><td>".$url."</td></tr>";  
                echo "<tr><td>Comment</td><td>".$comment."</td></tr>";
                if (isset($_POST['gender'])) {
                    echo "<tr><td>Gender</td><td>".$gender."</td></tr>";  
                }
                echo "</table><br><br>";
            }
        }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"> <span> <?php echo $name_error; ?> </span> <br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>"> <span> <?php echo $email_error; ?> </span> <br>
        Website: <input type="text" name="url" value="<?php echo $url; ?>"> <span> <?php echo $url_error; ?> </span> <br>
        Comment: <textarea name="comment" cols="30" rows="10"><?php echo $comment; ?></textarea> <span> <?php echo $comment_error; ?> </span> <br>
        Gender: 
        Male:<input type="radio" name="gender"<?php if (isset($gender) && $gender == 'male') { echo "checked"; } ?> value="male">
        Female: <input type="radio" name="gender" <?php if(isset($gender) && $gender == 'female'){ echo "ehecked"; } ?> value="female"> <br> <span> <?php echo $gender_error; ?> </span> <br>
         <input type="submit" name="submit" value="Submit">
    </form>
    
</div> 
</body>
</html>