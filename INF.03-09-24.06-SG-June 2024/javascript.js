document.getElementById("LeftButton").addEventListener('click', () => {
    const aktualne = document.getElementById("srodek")
    let currentImage = parseInt(srodek.src.split('/').pop().split('.')[0]);
    if (currentImage === 1) {
        srodek.src = "7.jpg";
    } else {
        srodek.src =(currentImage - 1) + ".jpg";
    }
});
document.getElementById("RightButton").addEventListener('click', () => {
    const aktualne = document.getElementById("srodek")
    let currentImage = parseInt(srodek.src.split('/').pop().split('.')[0]);
    if (currentImage === 7) {
        srodek.src = "1.jpg";
    } else {
        srodek.src =(currentImage + 1) + ".jpg";
    }
});