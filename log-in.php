<?php include('partials/header.php'); ?>

<section class="log-in">
    <div class="container">
        <div class="log-in-form">
            <form action="./API/loginApi.php" method="post">
                <h2>LOGIN</h2>
                <?php if(isset($_GET['error'])){?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" name="username" placeholder="User Name" autofocus><br>
                <input type="password" name="password" placeholder="Password"><br>

                <button type="submit" class="btn btn-primary">LOGIN</button>
                <a href="index.php" class="ca">Create an account</a>
            </form>
        </div>
    </div>
</section>

<?php include('partials/footer.php'); ?>