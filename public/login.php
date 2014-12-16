<?php
    $db = new PDO("mysql:host=localhost;dbname=blog;", "root", "");

    if(isset ($_POST['spara'])) {
    
        $user = trim($_POST['username']);
        $pass = trim($_POST['pass']);

        try{
            $query = "SELECT * FROM users WHERE username = :user";
            $ps = $db->prepare($query);
            
            $result = $ps->execute([
                'user' => $user
            ]);
            
        }catch(Exception $err) {
            echo $err;
        }

        $users = $ps->fetch(PDO::FETCH_ASSOC); //hämtar en rad
        //$users $ps->fetchAll; //hämtar flera rader
        
        if($users) {
            if(password_verify($pass, $users['hashed_password'] )) {
                echo "Logged in";
            } else {
                echo "Failed";
            }
        } else {
            echo "Failed";
        }
    } else


        
        
?>

<h1>Login</h1>
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