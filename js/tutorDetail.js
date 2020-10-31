var sections = [document.getElementById('about'),
              document.getElementById('review'),
              document.getElementById('availability')];


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
