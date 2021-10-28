  let ajax = async({...arg})=>{
    let peticion = await fetch(arg.url, arg.parametros);
    let json = await peticion.json();
    console.log(json);
    alert(JSON.stringify(json, undefined, 12));
    
}


export default ajax;