document.addEventListener("DOMContentLoaded", () => { 
    const card = document.getElementById("modifica_profilo");
            const btnProfiloModificaExpand = card.querySelector(".btn-profilo-update-expand");
            const btnProfiloModificaCollapse = card.querySelector(".btn-profilo-update-collapse");
            const formModificaProfilo = card.querySelector(".form-modifica-profilo");

            if(btnProfiloModificaExpand) {
                btnProfiloModificaExpand.addEventListener("click", () => {
                btnProfiloModificaExpand.classList.add("d-none");
                btnProfiloModificaCollapse.classList.remove("d-none");
                formModificaProfilo.classList.remove("d-none"); 
            });
            }

            if(btnProfiloModificaCollapse) {
                btnProfiloModificaCollapse.addEventListener("click", () => {
                btnProfiloModificaExpand.classList.remove("d-none");
                btnProfiloModificaCollapse.classList.add("d-none");
                formModificaProfilo.classList.add("d-none"); 
            });  
            }
        }); 