document.addEventListener("DOMContentLoaded", () => {
    const radioGenerico = document.getElementById("generico");
    const radioRecensione = document.getElementById("recensione");
    const sezioneGenerico = document.getElementById("sezione_generico");
    const sezioneRecensione = document.getElementById("sezione_recensione_videogioco");

    if(sezioneGenerico) {
        sezioneGenerico.style.display = "none";
    }

    if(sezioneRecensione) {
       sezioneRecensione.style.display = "none"; 
    }
    
    if(radioGenerico) {
        radioGenerico.addEventListener("change", () => {
        sezioneGenerico.style.display = "block";
        sezioneRecensione.style.display = "none";
        });
    }

    if(radioRecensione) {
        radioRecensione.addEventListener("change", () => {
            sezioneGenerico.style.display = "none";
            sezioneRecensione.style.display = "block";
        });        
    }

});
