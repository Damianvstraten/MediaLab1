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
    }
    

    $directory = "uploads/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    foreach($scanned_directory as $value){
        echo "$value <br>";
    }
?>

<nav>
    <ul>
        <li style="padding-left: 20px"><a href="filter.php"><img src="images/left-arrow.png" style="height: 20px"></a> <span style="padding-left: 10px; vertical-align: top">Share to </span></li>
        <li style="text-align: right; padding-right: 20px"><a href="#">Share</a></li>
    </ul>
</nav>

<main>
    <div class="comment" style="padding: 10px">
        <form>
            <!-- <img src="images/test-image.jpeg" width="50" height="50">
            <input type="text" placeholder="Write a caption.."> -->
            <div class="grid-container">
                <?php foreach($scanned_directory as $value) : ?>
                    <div class="grid-item">
                        <img src="uploads/<?= $value ?>" width="50" height="50">
                        <input type="text" placeholder="Write a caption..">
                    </div>
                <?php endforeach; ?>
             </div>
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