var isPlaying = true;
    var audio = document.getElementById("audio");
    var btnPlayPause = document.getElementById("btn");
    var seek_slider = document.getElementById("seekslider");
    var curr_time = document.querySelector(".current-time");
    var total_duration = document.querySelector(".total-duration");
    var updateTimer;
    load();

    function load() {
        updateTimer = setInterval(seekUpdate, 1000);
    }

    function playPause() {
        if (isPlaying == true) {
            audio.pause();
            isPlaying = false;
            btn.innerHTML = '<i class="bi bi-play-circle-fill"></i>';
        } else {
            audio.play();
            isPlaying = true;
            btn.innerHTML = '<i class="bi bi-pause-circle-fill"></i>';
        }
    }

    function seekTo() {
        let seekto = audio.duration * (seek_slider.value / 100);
        audio.currentTime = seekto;
        isPlaying = true;
        btn.innerHTML = '<i class="bi bi-pause-circle-fill"></i>';
        audio.play();
    }

    function seekUpdate() {
        let seekPosition = 0;

        if (!isNaN(audio.duration)) {
            seekPosition = audio.currentTime * (100 / audio.duration);

            seek_slider.value = seekPosition;

            let currentMinutes = Math.floor(audio.currentTime / 60);
            let currentSeconds = Math.floor(audio.currentTime - currentMinutes * 60);
            let durationMinutes = Math.floor(audio.duration / 60);
            let durationSeconds = Math.floor(audio.duration - durationMinutes * 60);

            if (currentSeconds < 10) {
                currentSeconds = "0" + currentSeconds;
            }
            if (durationSeconds < 10) {
                durationSeconds = "0" + durationSeconds;
            }
            if (currentMinutes < 10) {
                currentMinutes = "0" + currentMinutes;
            }
            if (durationMinutes < 10) {
                durationMinutes = "0" + durationMinutes;
            }

            curr_time.textContent = currentMinutes + ":" + currentSeconds;
            total_duration.textContent = durationMinutes + ":" + durationSeconds;
        }
    }