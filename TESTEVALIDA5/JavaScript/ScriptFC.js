const form = document.querySelector('#form');
const nameInput = document.querySelector('#nome');
const emailInput = document.querySelector('#email');
const telefoneInput = document.querySelector('#telefone');
const empresaInput = document.querySelector('#empresa');
const campos = document.querySelectorAll('.puts');
const spans = document.querySelectorAll('.span-required');


form.addEventListener("submit", (event) => {
    event.preventDefault();



    //VERIFICA A VÁLIDAÇÃO DO NOME

    if(nameInput.value === "" || nameInput.value.length < 3){
        setError(0, 'Nome inválido!');
        return;
    }else{
        removeError(0, 'Nome válido');
    }


    //VERIFICA A VÁLIDAÇÃO DE EMAIL

    if(emailInput.value === "" || !IsEmailValido(emailInput.value)){
        setError(1, 'Digite um email válido');
        return;
    }else{
        removeError(1, 'Email válido');
    }

    //VERIFICA A VALIDAÇÃO DE TELEFONE

    if(telefoneInput.value === "" || !IsTelefoneValido(telefoneInput.value, 11)){
        setError(2, 'Telefone requer no mínimo 11 dígitos.');
        return;
    }else{
        removeError(2, 'Telefone válido.');
    }

    // //VERIFICA O CAMPO DE EMPRESA SE ESTÁ VAZIO:
    // if(empresaInput.value === ""){
    //     setError(3, 'Campo obrigatório');
    //     return;
    // }else{
    //     removeError(3, 'Campo válido');
    // }




    //VERIFICA SE O CAMPOS ESTÃO PREENCHIDOS, SE SIM, FORMULÁRIO SERÁ ENVIADO.
    form.submit();
});

//FUNÇÃO PARA VERIFICAR O EMAIL:

function IsEmailValido(email){
    const emailRegex = new RegExp(
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    );

    if(emailRegex.test(email)){
        return true;
    }
    return false;
}



//FUNÇÃO PARA VERIFICAR O EMAIL:

function IsTelefoneValido(telefone, minDigitos){
    const telefoneXeger = new RegExp(
        /^[0-9]$/
    );
    if(telefone.length >= minDigitos ){

        //TELEFONE VÁLIDO.
        return true;
    }
    
    //TELEFONE INVÁLIDO.
    return false;
}




//FUNÇÕES PARA EXIBIÇÃO DE ERRO E REMOVER ERRO:

function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

