document.getElementById('button1').addEventListener('click', () => {
    const blok1 = document.getElementById('blok1');
    const blok2 = document.getElementById('blok2');
    blok1.style.visibility = 'hidden';
    blok2.style.visibility = 'visible';
});

document.getElementById('button2').addEventListener('click', () => {
    const blok2 = document.getElementById('blok2');
    const blok3 = document.getElementById('blok3');
    blok2.style.visibility = 'hidden'; 
    blok3.style.visibility = 'visible'; 
});
document.getElementById('button3').addEventListener('click', () => {
    const haslo = document.getElementById('haslo');
    const haslo2= document.getElementById('haslo2');
    if(haslo.value != haslo2.value){
        alert("Podane hasła różnią się");
    }
    const imie = document.getElementById('imie');
    const nazwisko = document.getElementById('nazwisko');
    console.log(`Witaj ${imie.value} ${nazwisko.value}`);
});
