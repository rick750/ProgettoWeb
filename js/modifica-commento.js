document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");

    cards.forEach( card => {
            const btnCommentoModificaExpand = card.querySelector(".btn-commento-update-expand");
            const btnCommentoModificaCollapse = card.querySelector(".btn-commento-update-collapse");
            const formModificaCommento = card.querySelector(".form-modifica-commento");

            if(btnCommentoModificaExpand) {
                btnCommentoModificaExpand.addEventListener("click", () => {
                btnCommentoModificaExpand.classList.add("d-none");
                btnCommentoModificaCollapse.classList.remove("d-none");
                formModificaCommento.classList.remove("d-none"); 
            });
            }

            if(btnCommentoModificaCollapse) {
                btnCommentoModificaCollapse.addEventListener("click", () => {
                btnCommentoModificaExpand.classList.remove("d-none");
                btnCommentoModificaCollapse.classList.add("d-none");
                formModificaCommento.classList.add("d-none"); 
            });  
            }
        }); 
    });