<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/classes/LoginClass.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $loginOperation = new LoginClass();
        $value = $loginOperation->login();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{
            position: absolute;
            top: 35%;
            left: 40%;
            margin-top: -50px;
            margin-left: -50px;
            width: 350px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($value): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $value; ?>
                </div>
            <?php endif; ?>
                <div class="wrapper">
                    <h2>Login</h2>
                    <p>Please fill in your credentials to login.</p>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                           <!-- <span class="help-block"><?php echo $username_err; ?></span> -->
                        </div>    
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                         <!--   <span class="help-block"><?php echo $password_err; ?></span> -->
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                    </form>
                </div>  
            </div>
        </div>
    </div>      
</body>
</html>