<?php
    include "layout/header.php"
?>

<nav>
    <ul>
        <li style="padding-left: 20px"><a href="index.html"><img src="images/left-arrow.png "style="height: 20px"></a></li>
        <li style="text-align: center"><img src="images/sun.png" style="height: 20px"></li>
        <li style="text-align: right; padding-right: 20px"><a href="share.html">Next</a></li>
    </ul>
</nav>

<main>
    <div class="content">
        <div class="main-image">
            <img src="images/test-image.jpeg">
        </div>
    </div>

    <div class="filters">
        <div class="filter">
            <span>Grey</span>
            <img src="images/test-image.jpeg" style="-webkit-filter: grayscale(100%); filter: grayscale(100%);">
        </div>

        <div class="filter">
            <span>Blur</span>
            <img src="images/test-image.jpeg" style="filter: blur(2px)">
        </div>

        <div class="filter">
            <span>Dark</span>
            <img src="images/test-image.jpeg" style="filter: brightness(50%)">
        </div>

        <div class="filter">
            <span>Light</span>
            <img src="images/test-image.jpeg" style="filter: contrast(40%)">
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

<?php
    include "layout/footer.php";
?>