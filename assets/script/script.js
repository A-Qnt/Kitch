
//Sccript pour ajouter ou supprimer des champs pour les pistes d'album

document.addEventListener('DOMContentLoaded', function () {
    const boutonAjouterChamp = document.getElementById('buttonAdd');
    const boutonSupprimerChamp = document.getElementById('buttonDelete');
    const champsContainer = document.getElementById('addChamp');
    let champCounter = 0;

    boutonAjouterChamp.addEventListener('click', function () {
        const nouveauChamp = document.createElement('input');
        nouveauChamp.type = 'text';
        nouveauChamp.name = 'track' + champCounter;
        nouveauChamp.placeholder = 'Piste ' + (champCounter + 1);
        nouveauChamp.required = false;
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



// fonction pour afficher la modale de confirmation de suppression de l'article
document.addEventListener('DOMContentLoaded', function () {
    let modale = document.getElementById('modale');
    let confirm = document.getElementById('confirm');
    let cancel = document.getElementById('cancel');
    let deleteButton = document.getElementById('deleteButton');

   

    cancel.addEventListener('click', function(){
        modale.style.display = 'none';
    })

    confirm.addEventListener('click', function(){

    })

})

 function showModale(element){
        modale.style.display = 'block';
        console.log(element.dataset.id);
        document.querySelector('#newsToDelete').value=element.dataset.id
    }
