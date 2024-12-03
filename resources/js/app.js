import './bootstrap';

// grab everything we need
const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");

// add event listeners
btn.addEventListener("click", () => {
  menu.classList.toggle("hidden");
});

document.addEventListener('DOMContentLoaded', function () {
  const contentChoice = document.getElementById('contentChoice');
  const pdfChoice = document.getElementById('pdfChoice');
  const contentEditorDiv = document.getElementById('contentEditorDiv');
  const fileInputDiv = document.getElementById('fileInputDiv');

  // Initialiser l'affichage en fonction de la sélection par défaut
  if (contentChoice.checked) {
      contentEditorDiv.style.display = 'block';
      fileInputDiv.style.display = 'none';
  } else {
      contentEditorDiv.style.display = 'none';
      fileInputDiv.style.display = 'block';
  }

  // Gérer le changement entre les choix
  contentChoice.addEventListener('change', function () {
      contentEditorDiv.style.display = 'block';
      fileInputDiv.style.display = 'none';
  });

  pdfChoice.addEventListener('change', function () {
      contentEditorDiv.style.display = 'none';
      fileInputDiv.style.display = 'block';
  });
});
