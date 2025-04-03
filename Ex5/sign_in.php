<?php
$pageTitle = "sign_in";
include_once 'autoloader.php';
include_once 'fragments/header.php';
if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $utilisateurs = new Utilisateur();
    $utilisateurs->create(["username"=>$_POST["username"], "email"=>$_POST["email"], "password"=>$_POST["password"], "role"=>"utilisateur"]);
    $_SESSION["user"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["role"] = "utilisateur";
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
                <div class="row">
                    <div class="col">
                        username :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="username" id="">
                    </div>
                    <div class="col">
                        email :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="email" id="">
                    </div>
                    <div class="col">
                        password :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="password" id="">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" class="btn btn-primary w-25 border border-primary relative x-centered" value="sign in">
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once 'fragments/footer.php' ?>