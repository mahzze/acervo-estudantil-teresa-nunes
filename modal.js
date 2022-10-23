function addModal() {
  const modal = document.querySelector('div#modal')
  return modal.style.display = (modal.style.display == "block") ? "none" : "block"
}

const closeModal = () => {
  const modal = document.querySelector('div#modal')
  return modal.style.display = (modal.style.display == "block") ? "none" : "block"
}

const verifySubmit = () => {
  const nome = document.querySelector("#nome").value;
  const desc = document.querySelector("#desc").value;
  const arquivo = document.querySelector("#arquivo").value;
  const categoria = document.querySelector("#categoria").value;
  const submit = document.querySelector(".submit");

  return submit.style.display = (nome !== "" && categoria !== "" && arquivo !== "" && desc !== "") ? "block" : "none"
}
