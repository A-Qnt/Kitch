






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

//Fonction pour afficher le formulaire d'ajout d'album

// function toggleForm(formId) {
//     var form = document.getElementById(formId);

//     // Vérifier l'état actuel de la div
//     if (form.style.display === 'none' || form.style.display === '') {
//         // Si la div est cachée, la montrer
//         form.style.display = 'block';
//     } else {
//         // Si la div est visible, la cacher
//         form.style.display = 'none';
//     }
// }

// Attacher la fonction à chaque bouton associé à un formulaire

    // // Pour la première page
    // document.getElementById('addTourButton').addEventListener('click', function() {
    //     toggleForm('formTour');
    // });

    // // Pour la deuxième page
    // document.getElementById('addArticleButton').addEventListener('click', function() {
    //     toggleForm('formArticle');
    // });

    // // Pour la troisième page
    // document.getElementById('addAlbumButton').addEventListener('click', function() {
    //     toggleForm('formAlbum');
    // });

// function toggleForm() {
//     var formAlbum = document.getElementById('formAlbum');
//     var formArticle = document.getElementById('formArticle');
//     var formTour = document.getElementById('formTour');

//     // Vérifier l'état actuel de la div
//     if (formAlbum.style.display === 'none' || formAlbum.style.display === '') {
//         // Si la div est cachée, la montrer
//         formAlbum.style.display = 'block';
//     } else {
//         // Si la div est visible, la cacher
//         formAlbum.style.display = 'none';
//     }

//     if (formArticle.style.display === 'none' || formArticle.style.display === '') {
//         // Si la div est cachée, la montrer
//         formArticle.style.display = 'block';
//     } else {
//         // Si la div est visible, la cacher
//         formArticle.style.display = 'none';
//     }

//     if (formTour.style.display === 'none' || formTour.style.display === '') {
//         // Si la div est cachée, la montrer
//         formTour.style.display = 'block';
//     } else {
//         // Si la div est visible, la cacher
//         formTour.style.display = 'none';
//     }
// }






// // Attacher la fonction au bouton
// document.getElementById('addTourButton').addEventListener('click', toggleForm);
// document.getElementById('addArticleButton').addEventListener('click', toggleForm);
// document.getElementById('addAlbumButton').addEventListener('click', toggleForm);




