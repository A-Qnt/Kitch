
document.addEventListener('DOMContentLoaded', function () {
    const boutonAjouterChamp = document.getElementById('ajouterChamp');
    const champsContainer = document.getElementById('champs');
    let champCounter = 0;

    boutonAjouterChamp.addEventListener('click', function () {
        const nouveauChamp = document.createElement('input');
        nouveauChamp.type = 'text';
        nouveauChamp.name = 'piste ' + champCounter;
        nouveauChamp.placeholder = 'piste ' + (champCounter + 1);
        champsContainer.appendChild(nouveauChamp);
        champCounter++;
    });
});