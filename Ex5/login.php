<?php
$pageTitle = "Login";
include_once 'autoloader.php';
include_once 'fragments/header.php';
if(isset($_POST["user"]) && isset($_POST["password"])) {
    $utilisateurs = new Utilisateur();
    $utilisateur = $utilisateurs->find("(username = '" . $_POST["user"] . "' OR email = '" . $_POST["user"] . "') AND password = '" . $_POST["password"] . "'");
    if(!isset($utilisateur[0])) {
        header('location: login.php?error=1');
        exit();
    }
    $utilisateur = $utilisateur[0];
    $_SESSION["user"] = $utilisateur->username;
    $_SESSION["email"] = $utilisateur->email;
    $_SESSION["role"] = $utilisateur->role;
    header('location: index.php');
    exit();
}
?>
<canvas id="canvas"></canvas>

<script src="canvas.js"></script>

<div class="container">
    <form action="" method="POST">
        <div class="container alert alert-light text-center h-50 absolute x-y-centered stdWidth">
            <div class="container relative x-y-centered">
                <?php if(isset($_GET["error"])) {
                    echo "Please give the credentials of a valid user";
                }
                ?>
                <div class="row">
                    <div class="col">
                        username or email :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="user">
                    </div>
                    <div class="col">
                        password :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="password">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" class="btn btn-primary w-25 border border-primary relative x-centered" value="login">
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once 'fragments/footer.php' ?>