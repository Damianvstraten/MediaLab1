<?php
    include "layout/header.php";
?>

<nav>
    <ul>
        <li style="padding-left: 20px"><a href="index.html"><img src="images/left-arrow.png" style="height: 20px"></a> <span style="padding-left: 10px; vertical-align: top">Share to </span></li>
        <li style="text-align: right; padding-right: 20px"><a href="#">Share</a></li>
    </ul>
</nav>

<main>
    <div class="comment" style="padding: 10px">
        <img src="images/test-image.jpeg" width="50" height="50">
        <form style="display: inline-block">
            <input type="text" placeholder="Write a caption..">
        </form>
    </div>
    <form action="mailTemplate.php" method="POST">
        <ul class="option-list">
            <li>Add Location</li>
            <li>Tag people</li>
            <li style="box-shadow: none">Share To</li>
            <ul>
                <li style="box-shadow: none; padding: 5px 15px" class="share-option">
                    <div class="share-name">
                        <span>Facebook</span>
                    </div>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </li>

                <li style="box-shadow: none; padding: 5px 15px" class="share-option">
                    <div class="share-name">
                        <span>Twitter</span>
                    </div>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2">
                        <label class="onoffswitch-label" for="myonoffswitch2">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </li>

                <li style="box-shadow: none; padding: 5px 15px" class="share-option">
                    <div class="share-name">
                        <span>Tumblr</span>
                    </div>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch3" class="onoffswitch-checkbox" id="myonoffswitch3">
                        <label class="onoffswitch-label" for="myonoffswitch3">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </li>

                <li style="padding: 5px 15px" class="share-option">
                    <div class="share-name">
                        <span>Ouderen</span>
                    </div>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch4" class="onoffswitch-checkbox" id="myonoffswitch4" >
                        <label class="onoffswitch-label" for="myonoffswitch4">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </li>
            </ul>
        </ul>
    </form>

    <span style="margin:10px 0 0 15px; display: block; font-size: 14px; color: #999999">Advanced settings</span>
</main>

<?php
    include "layout/footer.php";
?>