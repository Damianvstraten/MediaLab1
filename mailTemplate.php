<?php
    include "layout/header.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['contact'])){
            foreach($_POST['contact'] as $send){
                // echo "{$send} <br>";
            }
        }else{
            echo "no contacts";
        }
    }

    $directory = "uploads/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
?>
    <div class="email-container">
        <div class="images">
            <div class="grid-container2">
                <?php foreach($scanned_directory as $value) : ?>
                    <div class="grid-item2">
                        <div style="display:block" class="caption_image">
                            <img src="uploads/<?= $value ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <div class="sender">
            <div class="grid-container3">
                <div class="grid-item3" style="text-align: center;">
                        <img id="sender-pic" src="images/me.jpg">
                </div>
                <div class="grid-item3" style="padding-left: 0.3em; font-family: Comic Sans MS;">
                    <h3>Sender: <br>Sonny Lo</h3>
                    <br>
                    <h3>Beukenstraat 15 <br> 4341 TL GOES</h3>
                </div>

            </div>
        </div>
    </div>

    <script>
 
        let grid = document.querySelectorAll(".grid-item2");
        if(grid.length <= 2){
            document.querySelector(".grid-container2").style.gridTemplateColumns = "auto";
        }else{
            // document.querySelector(".grid-container2").style.gridTemplateColumns = "auto auto";
        }
    </script>

<?php
    include "layout/footer.php";
?>