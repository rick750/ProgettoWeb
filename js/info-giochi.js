document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");
     cards.forEach(card => {
        const btnExpand = card.querySelector(".btn-expand");
        const btnCollapse = card.querySelector(".btn-collapse");
        const extraInfo = card.querySelector(".extra-info");
        btnExpand.addEventListener("click", () => {
            extraInfo.classList.remove("d-none");
            btnExpand.classList.add("d-none"); 
            btnCollapse.classList.remove("d-none"); }
        ); 
        btnCollapse.addEventListener("click", () => {
            extraInfo.classList.add("d-none");
            btnExpand.classList.remove("d-none");
            btnCollapse.classList.add("d-none");}
        ); 
    }); 
});