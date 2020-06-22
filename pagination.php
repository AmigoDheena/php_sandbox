<?php

   /* 
    $conn = mysqli_connect('localhost','root','');
        mysqli_select_db($conn,'crud');
        if (!$conn) {
            echo "Connection Failed";
        }else{
            $result_per_result = 2;
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);
            $num_of_result = mysqli_num_rows($result);
            // echo $num_of_result;
            // while($row = mysqli_fetch_array($result)){
            //     echo $row['username'] ." -----> ". $row['email'] . "<br>";
            // }

            $number_of_pages = ceil($num_of_result/$result_per_result);

            for ($page=1; $page<=$number_of_pages; $page++) { 
                echo '<a href="pagination.php?page='. $page .'">'. $page .'</a> ';
            }
            echo "<br>";

            if (!isset($_GET['page'])) {
                $page = 1;
            }else{
                $page = $_GET['page'];
            }

            $result_in_page = ($page-1)*$result_per_result;
            $sql = "SELECT * FROM user LIMIT $result_in_page,$result_per_result";
            $nresult = mysqli_query($conn,$sql);
            
            while($row = mysqli_fetch_array($nresult)){
                // print_r($row);
                // echo $row['username'] . " -> ".$row['email'];
                echo $row['username'] ." --> ". $row['email'] . "<br>";
            }
        }
    */
?>

<?php
$conn = mysqli_connect('localhost','root','');
mysqli_select_db($conn,'crud');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="assets/css/pagination.css">
</head>
<body>
    <div class="container">
        <h1>Pagination</h1>
        <?php
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);

            // echo "<table>
            // <tr>
            //     <th>Id</th>
            //     <th>Username</th>
            //     <th>Email</th>
            // </tr>";
            // while ($row = mysqli_fetch_assoc($result)) {
            //     echo "<tr><td>". $row['id'] ." </td><td>". $row['email'] ."</td><td>".$row['email']."</td></tr>";
            // }
            // echo "</table>";
        ?>
        <?php
            $list_per_page = 3;
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);
            $num_of_result = mysqli_num_rows($result);
            // echo $num_of_result;
            $number_of_pages = ceil($num_of_result/$list_per_page);
            // echo $number_of_pages;

            if (!isset($_GET['page'])) {
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }

            $result_in_page = ($page-1)*$list_per_page;
            $sql = "SELECT * FROM user LIMIT $result_in_page,$list_per_page";
            $result = mysqli_query($conn,$sql);
            echo "<table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>". $row['id'] ." </td><td>". $row['email'] ."</td><td>".$row['email']."</td></tr>";
            }
            echo "</table>";
            echo '<div class="pagination">';
            for ($page=1; $page <=$number_of_pages ; $page++) { 
                echo "<a href='pagination.php?page=$page'>$page</a> ";
            }
            echo '</div>';
        ?>
    </div>
</body>
</html>