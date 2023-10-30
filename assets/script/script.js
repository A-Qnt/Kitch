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





var maxchar = document.getElementById('maxchar');
var text = maxchar.textContent;

if (text.length > 15) {
    maxchar.textContent = text.slice(0, 15) + "...";
};

var maxchar2 = document.getElementById('maxchar2');
var text2 = maxchar2.textContent;

if (text2.length > 15) {
    maxchar2.textContent = text2.slice(0, 15) + "...";
};

var maxchar3 = document.getElementById('maxchar3')
var text3 = maxchar3.textContent;

if (text3.length > 15) {
    maxchar3.textContent = text3.slice(0, 15) + "...";
};



