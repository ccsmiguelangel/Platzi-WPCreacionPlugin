<?php


function plz_api_register(){

  $namespace = 'plz'; //wp.com/wp-json/plz
  $route = 'registro'; //wp.com/wp-json/plz/registro
  $args = array(
    // 'methods' => 'POST', //
    'methods' => 'GET', //
    'callback' => 'plz_registro_callback'
  );

  register_rest_route($namespace, $route, $args);

}

function plz_registro_callback($request){
  return $request->get_params(); // Devuelve en formato array todos los argumentos que le dejemos
}

add_action('rest_api_init', 'plz_api_register');