<?php
// ini_set('display_errors', true);
// error_reporting(E_ALL);
/* 
multiline comment
1) simple interest
2) marksheet
3) electricity bill
4) prime numbers

*/
// print_r($_POST);    // for printing arrays
$a = '';
$b = '';
$c = '';
if($_GET){
    if(isset($_GET['txtA']) && !empty($_GET['txtA']) && isset($_GET['txtB']) && !empty($_GET['txtB']) ){
        $a = $_GET['txtA'];
        $b = $_GET['txtB'];
        $c = $_GET['txtC'];
        $d = $a + $b + $c;
    }else{
        echo 'Error : Incomplete form data!';
        die;    // stop 
    }
}

?>
<!doctype html>
<html>
<head>
    <title>Add Numbers</title>
</head>
<body>
    <form method="GET" action="">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr><th colspan="2">Add two numbers</th></tr>
        <tr>
            <td>Enter First Number: </td>
            <td><input type="text" name="txtA" value="<?php echo $a; ?>" /></td>
        </tr>
        <tr>
            <td>Enter Second Number: </td>
            <td><input type="text" name="txtB" value="<?php echo $b; ?>" /></td>
            
        </tr>
        <tr>
            <td>Result: </td>
            <td><?php echo $d; ?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" /></td>
        </tr>
    </table>
    </form>
</body>
</html>