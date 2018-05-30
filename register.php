
<?php
require("config.php");

include("header.php");


if($_POST['submit']=='Save' || strlen($_POST['firstname'])>0 )
{
extract($_POST);
mysql_query("insert into users(firstname,lastname,gender,languages,username,password) values ('$firstname','$lastname','$gender','$languages','$username','$password')",$cn) or die(mysql_error());
echo "<p align=center>user add <b>\"$username\"</b> Added Successfully.</p>";
unset($_POST);
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="Register-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please register Here</h3>
                </div>
                <div class="panel-body">
                	<!--form method="post" action="{% url 'register' %}"-->
                	 <form method="post" >
                       
                        <div class="input-group">
                          <label>firstname</label>
                          <input type="text" name="firstname">
                        </div>
                        <div class="input-group">
                          <label>lastname</label>
                          <input type="text" name="lastname">
                        </div>
                        <div class="input-group">
                          <label>gender</label>
                          <input type="text" name="gender">
                        </div>
                        <div class="input-group">
                          <label>languages</label>
                          <input type="text" name="languages">
                        </div>

                        <div class="input-group">
                          <label>Username</label>
                          <input type="text" name="username">
                        </div>
                        <div class="input-group">
                          <label>Password</label>
                          <input type="password" name="password">
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn" name="submit">Register</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>