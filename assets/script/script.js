






//Sccript pour ajouter ou supprimer des champs pour les pistes d'album

document.addEventListener('DOMContentLoaded', function () {
    const boutonAjouterChamp = document.getElementById('buttonAdd');
    const boutonSupprimerChamp = document.getElementById('buttonDelete');
    const champsContainer = document.getElementById('addChamp');
    let champCounter = 0;

    boutonAjouterChamp.addEventListener('click', function () {
        const nouveauChamp = document.createElement('input');
        nouveauChamp.type = 'text';
        nouveauChamp.name = 'Piste ' + champCounter;
        nouveauChamp.placeholder = 'Piste ' + (champCounter + 1);
        nouveauChamp.required = true;
        champsContainer.appendChild(nouveauChamp);
        champCounter++;
    });

    boutonSupprimerChamp.addEventListener("click", function () {
        if (champCounter > 0) {
            champCounter--;
            const dernierChamp = champsContainer.lastChild;
            champsContainer.removeChild(dernierChamp);
        }
    })
});


// fonction pour afficher les details des albums au clique
document.addEventListener("click", e => {
    if (e.target.dataset.type == "album") {
        detailsAlbum(e.target.dataset.album)
    }
})

function detailsAlbum(album) {
    var info = document.querySelector(`[data-details="${album}"]`);
    if (info.style.display === "none" || info.style.display === "") {
        info.style.display = "flex";
    } else {
        info.style.display = "none";
    }
};

//fonction pour afficher les tracks sur deux colonnes quand il y a plus de 7 morceaux


