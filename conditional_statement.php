<?php
/* 
    IF
    IF ELSE
    IF ELSEIF ELSE
    SWITCH
*/

// IF
$x = 10;
$y = 20;
if ($x == 10) {
    echo '$x is: '. $x . "<br>"; //Result will be: $x is: 10
}

// IF ELSE
if ($x === 20 ) {
    echo '$x is: ' . $x . "<br>"; //$x is not 10
}else{
    echo '$x is not: ' . $x . "<br>";
}

// IF ELSEIF ELSE
if ($x == 100) {
    echo '$x is: ' . $x . "<br>"; //if $x is = 10
}elseif($y == 200){
    echo '$y is: ' . $y . "<br>"; //if $y is = 20
}else{
    echo '$x and $y is not satisfy the above conditions.!'. "<br>";
}

// SWITCH
$x = 300;
switch ($x) {
    case 10:
        echo '$x is: 10'. "<br>";
        break;
    case 20:
        echo '$x is: 20'. "<br>";
        break;
    case 30:
        echo '$x is: 30'. "<br>";
        break;
    case 40:
        echo '$x is: 40'. "<br>";
        break;    
    default:
        echo '$x is not satisfiy the above conditions.!'. "<br>";
        break;
}
?>