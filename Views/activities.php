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
    <title>Wyszukiwanie</title>
</head>
<body>
<div class="container">
    <a href="?page=logout"> wyloguj się</a>
    <div>
        <?php
        if(isset($results)){
            echo "<ul>";
            foreach($results as $current) {
                $idActivity = $current->getIdActivity();
                $type = $current->getType();
                $date = $current->getDate();
                $gymname =  $current->getGym()->getName();
                $trainer = $current->getTrainer()->getName().$current->getTrainer()->getSurname();
                echo "<div class=\"resultsbox\">
                           <div class='list'>Miejsce: $gymname</div>
                           <div class='list'>Typ: $type</div>
                           <div class='list'>Data: $date</div>
                           <div class='list'>Trener: $trainer</div>
                            <a href=\"?page=signedup&ids=$idActivity\" type=\"submit\" name=\"id\" value=\"$idActivity\"> ZAPISZ SIĘ</a>
                       </div>";
            }
            echo "</ul>";
        }
        ?>
    </div>
        <div class="motivation">
            <img src="../img/motywacyjne.png">
        </div>
    </div>
</body>
</html>