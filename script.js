document.querySelectorAll('.reel').forEach(reel => {
    const video = reel.querySelector('video');
    const playButton = reel.querySelector('.play-button');
    const stopButton = reel.querySelector('.stop-button');
    const videoTime = reel.querySelector('.video-time');
    const videoTimes = reel.querySelector('.video-times');
    const progressBar = reel.querySelector('.progress-bar');
    const progress = reel.querySelector('.progress');

    const updateVideoTime = () => {
        const currentTime = Math.floor(video.currentTime);
        const duration = Math.floor(video.duration);
        const formatTime = (time) => {
            const minutes = String(Math.floor(time / 60)).padStart(2, '0');
            const seconds = String(time % 60).padStart(2, '0');
            return `${minutes}:${seconds}`;
        };
        videoTime.textContent = `${formatTime(currentTime)}`;
        videoTimes.textContent = ` ${formatTime(duration)}`;
        if (duration > 0) {
            const progressPercentage = (currentTime / duration) * 100;
            progress.style.width = `${progressPercentage}%`;
        }
    };

    video.addEventListener('timeupdate', updateVideoTime);

    playButton.addEventListener('click', () => {
        if (video.paused) {
            video.play();
            playButton.style.display = 'none';
            stopButton.style.display = 'block'; 
        } else {
            video.pause();
            playButton.style.display = 'block';
            stopButton.style.display = 'none'; 
        }
    });

    stopButton.addEventListener('click', () => {
        video.pause();
        playButton.style.display = 'block';
        stopButton.style.display = 'none';
        updateVideoTime();
    });

    video.addEventListener('ended', () => {
        playButton.style.display = 'block';
        stopButton.style.display = 'none'; 
        updateVideoTime();
    });
});
