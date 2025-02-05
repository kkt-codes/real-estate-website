document.addEventListener("DOMContentLoaded", function () {
    // Form Validation
    const form = document.querySelector("form");
    form.addEventListener("submit", function (event) {
        let valid = true;
        const inputs = form.querySelectorAll("input, textarea");

        inputs.forEach(input => {
            if (!input.value.trim()) {
                valid = false;
                input.style.border = "2px solid red";
            } else {
                input.style.border = "1px solid #ccc";
            }
        });

        if (!valid) {
            event.preventDefault();
            alert("Please fill in all required fields.");
        }
    });

    // File Upload Check
    const fileInput = document.getElementById("file");
    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file && file.size > 2 * 1024 * 1024) { // Limit: 2MB
            alert("File size exceeds 2MB. Please upload a smaller file.");
            fileInput.value = ""; // Clear file input
        }
    });

    // Contact Info Toggle (Accordion Effect)
    const infoSections = document.querySelectorAll(".info-section");
    infoSections.forEach(section => {
        const toggleButton = document.createElement("button");
        toggleButton.textContent = "Show More";
        toggleButton.classList.add("toggle-button");
        section.before(toggleButton);
        section.style.display = "none";

        toggleButton.addEventListener("click", function () {
            if (section.style.display === "none") {
                section.style.display = "block";
                toggleButton.textContent = "Show Less";
            } else {
                section.style.display = "none";
                toggleButton.textContent = "Show More";
            }
        });
    });

    // Dark Mode Toggle
    const darkModeToggle = document.createElement("button");
    darkModeToggle.textContent = "Toggle Dark Mode";
    darkModeToggle.classList.add("dark-mode-toggle");
    document.body.prepend(darkModeToggle);

    darkModeToggle.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        localStorage.setItem("dark-mode", document.body.classList.contains("dark-mode") ? "enabled" : "disabled");
    });

    if (localStorage.getItem("dark-mode") === "enabled") {
        document.body.classList.add("dark-mode");
    }

    // Google Maps Responsive Fix
    const map = document.querySelector(".map");
    if (map) {
        function adjustMapSize() {
            if (window.innerWidth < 600) {
                map.style.height = "200px";
            } else {
                map.style.height = "300px";
            }
        }
        adjustMapSize();
        window.addEventListener("resize", adjustMapSize);
    }

    // Inject CSS for Dark Mode and Buttons
    const styles = document.createElement("style");
    styles.innerHTML = `
        .dark-mode {
            background-color: #222;
            color: white;
        }
        .dark-mode input, .dark-mode textarea, .dark-mode button {
            background-color: #333;
            color: white;
            border: 1px solid #555;
        }
        .dark-mode-toggle, .toggle-button {
            display: block;
            margin: 10px auto;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .dark-mode-toggle:hover, .toggle-button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 50rem;
            margin: 1.25rem auto;
            padding: 1.25rem;
            background: #3498db;
            border-radius: 0.3125rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        }
        .map {
            width: 100%;
            height: 18.75rem;
            border: none;
            margin-top: 0.9375rem;
        }
        h1, h2 {
            color: #444;
        }
        h1 {
            text-align: center;
            margin-bottom: 1.25rem;
        }
    `;
    document.head.appendChild(styles);
});
