document.addEventListener("DOMContentLoaded", () => {
        const btnLogOut = document.getElementById("logout");
        if(btnLogOut) {
                btnLogOut.addEventListener("click", () => {
                window.location.href = "logout.php";
                })        
        }

});