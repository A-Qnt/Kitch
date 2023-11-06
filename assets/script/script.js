



// let maxchar = document.getElementById('maxchar');
// let text = maxchar.textContent;

// if (text.length > 15) {
//     maxchar.textContent = text.slice(0, 15) + "...";
// };

// let maxchar2 = document.getElementById('maxchar2');
// let text2 = maxchar2.textContent;

// if (text2.length > 15) {
//     maxchar2.textContent = text2.slice(0, 15) + "...";
// };

// let maxchar3 = document.getElementById('maxchar3')
// let text3 = maxchar3.textContent;

// if (text3.length > 15) {
//     maxchar3.textContent = text3.slice(0, 15) + "...";
// };


// fonction pour afficher les details des albums au clique

document.getElementById('henger').addEventListener("click", function () {
    detailsAlbum("info1");
});

document.getElementById('calame').addEventListener("click", function () {
    detailsAlbum("info2");
});

document.getElementById('nsl').addEventListener("click", function () {
    detailsAlbum("info3");
});

function detailsAlbum(infoId) {
    var info = document.getElementById(infoId);
    if (info.style.display === "none" || info.style.display === "") {
        info.style.display = "flex";
    } else {
        info.style.display = "none";
    }
};
