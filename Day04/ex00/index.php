<?php 

session_start();

if ($_GET && isset($_GET['submit']) && $_GET['submit'] === "OK") {
    if (isset($_GET['login']) && !empty($_GET['login']))
        $_SESSION['login'] = $_GET['login'];
    if (isset($_GET['passwd']) && !empty($_GET['passwd']))
        $_SESSION['passwd'] = $_GET['passwd'];
    echo "Welcome ". $_GET['login']. "<br />";
    echo "Your password is ". $_GET['passwd']."<br />";
   // print_r($_SESSION);
}



// Display
/*
$login = '';
$password = '';
if (isset($_SESSION) && $_SESSION['login'])
    $login = $_SESSION['login'];
if (isset($_SESSION) && $_SESSION['passwd'])
    $password = $_SESSION['passwd'];
    */
?>
<html>
<head>
    <title>Session</title>
</head>
<body>
    <form action="<?php $_PHP_SELF ?>" method="get">
        Username: <input type="text" placeholder="" name="login" /> <br />
        Password: <input type="text" placeholder="Enter Password" name="passwd"><br />
        <input type="submit" name="submit" value="OK">
    </form>
</body>
</html>
