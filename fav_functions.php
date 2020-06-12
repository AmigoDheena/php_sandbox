<?php

// BREAK TAG
function br(){
    echo "<br>";
}

// BEAUTIFY ARRAY
function pre_r($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

// BEAUTIFY SCANDIR
function beautify_scandir($dir){
    return array_values(array_diff(scandir($dir),array('.','..')));
}