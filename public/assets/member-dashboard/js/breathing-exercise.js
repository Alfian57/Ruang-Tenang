document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const timerSelect = document.getElementById("timer");
    const startBtn = document.getElementById("start-btn");
    const pauseBtn = document.getElementById("pause-btn");
    const repeatBtn = document.getElementById("repeat-btn");
    const inhaleProgress = document.getElementById("inhale-progress");
    const holdProgress = document.getElementById("hold-progress");
    const exhaleProgress = document.getElementById("exhale-progress");

    // State variables
    let isRunning = false;
    let isPaused = false;
    let currentPhase = "inhale"; // 'inhale', 'hold', 'exhale'
    let phaseProgress = 0;
    let interval;
    let cycleCount = 0;
    let totalElapsedTime = 0; // Track total elapsed time in seconds

    // Get phase duration from timer select (in seconds)
    function getPhaseDuration() {
        const value = timerSelect.value;
        return parseInt(value);
    }

    // Get breathing pattern based on user selection
    function getBreathingPattern() {
        const phaseDuration = getPhaseDuration();
        return {
            inhale: phaseDuration,
            hold: phaseDuration,
            exhale: phaseDuration,
        };
    }

    // Reset progress bars
    function resetProgress() {
        inhaleProgress.style.width = "0%";
        holdProgress.style.width = "0%";
        exhaleProgress.style.width = "0%";
        phaseProgress = 0;
        currentPhase = "inhale";
        cycleCount = 0;
        totalElapsedTime = 0;
    }

    // Update progress bar for current phase
    function updateProgress() {
        const breathingPattern = getBreathingPattern();
        const totalPhaseTime = breathingPattern[currentPhase];
        const progressPercent = (phaseProgress / totalPhaseTime) * 100;

        // Reset all progress bars
        inhaleProgress.style.width = "0%";
        holdProgress.style.width = "0%";
        exhaleProgress.style.width = "0%";

        // Update current phase progress and instruction
        switch (currentPhase) {
            case "inhale":
                inhaleProgress.style.width = progressPercent + "%";
                break;
            case "hold":
                inhaleProgress.style.width = "100%";
                holdProgress.style.width = progressPercent + "%";
                break;
            case "exhale":
                inhaleProgress.style.width = "100%";
                holdProgress.style.width = "100%";
                exhaleProgress.style.width = progressPercent + "%";
                break;
        }
    }

    // Start breathing exercise
    function startBreathing() {
        if (isPaused) {
            isPaused = false;
            isRunning = true;
        } else {
            resetProgress();
            isRunning = true;
            cycleCount = 0;
        }

        startBtn.disabled = true;
        pauseBtn.disabled = false;

        interval = setInterval(() => {
            phaseProgress += 0.1; // Update every 100ms
            const breathingPattern = getBreathingPattern();
            const totalPhaseTime = breathingPattern[currentPhase];

            updateProgress();

            // Check if current phase is complete
            if (phaseProgress >= totalPhaseTime) {
                phaseProgress = 0;

                // Move to next phase
                switch (currentPhase) {
                    case "inhale":
                        currentPhase = "hold";
                        break;
                    case "hold":
                        currentPhase = "exhale";
                        break;
                    case "exhale":
                        currentPhase = "inhale";
                        cycleCount++;

                        // For continuous breathing, we can limit cycles if needed
                        // Currently runs indefinitely until user stops
                        break;
                }
            }
        }, 100);
    }

    // Pause breathing exercise
    function pauseBreathing() {
        if (isRunning) {
            clearInterval(interval);
            isRunning = false;
            isPaused = true;
            startBtn.disabled = false;
            pauseBtn.disabled = true;
        }
    }

    // Stop and reset breathing exercise
    function stopBreathing() {
        clearInterval(interval);
        isRunning = false;
        isPaused = false;
        resetProgress();
        startBtn.disabled = false;
        pauseBtn.disabled = true;
    }

    // Event listeners
    startBtn.addEventListener("click", startBreathing);
    pauseBtn.addEventListener("click", pauseBreathing);
    repeatBtn.addEventListener("click", stopBreathing);

    // Initialize
    pauseBtn.disabled = true;
});
