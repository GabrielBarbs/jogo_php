const modal = document.getElementById("modal");
const btn = document.getElementById("btn-modal");
const span = document.getElementsByClassName("close")[0];
const btnAtaque = document.getElementById("btn-ataque");
const btnDefesa = document.getElementById("btn-defesa");

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

btnAtaque.onclick = function() {
  window.location.href = "level/atk/criar_atk_geral.php";
}

btnDefesa.onclick = function() {
  window.location.href = "level/def/criar_def_geral.php";
}