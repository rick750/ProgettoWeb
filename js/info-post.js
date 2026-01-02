document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");
     cards.forEach(card => {
        const btnGenericoExpand = card.querySelector(".btn-generic-expand");
        const btnGenericoCollapse = card.querySelector(".btn-generic-collapse");
        const btnRecensioneExpand = card.querySelector(".btn-recensione-expand");
        const btnRecensioneCollapse = card.querySelector(".btn-recensione-collapse");
        const btnGenericoAnswer = card.querySelector(".btn-generic-answer");
        const btnRecensioneAnswer = card.querySelector(".btn-recensione-answer");
        const genericExtraInfo = card.querySelector(".generic-extra-info");
        const recensioneExtraInfo = card.querySelector(".recensione-extra-info");

        if(btnGenericoExpand) {
            btnGenericoExpand.addEventListener("click", () => {
            genericExtraInfo.classList.remove("d-none");
            btnGenericoAnswer.classList.remove("d-none");
            btnGenericoExpand.classList.add("d-none"); 
            btnGenericoCollapse.classList.remove("d-none"); }
            ); 
        }
        
        if(btnRecensioneExpand) {
            btnRecensioneExpand.addEventListener("click", () => {
            recensioneExtraInfo.classList.remove("d-none");
            btnRecensioneAnswer.classList.remove("d-none");
            btnRecensioneExpand.classList.add("d-none");
            btnRecensioneCollapse.classList.remove("d-none");}
            );
        }
        
        if(btnGenericoCollapse) {
           btnGenericoCollapse.addEventListener("click", () => {
            genericExtraInfo.classList.add("d-none");
            btnGenericoAnswer.classList.add("d-none");
            btnGenericoExpand.classList.remove("d-none"); 
            btnGenericoCollapse.classList.add("d-none"); }
            );  
        }
        
        if(btnRecensioneCollapse) {
            btnRecensioneCollapse.addEventListener("click", () => {
            recensioneExtraInfo.classList.add("d-none");
            btnRecensioneAnswer.classList.add("d-none");
            btnRecensioneExpand.classList.remove("d-none");
            btnRecensioneCollapse.classList.add("d-none");}
            );
        }
    }); 
});