let checkbox = document.getElementById("myonoffswitch4");

checkbox.addEventListener("click", () => {
    if(checkbox.checked == true){
        console.log("this is true");
    }else{
        console.log("this is false");
    }
})