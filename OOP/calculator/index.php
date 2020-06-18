<?php
    include 'class/calc.class.php';
    include 'includes/calc.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="class/calc.class.php" method="POST">
        <input type="number" name="num1">        
        <input type="number" name="num2">
        <select name="oper">
            <option value="add">Addition</option>
            <option value="sub">Subtraction</option>
            <option value="mul">Multiplication</option>
            <option value="div">Division</option>
        </select>
        <button type="submit" name="submit" >Submit</button>
    </form>
</body>
</html>