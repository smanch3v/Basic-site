<?php
include('sessions.php');
if(!isset($_SESSION['login_user'])){
    header("location: index.php"); //Redirecting to Home Page
}

$content = '<html>
<head>
    <title>Your Home Page</title>
    
</head>
<body>
    <div id=profile>
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href = "logout.php">Log out</a></b>    
    </div>
    <p> Welcome </p>

    
</body>
</html>';


include 'template.php';