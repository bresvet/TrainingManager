<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('You are not logged in!');
}

if(!($_SESSION['role']==="ROLE_ADMIN")) {
    die('You do not have permission to watch this page!');
}
?>

<?php
if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
    die('Musisz się zalogować');
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="../css/background.css"/>
    <link rel="Stylesheet" type="text/css" href="../css/resultbox.css"/>
    <link rel="Stylesheet" type="text/css" href="../css/activity.css"/>
    <title>Admin</title>
</head>
<body>
<div class="container">
    <a href="?page=logout"> wyloguj się</a>
    <div>
        <?php
        if(isset($results)){
            echo "<ul>";
            foreach($results as $current) {
                $idUser = $current->getIdUser();
                $name = $current->getName();
                $surname = $current->getSurname();
                $email =  $current->getEmail();
                echo "<div class=\"resultsbox\">
                           <div class='list'>Imię: $name</div>
                           <div class='list'>Nazwisko: $surname</div>
                           <div class='list'>Email: $email</div>
                            <a href=\"?page=userdeleted&ids=$idUser\" type=\"submit\" name=\"id\" value=\"$idUser\"> USUŃ</a>
                       </div>";
            }
            echo "</ul>";
        }
        ?>
    </div>
</div>
</body>
</html>
