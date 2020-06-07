<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
</style>
<?php
// FUNCTIONS

function hello(){
    echo "Hello World";
}
hello();

//---------------------------------------------------------------------------------------

function br(){
    echo "<br>";
}
br(); //break tag :)

//---------------------------------------------------------------------------------------

//FUNCTION ARGUMENT
function name($firstname){
    echo "$firstname Johnson <br>";
}
name("Samuvel");
name("Lewis");

//---------------------------------------------------------------------------------------

// Passing function parameters by reference
function extra(&$extra){
    $extra.=' This is extra';
}
$str = 'YOYO';
extra($str);
echo $str;

//---------------------------------------------------------------------------------------

$willSmith = ['name'=>'Will Smith', 'age' => 51,'height' => '1.88m' ];
$JadaPinkettSmith = ['name'=>'Jada Pinkett Smith', 'age' => 48,'height' => '1.52m' ];
$JadenSmith = ['name'=>'Jaden Smith', 'age' => 21,'height' => '1.7m' ];

function narray($smith, $bgcolor='lightgray'){ //$bgcolor='lightgray' - Default argument values
    echo "<table style='width:10%' bgcolor=$bgcolor>";
    foreach($smith as $key=>$value){
        echo "<tr><td>".ucwords($key)."</td><td>$value</td></tr>"; //ucwords() - Uppercase the first character of each word in a string
    }
    switch ($smith) {
        case $smith['name'] == 'Will Smith':
            echo "<tr><td>Role</td><td>Husband</td></tr>";
            break;
        case $smith['name'] == 'Jada Pinkett Smith':
            echo "<tr><td>Role</td><td>Wife</td></tr>";
            break;
        case $smith['name'] == 'Jaden Smith':
            echo "<tr><td>Role</td><td>Son</td></tr>";
            break;
        default:
        echo "<tr><td>Role</td><td>Unknown</td></tr>";
            break;
    }
    echo "</table>";
}
narray($willSmith);
br();
narray($JadaPinkettSmith,'lightgreen');
br();
narray($JadenSmith,'lightblue');

//---------------------------------------------------------------------------------------