<?php
 include "layout/header.php";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["images"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["images"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["images"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
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

                    <input id="file-input" name="images" type="file" accept="image/*" multiple/>
                </div>
                <input type="submit" name="submit">
            </form>
        </li>
        <li><img src="images/valentines-heart.png"></li>
        <li><img src="images/user-silhouette.png"></li>
    </ul>
</footer>
