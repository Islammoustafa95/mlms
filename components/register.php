<div class="registerBlk">
    <div class="centerWrap">
        <form class="registerForm" action="dashboard.php" method="post">
            <h1 class="registerFormTitle">MLMS Register</h1>
            <div class="fullNameArea">
                <label for="name">Full Name</label>
                <input class="form-control" type="text" id="name" name="name" autocomplete="username" required>
            </div>
            <div class="usernameArea">
                <label for="username">New Username</label>
                <input class="form-control" type="text" id="username" name="username" minlength="3" maxlength="55" autocomplete="username" required>
            </div>
            <div class="passwordArea">
                <label for="password">New Password</label>
                <input class="form-control" type="password" id="password" name="password" minlength="4" maxlength="55" autocomplete="new-password" required>
            </div>
            <div class="rpasswordArea">
                <label for="rPassword">Repeat Password</label>
                <input class="form-control" type="password" id="rPassword" name="rPassword" minlength="4" maxlength="55" autocomplete="new-password" required>
            </div>
            <div class="uplineArea">
                <label for="upline">Upline</label>
                <input class="form-control" type="text" id="upline" name="upline" required>
            </div>
            <div class="registerBtnArea">
                <div class="toLoginArea">
                    <p class="toLogin">Already have an account? <span><a href="index.php">Login</a></span>.</p>
                </div>
                <input class="btn btn-primary" type="submit" value="Register">
            </div>
            <div class="registerNoticeArea">
                By clicking register, you agree to our <span><a href="terms_and_conditions.html">Terms &amp; Conditions</a></span> and <span><a href="privacy_policy.html">Privacy Policy</a></span>.
            </div>
        </form>
    </div>
</div>
