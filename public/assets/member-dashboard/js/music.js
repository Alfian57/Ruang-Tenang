// Audio player variables
let currentAudio = null;
let isPlaying = false;
let currentSong = null;
let isRepeating = false;

document.addEventListener("DOMContentLoaded", function () {
    // Tambahkan event listener untuk semua category headers
    const categoryHeaders = document.querySelectorAll("[data-category-id]");

    categoryHeaders.forEach((header) => {
        const categoryId = header.dataset.categoryId;

        header.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            toggleDropdown(categoryId);
        });
    });
});

function toggleDropdown(categoryId) {
    const dropdown = document.getElementById("dropdown-" + categoryId);
    const icon = document.getElementById("icon-" + categoryId);

    if (dropdown && icon) {
        const isHidden = dropdown.classList.contains("hidden");

        if (isHidden) {
            dropdown.classList.remove("hidden");
            icon.classList.add("arrow-rotated");
        } else {
            dropdown.classList.add("hidden");
            icon.classList.remove("arrow-rotated");
        }
    } else {
        console.error("Elements not found - dropdown:", dropdown, "icon:", icon);
    }
}

function playMusic(songPath, songTitle, songCategory = "", songElement) {
    // Store previous song element before changing currentSong
    const previousSongElement = currentSong ? currentSong.element : null;

    // Stop current audio if playing
    if (currentAudio) {
        currentAudio.pause();
        currentAudio = null;
    }

    removeAllPlayingAnimations();

    // Reset progress bar of previous song to 100% if it exists
    if (previousSongElement) {
        const previousProgressFill = previousSongElement.querySelector(".progress-fill");
        if (previousProgressFill) {
            previousProgressFill.style.width = "100%";
        }

        // Reset time displays for previous song
        const previousCurrentTimeEl = previousSongElement.querySelector(".current-time");
        const previousTotalTimeEl = previousSongElement.querySelector(".total-time");

        if (previousCurrentTimeEl) previousCurrentTimeEl.textContent = "0:00";
        if (previousTotalTimeEl) previousTotalTimeEl.textContent = "0:00";
    }

    // Create new audio instance
    const audioUrl = songPath.startsWith("http") ? songPath : `/storage/${songPath}`;
    currentAudio = new Audio(audioUrl);
    currentSong = { title: songTitle, category: songCategory, path: songPath, element: songElement };

    // Check if this song has repeat enabled
    const repeatBtn = songElement.querySelector(".repeat-btn");
    if (repeatBtn && repeatBtn.classList.contains("text-blue-300")) {
        isRepeating = true;
        currentAudio.loop = true;
    } else {
        isRepeating = false;
        currentAudio.loop = false;
    }

    // Show progress bar for this song
    const audioPlayer = songElement.querySelector(".song-audio-player");
    if (audioPlayer) {
        audioPlayer.classList.remove("hidden");
    }

    // Add event listeners
    setupAudioEventListeners();

    // Play the audio
    currentAudio
        .play()
        .then(() => {
            isPlaying = true;
            updatePlayPauseButtons();
            addPlayingAnimation(songElement);
        })
        .catch((error) => {
            alert("Gagal memutar audio. Pastikan file audio dapat diakses.");
        });
}

function setupAudioEventListeners() {
    if (!currentAudio) return;

    currentAudio.addEventListener("loadedmetadata", function () {
        updateTimeDisplay();
    });

    currentAudio.addEventListener("timeupdate", function () {
        updateProgress();
        updateTimeDisplay();
    });

    currentAudio.addEventListener("ended", function () {
        if (isRepeating) {
            currentAudio.currentTime = 0;
            currentAudio.play();
        } else {
            isPlaying = false;
            updatePlayPauseButtons();
            removeAllPlayingAnimations();

            // Reset current song progress bar to 100%
            if (currentSong && currentSong.element) {
                const progressFill = currentSong.element.querySelector(".progress-fill");
                if (progressFill) {
                    progressFill.style.width = "100%";
                }
            }
        }
    });

    currentAudio.addEventListener("error", function (e) {
        console.error("Audio error:", e);
        alert("Error loading audio file");
    });
}

function togglePlayPause() {
    if (!currentAudio) return;

    if (isPlaying) {
        currentAudio.pause();
        isPlaying = false;
        removeAllPlayingAnimations();
    } else {
        currentAudio
            .play()
            .then(() => {
                isPlaying = true;
                if (currentSong && currentSong.element) {
                    addPlayingAnimation(currentSong.element);
                }
            })
            .catch((error) => {
                console.error("Error playing audio:", error);
            });
    }
    updatePlayPauseButtons();
}

