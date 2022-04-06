function volumeToggle(button) {
    var muted  = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted" ,!muted) ;


    //changing class of the i tag of mute button
    $(button).find("i").toggleClass("fa-volume-xmark") ;
    $(button).find("i").toggleClass("fa-volume-high") ;
}

function previewEnded() {
    $(".previewVideo").toggleClass();
    $(".previewImage").toggleClass();
}