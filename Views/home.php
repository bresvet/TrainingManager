<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../css/login.css">
    <link rel="Stylesheet" type="text/css" href="../css/background.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <a href="?page=logout"> wyloguj się</a>
        <form>
            <?php
                if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
                    echo "<a href=\"?page=login\"><img src=\"../img/zarezerwuj.svg\"/></a>";
                }
                else{
                    echo "<a href=\"?page=activities\"> <img src=\"../img/zarezerwuj.svg\"/></a>";
                }
            ?>
        </form>
    </div>
</body>
</html