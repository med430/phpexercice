<?php
require "Session.php";

$session = new Session();

if(isset($_POST["restart_session"])) {
    $session->restart_session();
}

function nbVisite() {
    global $session;
    if(!$session->isset("nbVisite")) {
        $session->setVariable("nbVisite", 1);
        echo "Bienvenu à notre platforme.";
    } else {
        $session->setVariable("nbVisite", $session->getVariable("nbVisite") + 1);
        echo "Merci pour votre fidélité, c'est votre " . $session->getVariable("nbVisite") . " éme visite.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>nombre de visites</title>
</head>
<body>
    <div class="container alert alert-success text-center">
        <?php
            nbVisite();
        ?>
        <form method="POST">
            <button type="submit" class="btn btn-primary" name="restart_session" text="restart session">restart session</button>
        </form>
    </div>
</body>
</html>