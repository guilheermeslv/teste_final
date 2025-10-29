const modal = document.querySelector("dialog");
const btnFormCancelar = document.getElementById("btnFormCancelar");
const btnEntrar = document.getElementById("btnEntrar");

btnEntrar.addEventListener("click", function() {
    modal.showModal()
})

btnFormCancelar.addEventListener("click", function() {
    modal.close()
})