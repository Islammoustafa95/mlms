<div class="sideNav">
    <h1 class="sideNavTitle">MLMS</h1>
    <p class="referralCode">Referral Code: <span class="copy">MXZFUF</span><span class="tooltiptext">Copy to Clipboard</span></p>
    <ul class="sideNavLinks">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="index.php">Log Out</a></li>
    </ul>
</div>

<script src="js/util/copyToClipboard.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $(".sideNavLinks li").click(function() {
            let href = $(this).children("a").attr("href");
            window.location.href = href;
        });
        $(".referralCode").click(function() {
            copyToClipboard($(this).children(".copy")[0]);
        });
    });
</script>
