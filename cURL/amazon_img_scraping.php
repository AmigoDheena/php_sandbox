<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon Image Scraping</title>
    <link rel="stylesheet" href="../assets/css/amazon_img_scraping.css">
</head>
<body>
    <div class="container">    
        <h1>Amazon Image Scraping</h1>        
        <?php

        $curl = curl_init();
        $search_string = 'ps4+games';
        $url = "https://www.amazon.in/s?k=$search_string";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        /*  
            https://m.media-amazon.com/images/I/51DtuAM0HsL._AC_UY218_.jpg
            https://m.media-amazon.com/images/I/71UneM84G7L._AC_UY218_.jpg
        */
        preg_match_all("!https://m.media-amazon.com/images/I/[^/s]*?._AC_UY218_.jpg!",$result,$match_result);
        $images = array_values(array_unique($match_result[0]));
        echo '<div class="row"> ';
        for ($i=0; $i<count($images); $i++) { 
            echo '<div class="column">';
            echo "<img src='$images[$i]'>";
            echo '</div>';
        }
        echo '</div>';
        curl_close($curl);
        ?>
    </div>
</body>
</html>
