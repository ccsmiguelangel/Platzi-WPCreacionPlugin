window.addEventListener('DOMContentLoaded', function(){

  console.log('registro js cargado');

  let form = document.querySelector('#signin');
  let $msg = document.querySelector('#msg');
console.log($msg);
  form.addEventListener('submit', function(e){
    e.preventDefault();

    let datos = new FormData(form);
    let datosParse = new URLSearchParams(datos);

    let url = 'http://localhost/CursoWordpress/03creacionplugins/wp-json/plz/registro';

    jsonFetch = {
      method: 'POST',
      body: datosParse
    }

    fetch(url, jsonFetch)
    .then(res => res.json())
    .then(json=>{
      console.log(json);
      $msg.innerHTML = json?.msg;
    })
    .catch(err=>{
      console.log(`Hay error ${err}`);
    });


  })
});