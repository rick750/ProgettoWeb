document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");

     cards.forEach(card => {
        const btnGenericoExpand = card.querySelector(".btn-generic-expand");
        const btnGenericoCollapse = card.querySelector(".btn-generic-collapse");
        const genericExtraInfo = card.querySelector(".generic-extra-info");

        if(btnGenericoExpand) {
            btnGenericoExpand.addEventListener("click", () => {
            genericExtraInfo.classList.remove("d-none");
            btnGenericoExpand.classList.add("d-none"); 
            btnGenericoCollapse.classList.remove("d-none"); }
            ); 
        }

        if(btnGenericoCollapse) {
           btnGenericoCollapse.addEventListener("click", () => {
            genericExtraInfo.classList.add("d-none");
            btnGenericoExpand.classList.remove("d-none"); 
            btnGenericoCollapse.classList.add("d-none"); }
            );  
        }
    }); 
});