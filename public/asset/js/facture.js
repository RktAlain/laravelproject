document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('popup');
    const closeBtn = document.getElementById('close-btn');

    // Afficher le popup
    setTimeout(function () {
        popup.classList.add('visible');
    }, 1000);

    // Fermer le popup
    closeBtn.addEventListener('click', function () {
        popup.classList.remove('visible');
    });

});


function printPaper() {
    document.getElementById("sidebar").style.display = "none"
    document.getElementById("impression").style.display = "none"
    document.getElementById("container").style.marginLeft = "-1px"
    document.getElementById("container").style.width = "100%"
    // document.getElementById("table").style.marginLeft = "-150px"
   
    
    window.print()

    document.getElementById("sidebar").style.display = "block"
    document.getElementById("impression").style.display = "block"
    document.getElementById("container").style.marginLeft = "-1px"
    document.getElementById("container").style.width = "100%"
    // document.getElementById("table").style.marginLeft = "0px"

}
