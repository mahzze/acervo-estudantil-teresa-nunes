const addModalArquivo = () => {
  const modal = document.querySelector('div#modalArquivo');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const closeModalArquivo = () => {
  const modal = document.querySelector('div#modalArquivo');
  return modal.style.display = (modal.style.display == "block") ? "none" : "block";
}

const verifySubmit = () => {
  const nome = document.querySelector("#nome").value;
  const desc = document.querySelector("#desc").value;
  const categoria = document.querySelector("#categoria").value;
  const arquivo = document.querySelector("#arquivo").value;
  const cursoElement = document.querySelector("#curso");
  const submit = document.querySelector(".submit");
  
  if(arquivo !== "") {
    document.querySelector("#inputText").innerHTML = arquivo.slice(12) 
    // o inicio da String é C:/fakepath/, o slice deixa apenas o nome do arquivo 
  }

  if(categoria !== "Cursos") {
    cursoElement.style.display = "none"
    return submit.style.display = (nome !== "" && categoria !== "" && arquivo !== "" && desc !== "") ? "block" : "none";
  }
  else {
    //mostrar o select de curso apenas caso a categoria curso esteja selecionada
    cursoElement.style.display = "block"
    const curso = cursoElement.value;
    return submit.style.display = (nome !== "" && categoria !== "" && curso !== "" && arquivo !== "" && desc !== "") ? "block" : "none";

  }
}
