//////////////////////////////////////////////////////////////////////
//  Ajouter une fonction qui éxécutera une animation pour
//  faire disparaitre la fenêtre

setTimeout(function () {
    validBox.classList.remove()
    }, 500)
  


/////////////////////////////////////////////////////////////////////
// 1 Rendre le message "Produit ajouté avec succès" dynamique
// 2 Matérialiser la boite de dialogue 
//////////////////////////////////////////////////////////////////////

const box = document.createElement("div")

box.classList.add("messAd")

const board = document.querySelector("#messageAdd")

let nb = 1

board.appendChild(box)

/////////////////////////////////////////////////////////////////////


