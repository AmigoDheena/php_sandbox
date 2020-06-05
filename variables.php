<?php
// VARIABLES

/* In PHP 
   Variables are start with 
   $ sign 
*/
$x = 'Hello world';
echo $x;
echo "<br>";
echo $x . ', How are you? <br>'; //concordination strings using '.'
echo "$x, How are you? <br>"; // No need to concatenate when using "" double quotes
echo '$x, How are you? <br>'; // when using '' single quotes its print as string :(

$a = 10;
$b = 20;
$c = $d = 30; //This means $c and $d value is equal to 30

echo $a + $b . '<br>';
echo $c . '<br>';
echo $d . '<br>';

/* VARIABLES SCOPE
    1. LOCAL
    2. GLOBAL
    3. STATIC
    */

// 1. LOCAL
    function local_scope(){
        $local_scope = 1; // Declaring inside a function is called LOCAL SCOPE, this is only be accessed within that function
        echo $local_scope . "<br>";
    }
    local_scope();
    //echo $local_scope; //Unable to access Variable from inside function

// 2. GLOBAL
    $global_scope = 2;
    function global_scope(){
        //echo $global_scope . "<br>"; //Unable to access Variable from outside function
    }
    global_scope();
    echo $global_scope . "<br><br>"; //We can acces the variable 

// 3. STATIC
    /*
    each time the function is called, 
    STATIC variable will still have the information it contained from the last time the function was called.
    */
    function static_keyword(){
        static $static = 1; 
        echo $static;
        $static++; 
    }
    static_keyword(); 
    echo "<br>";
    static_keyword();
    echo "<br>";
    static_keyword();
    echo "<br>";
    static_keyword();
    echo "<br>";
    echo "<br>";

// GLOBAL Keyword
    /* The global keyword is used to access a global variable from within a function. */
    $x = 4;
    $y = 5;
    function global_keyword(){
        global $x, $y, $sum;
        $sum = $x + $y;
    }
    global_keyword();
    echo $sum . "<br>";

    /*  PHP also stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable. 
        This array is also accessible from within functions and can be used to update global variables directly.
    */
    
    function globals(){
        $GLOBALS['sum'] = $GLOBALS['x']+$GLOBALS['y'];
    }
    globals();
    echo $sum;

?>