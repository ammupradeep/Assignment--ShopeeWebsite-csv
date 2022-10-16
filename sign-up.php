<?php include('partials/header.php'); ?>

<!-- Sign up section starts here -->
<section class="sign-up">
    <div class="container">
        <div class="sign-up-form">
            <form action="./API/signupApi.php" method="post">
                <h2>SIGNUP</h2>
                
                    <input type="text" 
                        name="username" 
                        placeholder="User Name"
                        value="" ><br>

                    <input type="text" 
                        name="email" 
                        placeholder="Email ID"
                        value=""><br>

                <input type="password"
                    name="password" 
                    placeholder="Password"><br>

                <button type="submit" class="btn btn-primary">SIGNUP</button>
                <a href="login.php" class="ca">Already have an account?</a>
            </form>
        </div>
    </div>
</section>
<!-- Sign up section ends here -->

<script src="sign-up.js"></script>

<?php include('partials/footer.php'); ?>