document.getElementById('opcje').addEventListener('submit', () =>{
    event.preventDefault();
    const efekt = document.querySelector('input[name="effect"]:checked').value;
    const obraz1 = document.getElementById('obraz1');
    switch(efekt){
        case 'blur':
            const rozmycie = Math.random() * (8 - 4) + 4;
            obraz1.style.filter =`blur(${rozmycie}px)`;
        break;
        case 'sepia':
            obraz1.style.filter = 'sepia(100%)';
        break;
        case 'negative':
            obraz1.style.filter ='invert(100%)';
        break;
    }
}
);
document.getElementById('kolor').addEventListener('click', () =>{
    const obraz2= document.getElementById('obraz2');
    obraz2.style.filter= 'grayscale(0%)'
});
document.getElementById('czarny').addEventListener('click', () =>{
    const obraz2= document.getElementById('obraz2');
    obraz2.style.filter= 'grayscale(100%)'
});
document.getElementById('zastosujM3').addEventListener('click', ()=> {
    const obraz3=document.getElementById('obraz3');
    const wartosc=document.querySelector('input[name="suwakM3"]').value;
    obraz3.style.filter=`opacity(${wartosc}%)`;
}
);
document.getElementById('zastosujM4').addEventListener('click',()=>
{
    const obraz4= document.getElementById('obraz4');
    const wartosc=document.querySelector('input[name="suwakM4"]').value;
    obraz4.style.filter=`brightness(${wartosc}%)`;
});