<?php 

//session_start();

if( $_GET["login"] && $_GET["passwd"]){
    echo "Welcome ". $_GET['login']. "<br />";
    echo "Your password is ". $_GET['passwd'];
}
 /*   $_SESSION['user'] = [
        'email' => $_GET['email']
    ];*/
?>
<html>
<body>
    <form action="<?php $_PHP_SELF ?>" method="get">
        Username: <input type="text" placeholder="" name="login" /> <br />
        Password: <input type="text" placeholder="Enter Password" name="passwd"><br />
        <input type="submit" name="submit" value="OK">
    </form>
</body>
</html>