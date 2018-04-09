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


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";

    if (!file_exists($target_dir)) {
        mkdir('uploads/', 0777, true);
    }

    if ($_FILES['images']) {
        $file_ary = reArrayFiles($_FILES['images']);

        foreach ($file_ary as $file) {
            $target_file = $target_dir . basename($file['name']);
            move_uploaded_file($file['tmp_name'], $target_file);
        }

    }
}

    $directory = "uploads/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    $firstimage = "uploads/" . reset($scanned_directory);
?>

<nav>
    <ul>
        <li style="padding-left: 20px"><a href="index.php"><img src="images/left-arrow.png "style="height: 20px"></a></li>
        <li style="text-align: center"><img src="images/sun.png" style="height: 20px"></li>
        <li style="text-align: right; padding-right: 20px"><a href="share.php">Next</a></li>
    </ul>
</nav>

<main>
    <div class="content">
        <div class="main-image" id="main_image">
            <img src="<?= $firstimage ?>">
        </div>
    </div>

    <div class="filters">
        <div class="filter" id="grey_filter">
            <span>Grey</span>
            <img src="<?= $firstimage ?>" style="-webkit-filter: grayscale(100%); filter: grayscale(100%);">
        </div>

        <div class="filter" id="blur_filter">
            <span>Blur</span>
            <img src="<?= $firstimage ?>" style="filter: blur(2px)">
        </div>

        <div class="filter" id="dark_filter">
            <span>Dark</span>
            <img src="<?= $firstimage ?>" style="filter: brightness(50%)">
        </div>

        <div class="filter" id="light_filter">
            <span>Light</span>
            <img src="<?= $firstimage ?>" style="filter: contrast(40%)">
        </div>
    </div>
</main>


<footer>
    <div class="filter-mode" style="border-bottom: 2px solid black">
        <a style="color: black" href="#">Filter</a>
    </div>
    <div class="filter-mode">
        <a style=" color: #999" href="#">Edit</a>
    </div>
</footer>

<script>
    var main_image = document.getElementById("main_image").getElementsByTagName('img')[0];
    var allFilters = document.querySelectorAll('.filter');

    for(var i = 0; i < allFilters.length; i++) {
        allFilters[i].addEventListener('click', function () {
            var className = this.id;

            main_image.removeAttribute('class');
            main_image.classList.add(className);
        })
    }
</script>

<?php
    include "layout/footer.php";
?>