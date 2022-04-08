function volumeToggle(button) {
    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-mute");
    $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
    $(".previewVideo").toggle();
    $(".previewImage").toggle();
}

function goBack() {
    window.history.back();
}

function startHideTimer() {
    var timeOut = null;

    $(document).on("mousemove", function() {
        clearTimeout(timeOut);
        $(".watchNav").fadeIn();

        timeOut = setTimeout(function() {
            $(".watchNav").fadeOut();
        },2000);
    })
}

function initVideo() {
    startHideTimer();
}