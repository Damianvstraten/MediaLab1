<?php
 include "layout/header.php";

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}


if(isset($_POST["submit"])) {
    $target_dir = "uploads/";

    if (!file_exists($target_dir)) {
        mkdir('uploads/', 0777, true);
    }

    if ($_FILES['images']) {
        $file_ary = reArrayFiles($_FILES['images']);

        foreach ($file_ary as $file) {
            echo $target_file = $target_dir . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                echo "The file " . basename($file['name']) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
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
            <form method="POST" enctype="multipart/form-data" name="image-form">
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
