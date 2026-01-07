document.addEventListener("DOMContentLoaded", () => {
        const btnLogOut = document.getElementById("logout");
        btnLogOut.addEventListener("click", () => {
                window.location.href = "logout.php";
        })
});