<?php
// FILE HANDLING
$location = "assets/docs/newfile.txt";

//CREATE AND WRITE FILE
$myfile = fopen($location,"w") or die("Unable to open a file!"); //fopen() if file exist it'll open, if not exist, it will create it.
$txt = "Sample Text";
fwrite($myfile, $txt);
fclose($myfile); //Closing the file

// OVERWRITING
$myfile = fopen($location,"w");
$txt = "New Text";
fwrite($myfile,$txt);
fclose($myfile);

//READ FILE
$readfile = fopen($location,"r");
echo fread($readfile,filesize($location));
fclose($readfile);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling</title>
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
        padding: 7px 14px;
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
        h1{
            text-align: center;
            font-size: 25px;
            font-family: sans-serif;
            font-weight: initial;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Image</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

            <input type="file" name="file" id="file">
            <input type="submit" name="submit" value="Submit">
        </form>   
        <?php
        function pre_r($data){
            echo "<pre>";
            print_r($data);
            echo "</pre>";
        }
            if (isset($_POST['submit'])) {
                $array = $_FILES['file'];
                // pre_r($array);
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $tmp_name = $_FILES['file']['tmp_name'];
                $error = $_FILES['file']['error'];
                $size = $_FILES['file']['size'];

                $explode = explode('.',$name);
                // pre_r($explode);
                $fileext = strtolower(end($explode));
                // echo $fileext;
                $extention = ['jpg','jpeg','png','webp'];

                $error = [];
                $location = "assets/uploads/".$name;
                if (in_array($fileext,$extention) == false) {
                    $error = "Please upload valid Image!";
                }
                if (file_exists($location)) {
                    $error = "File already Exists!";
                }
                if ($size > 500000) {
                    $error = "File size is too large";
                }
                if (empty($error) == true) {
                    move_uploaded_file($tmp_name,$location);
                    echo "File Uploaded Successfully!";
                }else{
                    echo $error;
                }
            }
        ?> 
    </div>
</body>
</html>