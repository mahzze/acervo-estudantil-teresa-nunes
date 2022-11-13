const addModalArquivo = () => {
  const modal = document.querySelector('div#modalArquivo');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const closeModalArquivo = () => {
  const modal = document.querySelector('div#modalArquivo');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const verifySubmitArquivo = () => {
  const nome = document.querySelector("#nome").value;
  const desc = document.querySelector("#desc").value;
  const arquivo = document.querySelector("#arquivo").value;
  const categoria = document.querySelector("#categoria").value;
  const cursoElement = document.querySelector("#curso");
  const submit = document.querySelector("#submitArquivo");

  if (arquivo !== "") {
    document.querySelector("#inputText").innerHTML = arquivo.slice(12)
    // o inicio da String é C:/fakepath/, o slice deixa apenas o nome do arquivo 
  }

  if (categoria !== "Cursos") {
    cursoElement.style.display = "none"
    return submit.style.display = (nome !== "" && categoria !== "" && arquivo !== "" && desc !== "") ? "block" : "none";
  }
  else {
    cursoElement.style.display = "block"
    const curso = cursoElement.value;
    return submit.style.display = (nome !== "" && categoria !== "" && curso !== "" && arquivo !== "" && desc !== "") ? "block" : "none";

  }
}

const addModalCursos = () => {
  const modal = document.querySelector('div#modalCursos');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const closeModalCursos = () => {
  const modal = document.querySelector('div#modalCursos');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const addCursoInput = () => {
  document.querySelector('form#delForm').style.display = "none";
  document.querySelector('form#addForm').style.display = "block";
  document.querySelector("#select").value = '';
}

const delCursoInput = () => {
  document.querySelector('form#delForm').style.display = "block";
  document.querySelector('form#addForm').style.display = "none";
  document.querySelector("#nomeCurso").value = '';
}

const verifySubmitCurso = () => {

  const submitAdd = document.querySelector("#submitCursoAdd");
  const submitDel = document.querySelector("#submitCursoDel");

  submitAdd.style.display = "none"
  submitDel.style.display = "none"

  const addVal = document.querySelector("#nomeCurso").value;
  const delVal = document.querySelector("#select").value;

  if (addVal !== "") return submitAdd.style.display = "block"
  if (delVal !== "") return submitDel.style.display = "block"
}
