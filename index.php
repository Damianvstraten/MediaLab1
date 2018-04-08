<?php
 include "layout/header.php";

?>
<nav>
    <ul>
        <li style="padding-left: 20px"></li>
        <li style="text-align: center"></li>
        <li style="text-align: right; padding-right: 20px"><a href="filter.php">Next</a></li>
    </ul>
</nav>

<footer style=" box-shadow: 2px -2px 1px gainsboro;">
    <ul class="main-footer">
        <li><img src="images/house-black-silhouette-without-door.png"></li>
        <li><img src="images/search.png"></li>
        <li>
            <form method="POST" enctype="multipart/form-data" name="image-form" action="share.php">
                <div class="image-upload">
                    <label for="file-input">
                        <img src="images/plus-symbol-in-a-rounded-black-square.png">
                    </label>

                    <input id="file-input" name="images[]" type="file" accept="image/*" multiple />
                </div>
                <input type="submit" name="submit">
            </form>
        </li>
        <li><img src="images/valentines-heart.png"></li>
        <li><img src="images/user-silhouette.png"></li>
    </ul>
</footer>
