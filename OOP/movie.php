<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP MOVIE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
//OBJECT ORIENTED PROGRAMMING
class movie{
    var $name;
    var $year;
    var $image;
    var $dir = '../assets/img/';
    
    public function print_movie(){
        echo "<div><h3>{$this->name}</h3>";
        echo "<img src='{$this->dir}{$this->image}'>";
        echo "<h4>{$this->year}</h4></div>";
        // echo $this->name;
        // echo $this->year;
        // echo $this->dir.$this->image;   
    }

    public function set_movie($name,$year,$image){
        $this->name = $name;
        $this->year = $year;
        $this->image = $image;
    }
}
?>

<div class='flex-container'>
    <?php
    $movie = new movie;
    /*$movie->name = 'Aquaman';
    $movie->year = '2018';
    $movie->image = 'Aquaman (2018).jpg';
    $movie->print_movie();

    $movie->name = 'Onward';
    $movie->year = '2020';
    $movie->image = 'Onward (2020).jpg';
    $movie->print_movie();

    $movie->name = 'Sonic the Hedgehog';
    $movie->year = '2020';
    $movie->image = 'Sonic the Hedgehog (2020).jpg';
    $movie->print_movie();

    $movie->name = 'The Call of the Wild';
    $movie->year = '2020';
    $movie->image = 'The Call of the Wild (2020).jpg';
    $movie->print_movie();*/

    //SIMPLIFIED
    $movie->set_movie('Aquaman',2018,'Aquaman (2018).jpg');
    $movie->print_movie();
    $movie->set_movie('Onward',2020,'Onward (2020).jpg');
    $movie->print_movie();
    $movie->set_movie('Sonic the Hedgehog',2020,'Sonic the Hedgehog (2020).jpg');
    $movie->print_movie();
    $movie->set_movie('The Call of the Wild',2020,'The Call of the Wild (2020).jpg');
    $movie->print_movie();
    ?>
</div>
</body>
</html>