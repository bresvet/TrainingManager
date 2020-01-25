<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!($_SESSION['role']==="ROLE_ADMIN")) {
    die('You do not have permission to watch this page!');
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../css/signup.css">
    <link rel="Stylesheet" type="text/css" href="../css/background.css">
    <title>User Deleted</title>
</head>
<body>
<div class="container">
    <a>Użytkownik został usunięty</a>
    <a href="?page=admin"><button>OK</button></a>
</div>
</body>
</html