window.onload = function(){ 
    // your code 
    var poplink = document.getElementById("delivery_link");

    var modal = document.getElementById("divModal");

    var close_icon = document.getElementsByClassName("Oval")[0];

    var btn = document.getElementsByClassName("BtnBg")[0];

    var closelink = document.getElementsByClassName("Anuluj")[0];

    poplink.onclick = function(){
        modal.style.display = "block";
    };
    btn.onclick = function(){
        modal.style.display = "none";
    };
    closelink.onclick = function(){
        modal.style.display = "none";
    };
    close_icon.onclick = function(){
        modal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        };
    };
};
