document.getElementById('messageForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    
    const userMessage = document.getElementById('input').value;
    const newMessageBlock = document.createElement('div');
    newMessageBlock.classList.add('blok');
    newMessageBlock.id = 'jolanta';  
    
    const image = document.createElement('img');
    image.src = 'pliki/Jolka.jpg';
    image.alt = 'Jolanta';
    
    const messageParagraph = document.createElement('p');
    messageParagraph.textContent = userMessage;

    newMessageBlock.appendChild(image);
    newMessageBlock.appendChild(messageParagraph);

    document.getElementById('chatarea').appendChild(newMessageBlock);

});
document.getElementById('random').addEventListener('click', function(event){
    const msg = [
        "Świetnie!",
        "Kto gra główną rolę?",
        "Lubisz filmy Tego reżysera?",
        "Będę 10 minut wcześniej",
        "Może kupimy sobie popcorn?",
        "Ja wolę Colę",
        "Zaproszę jeszcze Grześka",
        "Tydzień temu też byłem w kinie na Diunie",
        "Ja funduję bilety"
    ];

    const losowy = Math.floor(Math.random() * msg.length);
    
    const newMSG = document.createElement('div');
    newMSG.classList.add('blok');
    newMSG.id = 'krzys'; 

    const p = document.createElement('p');
    p.textContent = msg[losowy];

    const image = document.createElement('img');
    image.src = 'pliki/Krzysiek.jpg';  
    image.alt = 'Krzysztof';
    
    newMSG.appendChild(p);
    newMSG.appendChild(image);
    
    document.getElementById('chatarea').appendChild(newMSG);
    
    const chatArea = document.getElementById('chatarea');
    chatArea.scrollTop = chatArea.scrollHeight;
});
