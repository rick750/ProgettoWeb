document.addEventListener("DOMContentLoaded", () => { 
    const cards = document.querySelectorAll("article.card");

    cards.forEach( card => {
            const btnGenericoExpand = card.querySelector(".btn-generic-expand");
            const btnGenericoCollapse = card.querySelector(".btn-generic-collapse");
            const genericExtraInfo = card.querySelector(".generic-extra-info");
            const btnGenericShowAnswers = card.querySelector(".btn-generic-show-answer");
            const btnGenericHidAnswers = card.querySelector(".btn-generic-hid-answer");
            const genericAnswers = card.querySelector(".generic-answers");

            if(btnGenericoExpand) {
                btnGenericoExpand.addEventListener("click", () => {
                genericExtraInfo.classList.remove("d-none");
                btnGenericoExpand.classList.add("d-none"); 
                btnGenericoCollapse.classList.remove("d-none");
                btnGenericShowAnswers.classList.remove("d-none");
            }); 
            }

            if(btnGenericoCollapse) {
                btnGenericoCollapse.addEventListener("click", () => {
                genericExtraInfo.classList.add("d-none");
                btnGenericoExpand.classList.remove("d-none"); 
                btnGenericoCollapse.classList.add("d-none");
                btnGenericShowAnswers.classList.add("d-none");
                btnGenericHidAnswers.classList.add("d-none");
                genericAnswers.classList.add("d-none");
            });  
            }

            if(btnGenericShowAnswers) {
                btnGenericShowAnswers.addEventListener("click", () => {
                    btnGenericShowAnswers.classList.add("d-none");
                    genericAnswers.classList.remove("d-none");
                    btnGenericHidAnswers.classList.remove("d-none");
                });
            }

            if(btnGenericHidAnswers) {
                btnGenericHidAnswers.addEventListener("click", () => {
                    btnGenericShowAnswers.classList.remove("d-none");
                    genericAnswers.classList.add("d-none");
                    btnGenericHidAnswers.classList.add("d-none");
                });
            }
        }); 
    });

    