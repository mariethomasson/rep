<?php
session_start();
$_SESSION['msg'] = null;


    function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit;
    }

    
    function find_users_by_name($user) {
        global $db;   
        try{
            $query = "SELECT * FROM users WHERE username = :user";
            $ps = $db->prepare($query);

            $result = $ps->execute([
            'user' => $user
            ]);
            $users = $ps->fetch(PDO::FETCH_ASSOC);
                
            
        }catch(Exception $err) {
            $_SESSION['msg'] = $err;
        }
        return $users;
    }   

    function attempt_login($user, $pass) {
            $users = find_users_by_name($user);
            if($users) {
                if(password_verify($pass, $users['hashed_password'] )) {
                    $_SESSION['id'] = $users['id'];
                    $_SESSION['username'] = $users['username'];
                    $_SESSION['usertype'] = $users['usertype'];
                    redirect_to("home.php");

                    } else {
                        $_SESSION['msg'] = "Failed";
                    }
            } else {
                    $_SESSION['msg'] = "Failed";
             }

    }



                


?>