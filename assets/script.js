function flyBell() {
    var bellImage = document.getElementById("bellImage");
    bellImage.classList.add("flying");
}

function flyBellAndShowPopup() {
    var bellImage = document.getElementById("bellImage");
    bellImage.classList.add("flying");
    document.getElementById("popup").style.display = "block"; // Muestra la ventana emergente
}

function closePopup() {
    document.getElementById("popup").style.display = "none"; // Oculta la ventana emergente
    location.reload();
}