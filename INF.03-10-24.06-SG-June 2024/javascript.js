document.getElementById('cytat1').addEventListener('click', () => {
    const cytat1 = document.getElementById('cytat1');
    const cytat2 = document.getElementById('cytat2');
    cytat1.style.display = 'none';
    cytat2.style.display = 'block';
});
document.getElementById('cytat2').addEventListener('click', () => {
    const cytat2 = document.getElementById('cytat2');
    const cytat3 =document.getElementById('cytat3');
    cytat2.style.display='none';
    cytat3.style.display = 'block';
});
document.getElementById('cytat3').addEventListener('click',()=>{
    const cytat3 =document.getElementById('cytat3');
    const cytat1 = document.getElementById('cytat1');
    cytat3.style.display = 'none';
    cytat1.style.display = 'block';
});