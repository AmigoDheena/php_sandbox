<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    .flex-container {
    display: flex;
    justify-content: center;
    }

    .flex-container > div {
    margin: 10px;
    text-align: center;
    font-size: 30px;
    }

    .flex-container div {
    font-family: -webkit-pictograph;
    color: black;
    font-size: 20px;
    }
</style>
<?php

/*
    ARRAY
        1. Indexed arrays - Arrays with a numeric index
        2. Associative arrays - Arrays with named keys
        3. Multidimensional arrays - Arrays containing one or more arrays
*/

// 1. Indexed arrays
$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0] . "<br>";
echo $cars[1] . "<br>";
echo $cars[2] . "<br>";
echo $cars[3] = "Volkswagen";
echo "<br>";
print_r($cars);
echo "<br><br>";

for ($i=0; $i<count($cars); $i++) { 
    echo $cars[$i] . "<br>";
}

// 2. Associative arrays
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo $age['Peter']."<br>";
$age['John'] = 27;
print_r($age);
echo "<br><br>";

echo "<table style='width:10%''><tr><th>Name</th><th>Age</th></tr>";
foreach ($age as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";

// 3. Multidimensional arrays
$dir = "assets/img";
$files = scandir($dir);
print_r($files);

function pre_r($x){
    echo "<pre>";
    print_r($x);
    echo "</pre>";
}
pre_r($files);
$files = array_diff($files,array('..','.')); // removed '..','.'
pre_r($files);
$files = array_values($files); //reset counting
pre_r($files);

$movies = [];
for ($i=0; $i<count($files) ; $i++) { 
    preg_match("!(.*?)\((.*?)\)!",$files[$i],$result);
    pre_r($result);
    $moviename = $result[1]; //Movie name
    $movies[$moviename]['year'] = $result[2]; // Movie Year
    $movies[$moviename]['image'] = $files[$i]; // Image Name
}
echo "<div class='flex-container'>";
foreach ($movies as $moviename => $info) {
    echo "<div><h3>$moviename</h3><img src='assets/img/$info[image]'><h4>$info[year]</h4></div>";
}
echo "</div>";