document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");
    cards.forEach( card => {
            const btnTorneoModificaExpand = card.querySelector(".btn-torneo-update-expand");
            const btnTorneoModificaCollapse = card.querySelector(".btn-torneo-update-collapse");
            const formModificaTorneo = card.querySelector(".form-modifica-torneo");

            if(btnTorneoModificaExpand) {
                btnTorneoModificaExpand.addEventListener("click", () => {
                btnTorneoModificaExpand.classList.add("d-none");
                btnTorneoModificaCollapse.classList.remove("d-none");
                formModificaTorneo.classList.remove("d-none"); 
            });
            }

            if(btnTorneoModificaCollapse) {
                btnTorneoModificaCollapse.addEventListener("click", () => {
                btnTorneoModificaExpand.classList.remove("d-none");
                btnTorneoModificaCollapse.classList.add("d-none");
                formModificaTorneo.classList.add("d-none"); 
            });  
            }
        }); 
    });