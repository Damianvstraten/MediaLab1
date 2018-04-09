<?php
    include "layout/header.php";

    $directory = "uploads/";
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
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
                        <div style="display:block">
                            <img src="uploads/<?= $value ?>" >
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </form>
    </div>


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

    <div>
        <form>
            <ul>
                <li>
                    <label class="contact-list">
                        <span class="contact-name" for="Jan">opa Jan</span>
                        <input type="checkbox" class="contact-checkbox" id="Jan">
                    </label>
                </li>
                <li>
                    <label class="contact-list">
                        <span class="contact-name" for="Remko">opa Remko</span>
                        <input type="checkbox" class="contact-checkbox" id="Remko">
                    </label>
                </li>
                <li>
                    <label class="contact-list">
                        <span class="contact-name" for="Maaike">oma Maaike</span>
                        <input type="checkbox" class="contact-checkbox" id="Maaike">
                    </label>
                </li>
                <li>
                    <label class="contact-list">
                        <span class="contact-name" for="Willemijn">oma Willemijn</span>
                        <input type="checkbox" class="contact-checkbox" id="Willemijn">
                    </label>
                </li>
            </ul>
        </form>
    </div>
    <span style="margin:10px 0 0 15px; display: block; font-size: 14px; color: #999999">Advanced settings</span>
    
</main>

<script>
    let checkbox = document.getElementById("myonoffswitch4");
    let checks = document.querySelectorAll(".contact-checkbox");
    let contacts = document.querySelectorAll(".contact-list");

    checkbox.addEventListener("click", () => {
        if(checkbox.checked == true){
            for(let i = 0; i < contacts.length; i++){
                contacts[i].style.display="flex";
            }
        }else{
            for(let i = 0; i < contacts.length; i++){
                contacts[i].style.display="none";
            }
        }
    })

    for(let i = 0; i < checks.length; i++){
        checks[i].addEventListener('change',() => {
            if(checks[i].checked == true){
                console.log(checks[i].id);
            }
        })
    }

</script>

<?php
    include "layout/footer.php";
?>