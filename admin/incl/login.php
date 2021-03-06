<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#E91E63" id="theme_color">
    <title>BamCMS | Login</title>
    <!-- Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <!-- Custom styles -->
    <style>
        body {
            display: flex;
            height: 80vh;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>

<body class="col-xl-4 col-lg-5 col-md-7 col-sm-8 mx-auto">
    <form method="post">
        <div class="text-danger">@ERRORMSG@</div>
        <div class="form-group">
            <label for="login_user_name">User Name</label>
        <input class="form-control" type="text" name="login_user_name" placeholder="Enter User Name" required>
        </div>
        <div class="form-group">
        <label for="login_password">Password</label>
        <input class="form-control" type="text" name="login_password" placeholder="Enter Password" required>
        </div>
        <button class="btn btn-secondary" type="submit">Login</button>
    </form>
</body>