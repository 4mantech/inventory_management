var forms = document.querySelectorAll(".needs-validation");
Array.prototype.slice.call(forms).forEach(function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      event.preventDefault();
      if (!form.checkValidity()) {
        event.stopPropagation();
      } else {
        let data = new FormData(forms[0]);
        editUser(data);
      }
      form.classList.add("was-validated");
    },
    false
  );
});
