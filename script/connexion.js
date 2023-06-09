let flipCardInner = document.querySelector(".flip-card-inner");

let inpCheckbox = document.querySelector("#flip");

inpCheckbox.addEventListener("change", () => {
  if (inpCheckbox.checked) {
    // console.log("checked");
    flipCardInner.style.transform = "rotateY(180deg)";
  } else {
    // console.log("unchecked");
    flipCardInner.style.transform = "rotateY(0deg)";
  }
});

let pjs = document.querySelector(".pjs");

// if (
//   pjs.textContent == "Vous déjà inscrit, Connectez-vous !" ||
//   pjs.textContent == "Inscripton réussi, Connectez-vous !"
// ) {
//   // console.log('checked');
//   inpCheckbox.setAttribute("checked", "");
//   flipCardInner.style.transform = "rotateY(180deg)";
//   flipCardInner.style.transition = "all 1s ease-in-out";
// }


switch (pjs.textContent) {
  case "Vous déjà inscrit, Connectez-vous !":
    console.log('alreadyRegistered');
  case "Inscripton réussi, Connectez-vous !":
    console.log('registered');

  case "Veuillez entrer un Identifiant et un Mot de passe !":
    console.log('IDPW');

  case "Identifiant ou Mot de passe Incorrect !":
    console.log('incorrect');
    inpCheckbox.setAttribute("checked", "");
    flipCardInner.style.transform = "rotateY(180deg)";
    flipCardInner.style.transition = "all 1s ease-in-out";
    break;
}
