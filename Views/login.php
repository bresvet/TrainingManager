<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../css/login.css">
    <link rel="Stylesheet" type="text/css" href="../css/background.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="?page=login" METHOD="post">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="E-mail">
            <input name="password" type="password" placeholder="Password">
            <button type="submit">LOGIN</button>
            <a href="?page=registration"> <img src="../img/zarSie.svg"/></a>
        </form>
    </div>
</body>
</html>