var inputs = document.querySelectorAll(
  "input[type='text'] , input[type='email']  "
);
var FormButtons = document.querySelectorAll(
  "input[type='submit'] , input[type='reset']  "
);
var FormMessage = document.querySelector("textarea");

if (localStorage.getItem("Message") !== null) {
  var dataLocal = localStorage.getItem("Message");

  FormMessage.value = dataLocal;
} else {
  FormMessage.value = "";
}

if (sessionStorage.getItem("formInfo") !== null) {
  var data = JSON.parse(sessionStorage.getItem("formInfo"));
  var formInfo = {
    name: data.name,
    Surname: data.Surname,
    email: data.email
  };
} else {
  var formInfo = {
    name: "",
    Surname: "",
    email: ""
  };
}

localStorage.setItem("Message", FormMessage.value);
sessionStorage.setItem("formInfo", JSON.stringify(formInfo));

FormMessage.addEventListener("change", function() {
  localStorage.setItem("Message", this.value);
});

inputs.forEach(input => {
  if (input.name === "name") {
    input.value = formInfo.name;
  } else if (input.name === "Surname") {
    input.value = formInfo.Surname;
  } else if (input.name === "email") {
    input.value = formInfo.email;
  }

  input.addEventListener("change", function() {
    if (this.name !== "bday") {
      formInfo = {
        ...formInfo,
        [this.name]: this.value
      };
    }

    sessionStorage.setItem("formInfo", JSON.stringify(formInfo));
  });
});

FormButtons.forEach(input => {
  input.addEventListener("click", function() {
    formInfo = {
      name: "",
      Surname: "",
      email: ""
    };
    sessionStorage.setItem("formInfo", JSON.stringify(formInfo));
    localStorage.setItem("Message", "");
  });
});
