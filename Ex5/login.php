<?php
$pageTitle = "Login";
include_once 'autoloader.php';
include_once 'fragments/header.php';
if(isset($_POST["user"])) {
    
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
                        username or email :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="user" id="">
                    </div>
                    <div class="col">
                        password :
                        <br>
                        <input type="text" class="alert alert-light border border-primary" name="password" id="">
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