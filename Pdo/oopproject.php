<?php
require ("connection.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signup Form</title>
</head>

<body>
    <div class="box">
        <div class="sign">
            <header class="signup">


                <h1>Signup</h1>
                <p>It takes only 30 seconds</p>

            </header>
            <main class="formbody">
                <form action="Signup.php">
                    <p>
                        <label for="username">Username</label>
                        <input type="text" id="username" placeholder="Enter your name" name="username" required>
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="abcd@gmail.com" name="email" required>
                    </p>
                    <p>
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Must contain Alpha Numeric"name="password" required>
                    </p>
                    <p>
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </p>
                    <p>
                        <button type="submit">Create Account</button>
                    </p>
                    <footer class="footer">
                    <p>

                        Already have an account.? <a href="">Login</a>
                    </p>
                </footer>
                </form>
            </main>

        </div>
    </div>

</body>

</html>