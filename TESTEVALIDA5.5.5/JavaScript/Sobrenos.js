window.sr = ScrollReveal({ reset: true }); 
 
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

sr.reveal('.Descricao', { durantion: 1000 }); 
 
sr.reveal('.Nome', {  
    delay: 0, 
    easing: 'ease-in-out'  
});
 
sr.reveal('.Funcao', {  
    delay: 50, 
    easing: 'ease-in-out'  
}); 
