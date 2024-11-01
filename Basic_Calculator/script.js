function appendToDisplay(value) {
  const display = document.getElementById("display");
  display.value += value;
}

function calculateResult() {
  const display = document.getElementById("display");
  try {
    const result = eval(display.value);
    display.value = result;
  } catch (error) {
    display.value = "Error";
  }
}

function clearDisplay() {
  const display = document.getElementById("display");
  display.value = "";
}

// Add click event listeners to buttons
document.querySelectorAll("key").forEach((button) => {
  button.addEventListener("mousedown", () => {
    button.classList.add("pressed"); //add pressed class on mousedown
  });

  button.addEventListener("mouseup", () => {
    button.classList.remove("pressed"); //remove pressed class on mouseup
  });

  button.addEventListener("mouseleave", () => {
    button.classList.remove("pressed"); //remove pressed class if mouse leave the button
  });
});

//Add Keyboard event listener
document.addEventListener("keydown", (event) => {
  const key = event.key; //Get the key pressed

  if ("0123456789/*-+".includes(key)) {
    appendToDisplay(key); // Append the key to the display
  } else if (key === "Enter") {
    calculateResult(); //Calculate the result
  } else if (key === "Backspace") {
    clearDisplay(); //Clear the display
  }
});
