<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Signup</title>
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/login.css">
    <script src="../scripts/login.js" defer></script>
</head>
<body>

    <div class="container">
        <div class="form-container" id="formContainer">
            <form id="loginForm" class="form" action="../backend/login.php" method="POST">
                <h2>Sign In</h2>
                <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="#" id="showSignup">Sign up</a></p>
            </form>

            <form id="signupForm" class="form hidden" action="../backend/signup.php" method="POST">
                <h2>Sign Up</h2>
                <input type="text" name="name" id="signupName" placeholder="Full Name" required>
                <input type="email" name="email" id="signupEmail" placeholder="Email" required>
                <input type="password" name="password" id="signupPassword" placeholder="Password" required>
                <div class="user-type-selection">
                    <label>Register as:</label>
                    <input type="radio" id="customer" name="user_type" value="customer" checked>
                    <label for="customer">Customer</label>
                    <input type="radio" id="agent" name="user_type" value="agent">
                    <label for="agent">Agent</label>
                </div>
                <button type="submit">Register</button>
                <p>Already have an account? <a href="#" id="showLogin">Sign in</a></p>
            </form>

        </div>
    </div>
    
</body>
</html>