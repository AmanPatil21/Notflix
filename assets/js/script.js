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
    var timeout = null;
    
    $(document).on("mousemove", function() {
        clearTimeout(timeout);
        $(".watchNav").fadeIn();

        timeout = setTimeout(function() {
            $(".watchNav").fadeOut();
        }, 2000);
    })
}

function initVideo(videoId, userName) {
    startHideTimer();
    setStartTime(videoId, userName);
    updateProgressTimer(videoId, userName);
}

function updateProgressTimer(videoId, userName) {
    addDuration(videoId, userName);

    var timer;

    $("video").on("playing", function(event) {
        window.clearInterval(timer);
        timer = window.setInterval(function() {
            updateProgress(videoId, userName, event.target.currentTime);
        }, 3000);
    })
    .on("ended", function() {
        setFinished(videoId, userName);
        window.clearInterval(timer);
    })
}

function addDuration(videoId, userName) {
    $.post("ajax/addDuration.php", { videoId: videoId, userName: userName }, function(data) {
        if(data !== null && data !== "") {
            alert(data);
        }
    })
}

function updateProgress(videoId, userName, progress) {
    $.post("ajax/updateDuration.php", { videoId: videoId, userName: userName, progress: progress}, function(data) {
        if(data !== null && data !== "") {
            alert(data);
        }
    })
}

function setFinished(videoId, userName) {
    $.post("ajax/setFinished.php", { videoId: videoId, userName: userName}, function(data) {
        if(data !== null && data !== "") {
            alert(data);
        }
    })
}

function setStartTime(videoId, userName) {
    $.post("ajax/getProgress.php", { videoId: videoId, userName: userName}, function(data) {
        if(isNaN(data)) { // if error then it is not a number else progress(int)
            alert(data);
            returnl
        }
        $("video").on("canplay", function() {
            this.currentTime = data;
            $("video").off("canplay");
        })
    })
}