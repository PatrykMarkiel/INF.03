document.getElementById("przycisk").addEventListener('click', () => {
    const wlosy = document.querySelector('input[name="wlosy"]:checked');
    if (wlosy) {
        switch(wlosy.value) {
            case "1": 
                document.getElementById('text').innerText = '25 PLN';
                break;
            case "2": 
                document.getElementById('text').innerText = '30 PLN';
                break;
            case "3": 
                document.getElementById('text').innerText = '40 PLN';
                break;
            case "4": 
                document.getElementById('text').innerText = '50 PLN';
                break;
        }
    }
});
