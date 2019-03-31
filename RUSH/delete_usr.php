<?php
    session_start();
    function delete_usr($user)
    {
        if ($_POST['submit'] == "")
            return ;
        if ($_POST['submit'] == "Supprimer" && $user == "")
        {
            echo "<div style=\"color:red;margin:20px\"> This user dosnt exists !</div>";
            echo "user empty";
        }

		$all_users = unserialize(file_get_contents("./data/passwd"));
        //print_r($all_users);
        if (($all_users)){
            print_r($all_users);
            echo("\n-------------\n");
            foreach ($all_users as $arg)
            {
                if ($arg[login] == $user)
                {   
                    // just username echo ("user :$user\n");
                    // just username echo ($arg[login]);
                    //print_r($arg); //the right array we must delete
                    unset($arg);
                   //file_put_contents("./data/passwd", serialize($all_user)); // dont need this
                }
            }
        } else {
            echo ("user doenst exist");
            header("Location: adminpage.php");
        }
    }
    if ($_POST['submit'] == "Supprimer" && $_POST['login'] != NULL)
    {
        $log = $_POST['login'];
        delete_usr($log);
    }
?>