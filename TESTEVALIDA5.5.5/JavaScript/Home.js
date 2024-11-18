window.sr = ScrollReveal({ reset: true });

sr.reveal('.textinho', {  
    rotate: { x: 80, y: 0, z: 10}, 
    delay: 100, 
    durantion : 4000 
}); 
 
sr.reveal('.Imagem_3', {
    rotate: { x: 50, y: -300, z: 0}, 
    durantion: 4000, 
    delay: 300, 
    easing: 'ease-in-out'  
}); 
 
sr.reveal('.Conteudo', { 
    delay: 100, 
    durantion: 2000, 
    easing: 'ease-in-out' 
}); 
 
sr.reveal('.Imagem_1', { 
    durantion: 1000, 
    delay: 150, 
    rotate: { x: 100, y: -200, z: 100}, 
});