function stopMusic() {
    if (currentAudio && currentSong) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
        isPlaying = false;
        updatePlayPauseButtons();
        removeAllPlayingAnimations();

        // Reset current song progress bar to 100%
        const progressFill = currentSong.element.querySelector(".progress-fill");
        if (progressFill) {
            progressFill.style.width = "100%";
        }

        // Reset time displays
        const currentTimeEl = currentSong.element.querySelector(".current-time");
        const totalTimeEl = currentSong.element.querySelector(".total-time");

        if (currentTimeEl) currentTimeEl.textContent = "0:00";
        if (totalTimeEl) totalTimeEl.textContent = "0:00";

        // Clear current song reference
        currentAudio = null;
        currentSong = null;
    }
}

function toggleRepeat(buttonElement) {
    const songElement = buttonElement.closest(".song-item");
    const isCurrentlyRepeating = buttonElement.classList.contains("text-blue-300");

    // Reset all repeat buttons first
    const allRepeatBtns = document.querySelectorAll(".repeat-btn");
    allRepeatBtns.forEach((btn) => {
        btn.classList.remove("text-blue-300");
        btn.style.backgroundColor = "";
    });

    // Toggle the clicked button
    if (!isCurrentlyRepeating) {
        buttonElement.classList.add("text-blue-300");
        buttonElement.style.backgroundColor = "#f3b1bd";
        isRepeating = true;
    } else {
        isRepeating = false;
    }

    // Update current audio if it's the same song
    if (currentAudio && currentSong && currentSong.element === songElement) {
        currentAudio.loop = isRepeating;
    }
}

function updatePlayPauseButtons() {
    // Reset all buttons to play state first
    const allPlayIcons = document.querySelectorAll(".play-icon");
    const allPauseIcons = document.querySelectorAll(".pause-icon");

    allPlayIcons.forEach((icon) => icon.classList.remove("hidden"));
    allPauseIcons.forEach((icon) => icon.classList.add("hidden"));

    // Update only the current playing song button
    if (currentSong && currentSong.element && isPlaying) {
        const playIcon = currentSong.element.querySelector(".play-icon");
        const pauseIcon = currentSong.element.querySelector(".pause-icon");

        if (playIcon && pauseIcon) {
            playIcon.classList.add("hidden");
            pauseIcon.classList.remove("hidden");
        }
    }
}

function updateProgress() {
    if (!currentAudio || !currentSong) return;

    const progress = (currentAudio.currentTime / currentAudio.duration) * 100;

    // Update progress bar for the current song only
    const songElement = currentSong.element;
    if (songElement) {
        const progressFill = songElement.querySelector(".progress-fill");
        if (progressFill) {
            progressFill.style.width = `${progress || 0}%`;
        }
    }
}

function updateTimeDisplay() {
    if (!currentAudio || !currentSong) return;

    // Update time display for the current song only
    const songElement = currentSong.element;
    if (songElement) {
        const currentTimeEl = songElement.querySelector(".current-time");
        const totalTimeEl = songElement.querySelector(".total-time");

        if (currentTimeEl) {
            currentTimeEl.textContent = formatTime(currentAudio.currentTime || 0);
        }
        if (totalTimeEl) {
            totalTimeEl.textContent = formatTime(currentAudio.duration || 0);
        }
    }
}

function formatTime(seconds) {
    if (isNaN(seconds)) return "0:00";

    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = Math.floor(seconds % 60);
    return `${minutes}:${remainingSeconds.toString().padStart(2, "0")}`;
}

function addPlayingAnimation(songElement) {
    // Remove active class from all song items
    const allSongItems = document.querySelectorAll(".song-item");
    allSongItems.forEach((item) => {
        item.classList.remove("active");
    });

    // Add active class to current song item
    if (songElement) {
        songElement.classList.add("active");
    }

    const playButton = songElement.querySelector(".song-play-btn");
    if (playButton) {
        playButton.classList.add("playing");
    }
}

function removeAllPlayingAnimations() {
    const playButtons = document.querySelectorAll(".song-play-btn");
    playButtons.forEach((btn) => {
        btn.classList.remove("playing");
    });

    // Remove active class from all song items
    const allSongItems = document.querySelectorAll(".song-item");
    allSongItems.forEach((item) => {
        item.classList.remove("active");
    });
}

function resetAllProgressBars() {
    // Reset all progress bars to 100% and time displays to 0:00
    const allProgressBars = document.querySelectorAll(".progress-fill");
    allProgressBars.forEach((progressBar) => {
        progressBar.style.width = "100%";
    });

    const allCurrentTimes = document.querySelectorAll(".current-time");
    const allTotalTimes = document.querySelectorAll(".total-time");

    allCurrentTimes.forEach((timeEl) => {
        timeEl.textContent = "0:00";
    });

    allTotalTimes.forEach((timeEl) => {
        timeEl.textContent = "0:00";
    });
}

function handlePlayPauseClick(songPath, songTitle, songCategory, songElement) {
    // Check if this is the currently playing song
    if (currentSong && currentSong.path === songPath && currentAudio) {
        // Same song - just toggle play/pause
        togglePlayPause();
    } else {
        // Different song or no song playing - start new song
        playMusic(songPath, songTitle, songCategory, songElement);
    }
}
