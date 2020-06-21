<?php

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