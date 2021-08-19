window.onload = function(){ 
    // your code 
    var wrapper = document.getElementById("wrapper");

    var poplink = document.getElementById("delivery_link");

    var modal = document.getElementById("divModal");

    var close_icon = document.getElementsByClassName("Oval")[0];

    var btn = document.getElementsByClassName("BtnBg")[0];

    var closelink = document.getElementsByClassName("Anuluj")[0];

    poplink.onclick = function(){
        modal.style.display = "block";
        wrapper.style.visibility="visible";
    };
    btn.onclick = function(){
        modal.style.display = "none";
        wrapper.style.visibility="hidden";
    };
    closelink.onclick = function(){
        modal.style.display = "none";
        wrapper.style.visibility="hidden";
    };
    close_icon.onclick = function(){
        modal.style.display = "none";
        wrapper.style.visibility="hidden";
    };
    window.onclick = function(event) {
        if (event.target == wrapper) {
          modal.style.display = "none";
          wrapper.style.visibility="hidden";
        };
    };
};
