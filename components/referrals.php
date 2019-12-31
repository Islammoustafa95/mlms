<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $(".referralItem").click(function() {
            $(this).children(".referralItemDetails").toggle();
        })
    });

</script>

<div class="referralBlk">
    <h3 class="referralBlkTitle">Your Referrals</h3>
    <ul class="referralList">
        <?php 
        $names = array(
    'Christopher',
    'Ryan',
    'Ethan',
    'John',
    'Zoey',
    'Sarah',
    'Michelle',
    'Samantha',
);
            for($i = 0; $i <= sizeOf($names); $i++){
                echo "
                    <li class='referralItem'>
                        <div class='referralItemName'>".$names[$i]."</div>
                        <table class='referralItemDetails'>
                            <tr>
                                <th>Username</th>
                                <td>".$names[$i]."</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <th>Action</th>
                                <td><button class='btn'>Remind payment</button></td>
                            </tr>
                        </table>
                    </li>";
            }
        ?>
    </ul>

    <!--
    
    <table class="referralsTable">
        <tr>
            <th>MyReferral 1</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Direct Referral</td>
            <td>Created Account</td>
            <td> <button class="btn">Remind payment</button> </td>
        </tr>
    </table>
-->


    <!--
    <ul class="directReferrals">
        <li class="referralItem">
            <div>Direct Referral</div>
            <ul class="subReferrals">
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
            </ul>
        </li>
        <li class="referralItem">
            <div>Direct Referral</div>
            <ul class="subReferrals">
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
            </ul>
        </li>
        <li class="referralItem">
            <div>Direct Referral</div>
            <ul class="subReferrals">
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
                <li class="subReferralItem">Sub Referral</li>
            </ul>
        </li>
    </ul>
-->
</div>
