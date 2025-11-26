// Apply saved theme or fallback to day mode
document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;
  const toggle = document.getElementById("modeToggle");
  const savedTheme = localStorage.getItem("theme");

  // Default fallback: day mode
  if (savedTheme === "night") {
    body.classList.add("night-mode");
    toggle.checked = true;
  } else {
    body.classList.add("day-mode");
    toggle.checked = false;
  }
});

// Toggle between day and night mode
function toggleMode() {
  const body = document.body;
  const toggle = document.getElementById("modeToggle");

  if (toggle.checked) {
    // Night mode
    body.classList.remove("day-mode");
    body.classList.add("night-mode");
    localStorage.setItem("theme", "night");
  } else {
    // Day mode
    body.classList.remove("night-mode");
    body.classList.add("day-mode");
    localStorage.setItem("theme", "day");
  }
}

function showPopup() {
  document.querySelector(".popup").classList.add("show");
}

function hidePopup() {
  const popup = document.querySelector(".popup");
  popup.classList.remove("show");
  // Wait for fade-out before removing
  setTimeout(() => popup.remove(), 400);
}
