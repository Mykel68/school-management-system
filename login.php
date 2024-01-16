<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>Login form</title>
</head>
<body>
    <h1 class="text-center">Login form</h1>
    <h4>
        <?php
        error_reporting(0);
        session_start();
        session_destroy();
        echo $_SESSION['loginMessage'];
        ?>
    </h4>
    <div class="container" class='d-flex justify-content-center'>
        <form action="login_check.php" method="POST" >
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            <div class="mb-3">
            <input type="submit" value="Login" name='login' class='btn btn-primary'>
            </div>
            
        </form>
    </div>
    
</body>
</html>