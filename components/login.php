<div class="loginBlk">
    <div class="centerWrap">
        <form class="loginForm" action="dashboard.php" method="post">
            <h1 class="loginFormTitle">MLMS Login</h1>
            <div class="usernameArea">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" minlength="3" maxlength="55" autocomplete="username" required>
            </div>
            <div class="passwordArea">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" minlength="4" maxlength="55" autocomplete="current-password" required>
            </div>
            <div class="rememberArea">
                <div class="rememberMe">
                    <input type="checkbox" id="remember" name="remember" value="true">
                    <label for="remember">Remember me</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Login">
            </div>
            <div class="goToRegisterArea">
                <p class="toRegister">Don't have an account? <a href="register.php">Register</a>.</p>
            </div>
        </form>
    </div>
</div>
