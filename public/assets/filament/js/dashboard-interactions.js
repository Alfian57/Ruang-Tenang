// Enhanced Dashboard Interactions
document.addEventListener("DOMContentLoaded", function () {
    // Animate numbers on page load
    function animateNumbers() {
        const numberElements = document.querySelectorAll("[data-animate-number]");

        numberElements.forEach((element) => {
            const finalNumber = parseInt(element.textContent.replace(/,/g, ""));
            const duration = 2000; // 2 seconds
            const startTime = performance.now();

            function updateNumber(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);

                const currentNumber = Math.floor(finalNumber * easeOutQuart(progress));
                element.textContent = currentNumber.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                }
            }

            requestAnimationFrame(updateNumber);
        });
    }

    // Easing function for smooth animation
    function easeOutQuart(t) {
        return 1 - Math.pow(1 - t, 4);
    }

    // Initialize number animations
    setTimeout(animateNumbers, 500);

    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate-fade-in");
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all cards and activity items
    document.querySelectorAll(".dashboard-card, .activity-item").forEach((element) => {
        observer.observe(element);
    });

    // Enhanced hover effects for stat cards
    const statCards = document.querySelectorAll(".stats-card");

    statCards.forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-8px) scale(1.02)";
            this.style.boxShadow = "0 20px 40px rgba(0, 0, 0, 0.15)";
        });

        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0) scale(1)";
            this.style.boxShadow = "0 1px 3px rgba(0, 0, 0, 0.1)";
        });
    });

    // Real-time clock update
    function updateClock() {
        const clockElement = document.querySelector(".dashboard-clock");
        if (clockElement) {
            const now = new Date();
            const options = {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit",
            };
            clockElement.textContent = now.toLocaleDateString("id-ID", options);
        }
    }

    // Update clock every minute
    setInterval(updateClock, 60000);

    // Smooth scroll to sections
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Loading states for buttons
    document.querySelectorAll(".filament-button").forEach((button) => {
        button.addEventListener("click", function () {
            if (!this.disabled) {
                this.style.opacity = "0.7";
                this.style.transform = "scale(0.98)";

                setTimeout(() => {
                    this.style.opacity = "1";
                    this.style.transform = "scale(1)";
                }, 200);
            }
        });
    });

    // Tooltip functionality for status badges
    const statusBadges = document.querySelectorAll(".status-badge");

    statusBadges.forEach((badge) => {
        badge.addEventListener("mouseenter", function () {
            const tooltip = document.createElement("div");
            tooltip.className = "tooltip";
            tooltip.textContent = this.getAttribute("data-tooltip") || this.textContent;
            tooltip.style.cssText = `
                position: absolute;
                background: rgba(0, 0, 0, 0.8);
                color: white;
                padding: 8px 12px;
                border-radius: 6px;
                font-size: 12px;
                z-index: 1000;
                pointer-events: none;
                transform: translateY(-100%);
                white-space: nowrap;
                top: -8px;
                left: 50%;
                transform: translateX(-50%) translateY(-100%);
            `;

            this.style.position = "relative";
            this.appendChild(tooltip);
        });

        badge.addEventListener("mouseleave", function () {
            const tooltip = this.querySelector(".tooltip");
            if (tooltip) {
                tooltip.remove();
            }
        });
    });

    // Auto-refresh data every 5 minutes
    function refreshDashboardData() {
        // Add your refresh logic here
        console.log("Refreshing dashboard data...");

        // You can implement AJAX calls to refresh specific sections
        // without reloading the entire page
    }

    setInterval(refreshDashboardData, 5 * 60 * 1000); // 5 minutes

    // Dark mode toggle enhancement
    const darkModeToggle = document.querySelector("[data-theme-toggle]");
    if (darkModeToggle) {
        darkModeToggle.addEventListener("click", function () {
            document.documentElement.classList.toggle("dark");

            // Add transition effect
            document.body.style.transition = "all 0.3s ease";

            setTimeout(() => {
                document.body.style.transition = "";
            }, 300);
        });
    }

    // Keyboard shortcuts
    document.addEventListener("keydown", function (e) {
        // Ctrl/Cmd + D for dashboard refresh
        if ((e.ctrlKey || e.metaKey) && e.key === "d") {
            e.preventDefault();
            window.location.reload();
        }

        // Ctrl/Cmd + Shift + D for dark mode toggle
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === "D") {
            e.preventDefault();
            document.documentElement.classList.toggle("dark");
        }
    });

    // Progressive loading for heavy content
    const lazyLoadElements = document.querySelectorAll("[data-lazy-load]");

    const lazyObserver = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const src = element.getAttribute("data-lazy-load");

                if (src) {
                    element.setAttribute("src", src);
                    element.removeAttribute("data-lazy-load");
                }

                lazyObserver.unobserve(element);
            }
        });
    });

    lazyLoadElements.forEach((element) => {
        lazyObserver.observe(element);
    });

    // Error handling for failed image loads
    document.querySelectorAll("img").forEach((img) => {
        img.addEventListener("error", function () {
            this.src = "/assets/images/placeholder.svg";
            this.alt = "Image not available";
        });
    });

    // Performance monitoring
    if ("performance" in window) {
        window.addEventListener("load", function () {
            setTimeout(function () {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log("Dashboard loaded in:", pageLoadTime + "ms");
            }, 0);
        });
    }
});

// Utility functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function () {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
}

// Export for module systems
if (typeof module !== "undefined" && module.exports) {
    module.exports = { debounce, throttle };
}
