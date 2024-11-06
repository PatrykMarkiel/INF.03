document.getElementById('zamowienie').addEventListener('click', function() {
    const ksztalt = document.getElementById('ksztalt').value;
    const twojeZamowienieElement = document.getElementById('twojeZamowienie');
    let twojeZamowienie = 'Twoje zamówienie to cukierek ';

    switch (parseInt(ksztalt)) {
        case 1:
            twojeZamowienie = 'cytryna';
            break;
        case 2:
            twojeZamowienie = 'liść';
            break;
        case 3:
            twojeZamowienie = 'banan';
            break;
        default:
            twojeZamowienie = 'inny';
    }

    twojeZamowienieElement.textContent = twojeZamowienie;

    const red = document.getElementById('red').value;
    const green = document.getElementById('green').value;
    const blue = document.getElementById('blue').value;

    const kolorButton = document.getElementById('kolorButton');
    kolorButton.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
});
