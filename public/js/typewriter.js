let text = "";
let currentIndex = 0;
let intervalId = null;

function typeWriter() {
  const outputElement = document.getElementById("tTyped");
  const chunkSize = 3;

  if (currentIndex < text.length) {
    let chunk = text.substring(currentIndex, currentIndex + chunkSize);

    if (chunk === "<br") {
      outputElement.innerHTML += "<br>";
      currentIndex += 4;
    } else {
      outputElement.innerHTML += text[currentIndex];
      currentIndex++;
    }
  }
}

window.onload = function () {
  const sourceElement = document.getElementById("tSRC");
  text = sourceElement.innerHTML.trim();
  intervalId = setInterval(typeWriter, 2);
};
