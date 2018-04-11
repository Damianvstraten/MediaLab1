<?php
    include "layout/header.html";

//    if($_SERVER["REQUEST_METHOD"] == "POST"){
//        if(!empty($_POST['contact'])){
//
//        } else {
//            echo "no contacts selected";
//        }
//    }

    $directory = "uploads/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

?>
    <div class="email-container" style="border: 1px dashed black;margin: 1em;">
        <div class="images" style="background-image: url('https://stud.hosted.hr.nl/0879504/MediaLab1/images/1.jpg');background-repeat: round; background-size: cover;">
            <div class="grid-container2" style="display: grid; grid-template-columns: auto auto; padding: 10px; text-align: center;">
                <?php foreach($scanned_directory as $value) : ?>
                    <div class="grid-item2" style="margin: 0.3em;">
                        <div style="display:block" class="caption_image">
                            <img src="https://stud.hosted.hr.nl/0879504/MediaLab1/uploads/<?= $value ?>" style=" padding: 0.5em; height: 100%; width: 100%;">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <hr>
        <div class="sender">
            <div class="grid-container3" style="display: grid; grid-template-columns: auto auto; padding: 10px;">
                <div class="grid-item3" style="text-align: center;">
                        <img id="sender-pic" src="https://stud.hosted.hr.nl/0879504/MediaLab1/images/me.jpg" style="width: 150px; height: 150px; padding-top: 2em; border-radius: 50%;">
                </div>
                <div class="grid-item3" style="padding-left: 0.3em; font-family: Comic Sans MS; border: 1px solid black;">
                    <h3>Sender: <br>Sonny Lo</h3>
                    <br>
                    <ul>
                        <?php if(!empty($_POST['contact'])) {foreach($_POST['contact'] as $send): ?>
                            <li> <?= $send ?></li>
                        <?php endforeach; }?>
                    </ul>
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
    include "layout/footer.html";
?>