<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    if(isset ($_POST['spara'])) {
    
        $user = trim($_POST['username']);
        $pass = trim($_POST['pass']);
        
        attempt_login($user, $pass);
        
    }

?>

<h1>Login</h1>
<?php echo $_SESSION['msg']; ?><br />
<table>
    <form action="login.php" method="POST">
        
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
        <td><input type="submit" name="spara" value="login"></td>
        </tr>
    </form>
</table>

<?php 
    include("layout/footer.php"); 
?>