<?php
include "config_2.php";
include "header.php";
include "navigation.php";
include "main.php";



if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$username."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                       
                        <form method="post" action="">

                            <p class="bs-component">
                                <table>
                                    <tr>
                                        <td>Username</td>
                                        <td><input type = "text" name = "username" class = "box"/></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type = "password" name = "password" class = "box" /></td>
                                    </tr>
                                </table>
                            </p>
                            <p class="bs-component">
                                <center>
                                    <input class="btn btn-success btn-sm" type="submit" name="but_submit"/>
                                </center>
                            </p>
                            <input type="hidden" name="next" value="" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
  </body>
</html>


