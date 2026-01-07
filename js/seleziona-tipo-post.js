document.addEventListener("DOMContentLoaded", () => {
    const radioGenerico = document.getElementById("generico");
    const radioRecensione = document.getElementById("recensione");
    const sezioneGenerico = document.getElementById("sezione_generico");
    const sezioneRecensione = document.getElementById("sezione_recensione_videogioco");

    sezioneGenerico.style.display = "none";
    sezioneRecensione.style.display = "none";

    radioGenerico.addEventListener("change", () => {
        sezioneGenerico.style.display = "block";
        sezioneRecensione.style.display = "none";
    });

    radioRecensione.addEventListener("change", () => {
        sezioneGenerico.style.display = "none";
        sezioneRecensione.style.display = "block";
    });
});
