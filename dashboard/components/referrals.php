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
</div>
