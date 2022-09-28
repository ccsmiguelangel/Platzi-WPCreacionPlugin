<?php


function plz_api_register(){

  $namespace = 'plz'; //wp.com/wp-json/plz
  $route = 'registro'; //wp.com/wp-json/plz/registro
  $args = array(
    'methods' => 'POST', 
    'callback' => 'plz_registro_callback'
  );

  register_rest_route($namespace, $route, $args);

}

function plz_registro_callback($request){

  $is_user_exist = get_user_by('login', $request['name']);
  $is_email_exist = get_user_by('email', $request['email']);

  if($is_user_exist){
    return array(
      'msg' => 'Existe este nombre de usuario.'
    );
  }
  if($is_email_exist){
    return array(
      'msg' => 'Este email existe.'
    );
  }
  $args = array(
    'user_login' => $request['name'],
    'user_pass' => $request['password'],
    'user_email' => $request['email'],
    'role' => 'editor'
  );
  
  $user = wp_insert_user($args); //función de registro
  
  return array(
    'msg' => 'ID de Usuario Registrado '.$user
  ); //Return ID
  // return $request->get_params(); // Devuelve en formato array todos los argumentos que le dejemos
}

add_action('rest_api_init', 'plz_api_register');