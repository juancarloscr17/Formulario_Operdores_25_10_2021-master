import ajasx from './peticionHTTP_PHP.js';
addEventListener("DOMContentLoaded", ()=>{
    let MyForm = document.querySelector("#myFormulario");
    let config = {
        url: "https://juancarloscr17.000webhostapp.com/Formulario_Operdores_25_10_2021/api.php",
        parametros: {
            method : "POST",
            body: null
        },
    };
    MyForm.addEventListener("submit", (e)=>{
        let num1 = document.querySelector("#numero1");
        let num2 = document.querySelector("#numero2");
        config.parametros.body = JSON.stringify({numero_1: num1.value, numero_2: num2.value});
        ajax(config);
        e.preventDefault();
    })
    
})