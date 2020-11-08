var sections = [document.getElementById('about'),
              document.getElementById('review'),
              document.getElementById('availability')];

var overlay = document.getElementsByClassName("overlay");

function displayContent(id) {

  event.preventDefault();
  sections.forEach(section => sectionCheck(section, id.id));

  return false;
}

function sectionCheck(section, inputId) {
  if (section.id == inputId) {
    if (!section.classList.contains('display')) {
      section.classList.add("display")
    }
  }
  else {
    if (section.classList.contains('display')) {
      section.classList.remove("display")
    }
  }
}

function displayOverlay(number) {
  event.preventDefault();

  overlay[number].style.zIndex = "999";
  overlay[number].style.opacity = "1";

  return false;
}
