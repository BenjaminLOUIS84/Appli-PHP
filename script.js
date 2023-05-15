//Quand la page est chargée on peut intéragir avec le promgramme
window.onload

//  Rendre le message "Produit ajouté avec succès" dynamique

const box = document.createElement("div")

box.classList.add("messAd")

const board = document.querySelector("#messageAdd")
board.appendChild(box)

//  Rendre le bouton "AJOUTER" dynamique pour lui permettre d'afficher le message "Produit ajouté avec succès"

