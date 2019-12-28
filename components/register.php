<div class="registerBlk">
    <div class="centerWrap">
        <form class="registerForm" action="dashboard.php" method="post">
            <h1 class="registerFormTitle">MLMS Register</h1>
            <div class="usernameArea">
                <label for="username">New Username</label>
                <input class="form-control" type="text" id="username" name="username" autocomplete="username">
            </div>
            <div class="passwordArea">
                <label for="password">New Password</label>
                <input class="form-control" type="password" id="password" name="password" autocomplete="new-password">
            </div>
            <div class="rpasswordArea">
                <label for="rpassword">Repeat Password</label>
                <input class="form-control" type="password" id="rpassword" name="rpasswor" autocomplete="new-password">
            </div>
            <div class="uplineArea">
                <label for="upline">Upline Code</label>
                <input class="form-control" type="text" id="upline" name="upline">
            </div>
            <div class="registerBtnArea">
                <input class="btn btn-primary" type="submit" value="Register">
                <div class="toLoginArea">
                    <p class="toLogin">Already have an account? <span><a href="index.php">Login</a></span>.</p>
                </div>
            </div>
        </form>
    </div>
</div>
