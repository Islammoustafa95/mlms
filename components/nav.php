<div class="topNav">
    <button class="navBarToggler">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </button>
    <h1 class="navBrand">MLMS</h1>
</div>
<div class="sideNav">
    <div class="sideNavBlk">
        <ul class="sideNavLinks">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</div>
<div class="navBarToggler navOverlay"></div>
<script>
    var themeData;
    function updateTheme() {
        $.ajax({
                url: 'php/action_get_user_theme.php',
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                dataType: 'json',
            })
            .done(function(response) {
                if (response.result == 1) {
                    themeData = response.themeData;
                    let primaryColor = themeData.primaryColor;
                    let secondaryColor = themeData.secondaryColor;
                    let backgroundColor = themeData.backgroundColor;
                    let textColor = themeData.textColor;
                    if (primaryColor != "") $(document.body).css("--primary", primaryColor);
                    if (secondaryColor != "") $(document.body).css("--secondary", secondaryColor);
                    if (backgroundColor != "") $(document.body).css("--background", backgroundColor);
                    if (textColor != "") $(document.body).css("--textColor", textColor);
                }
            });
    }
    document.addEventListener("DOMContentLoaded", function(event) {
        $(".sideNavLinks li").click(function() {
            let href = $(this).children("a").attr("href");
            window.location.href = href;
        });
        $(".navBarToggler").click(function() {
            let el = $(".navBarToggler");
            if (el.hasClass("change")) {
                el.removeClass("change");
                $(".sideNav").animate({
                    width: '0px'
                }, 0);
                $(".navBarToggler.navOverlay").fadeOut('fast');
            } else {
                el.addClass("change");
                $(".sideNav").animate({
                    width: '80%',
                }, 0);
                $(".navBarToggler.navOverlay").fadeIn('fast');
            }
        });
        updateTheme();
    });

</script>
