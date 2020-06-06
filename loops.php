<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
</style>
<?php

/* LOOPS
    1. WHILE
    2. DO WHILE
    3. FOR
    4. FOREACH
*/

// 1. WHILE
$x = 0;
while ($x <= 10) {
    echo $x . "<br>";
    // $x++; //Post-increment - Returns $x, then increments $x by one
     $x+=2; //$x + 2
}
echo "<br>";

// 2. DO WHILE
$y = 20;
do{
    echo $y . "<br>";
    $y++; // DO WHILE loop will execute its statements at least once, even if the condition is false. 
}while ($y <= 10);
echo "<br>";

// 3. FOR
for ($i=0; $i<=10 ; $i++) { 
    echo $i . "<br>";
}
echo "<br>";

// 4. FOREACH

//Example:1
$fruit = ['Apple', 'Orange','Banana','Grapes'];
foreach($fruit as $value){
    echo $value . "<br>";
}

//Example:2
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "<table style='width:10%''><tr><th>Name</th><th>Age</th></tr>";
foreach($age as $x=>$val){
    echo "<tr><td>$x</td><td>$val</td></tr>";
}
echo "</table>";