//le code du modal

// Sélectionner le bouton d'ouverture du modal
const openModalButton = document.getElementById("openModalButton");
// Sélectionner le bouton de fermeture du modal
const closeModalButton = document.getElementById("closeModalButton");
// Sélectionner le modal lui-même
const modal = document.getElementById("myModal");

// Ajouter un gestionnaire d'événement pour le clic sur le bouton d'ouverture du modal
openModalButton.addEventListener("click", function () {
    modal.classList.remove("hidden");
});

// Ajouter un gestionnaire d'événement pour le clic sur le bouton de fermeture du modal
closeModalButton.addEventListener("click", function () {
    modal.classList.add("hidden");
});
