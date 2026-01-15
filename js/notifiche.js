document.addEventListener("DOMContentLoaded", () => { 
    const notifiche = document.getElementById("notifiche");
    const btnMessaggiInviati = notifiche.querySelector(".btn-messaggi-inviati");
    const messaggiInviati = notifiche.querySelector(".messaggi-inviati");
    const btnMessaggiRicevuti = notifiche.querySelector(".btn-messaggi-ricevuti");
    const messaggiRicevuti = notifiche.querySelector(".messaggi-ricevuti");

    if(btnMessaggiInviati) {
        btnMessaggiInviati.addEventListener("click", () => {
            messaggiInviati.classList.remove("d-none");
            messaggiRicevuti.classList.add("d-none");
            btnMessaggiRicevuti.classList.remove("d-none");
            btnMessaggiInviati.classList.add("d-none");
        }); 
    }

    if(btnMessaggiRicevuti) {
        btnMessaggiRicevuti.addEventListener("click", () => {
            messaggiInviati.classList.add("d-none");
            messaggiRicevuti.classList.remove("d-none");
            btnMessaggiRicevuti.classList.add("d-none");
            btnMessaggiInviati.classList.remove("d-none");
        });
    }
});