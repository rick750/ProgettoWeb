document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");

    cards.forEach( card => {
            const btnGenericoModificaExpand = card.querySelector(".btn-generic-update-expand");
            const btnGenericoModificaCollapse = card.querySelector(".btn-generic-update-collapse");
            const formModificaGenerico = card.querySelector(".form-modifica-generico");
            const btnRecensioneModificaExpand = card.querySelector(".btn-rec-update-expand");
            const btnRecensioneModificaCollapse = card.querySelector(".btn-rec-update-collapse");
            const formModificaRecensione = card.querySelector(".form-modifica-recensione");

            if(btnGenericoModificaExpand) {
                btnGenericoModificaExpand.addEventListener("click", () => {
                btnGenericoModificaExpand.classList.add("d-none");
                btnGenericoModificaCollapse.classList.remove("d-none");
                formModificaGenerico.classList.remove("d-none"); 
            });
            }

            if(btnGenericoModificaCollapse) {
                btnGenericoModificaCollapse.addEventListener("click", () => {
                btnGenericoModificaExpand.classList.remove("d-none");
                btnGenericoModificaCollapse.classList.add("d-none");
                formModificaGenerico.classList.add("d-none"); 
            });  
            }

            if(btnRecensioneModificaExpand) {
                btnRecensioneModificaExpand.addEventListener("click", () => {
                btnRecensioneModificaExpand.classList.add("d-none");
                btnRecensioneModificaCollapse.classList.remove("d-none");
                formModificaRecensione.classList.remove("d-none"); 
            });
            }

            if(btnRecensioneModificaCollapse) {
                btnRecensioneModificaCollapse.addEventListener("click", () => {
                btnRecensioneModificaExpand.classList.remove("d-none");
                btnRecensioneModificaCollapse.classList.add("d-none");
                formModificaRecensione.classList.add("d-none"); 
            });  
            }
        }); 
    });