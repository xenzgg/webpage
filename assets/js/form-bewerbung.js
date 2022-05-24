const form = document.querySelector("form"),
  statusTxt = form.querySelector(".form-submit span"); // Hier Span eintragen!!

form.onsubmit = () => {
  e.preventDefault();
  statusTxt.style.display = "block";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "nachricht.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let response = xhr.response;
      if (
        response.indexOf("Bitte alle Felder ausfüllen!") != -1 ||
        response.indexOf("Bitte geben Sie eine gültige E-Mail-Adresse ein.") !=
          -1 ||
        response.indexOf("Fehler beim Senden der E-Mail") != -1
      ) {
        statusTxt.style.color = "red";
      } else {
        form.reset();
        setTimeout(() => {}, 3000);
      }
      statusTxt.innerText = response;
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
