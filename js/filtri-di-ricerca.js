document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('#form-filtri input[type="checkbox"]').forEach(cb => {
        cb.addEventListener("change", () => {
            document.getElementById("form-filtri").submit();
        });
    });
});
