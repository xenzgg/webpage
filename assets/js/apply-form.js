const form = document.querySelector("form.apply-form"),
  statusTxt = form.querySelector(".apply-button-area span");
form.onsubmit = (e) => {
  e.preventDefault();
  statusTxt.style.color = "var(--text-color)";
  statusTxt.style.display = "block";
  statusTxt.innerText = "Bewerbung wird gesendet...";
  form.classList.add("disabled");
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let response = xhr.response;
      if (
        response.indexOf("müssen") != -1 ||
        response.indexOf("Fehler") != -1 ||
        response.indexOf("gültige") != -1
      ) {
        // statusTxt.style.color = "red";
      } else {
        form.reset();
        setTimeout(() => {
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
