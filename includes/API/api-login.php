<?php


function plz_api_login(){

  $namespace = 'plz'; //wp.com/wp-json/plz
  $route = 'login'; //wp.com/wp-json/plz/login
  $args = array(
    'methods' => 'POST', 
    'callback' => 'plz_login_callback'
  );

  register_rest_route($namespace, $route, $args);

}
add_action('rest_api_init', 'plz_api_login');

function plz_login_callback($request){
  
  $user_login = $request['email'];
  $user_password = $request['password'];
  $user_remember = true;
  
  $cred = array(
    'user_login' => $user_login,
    'user_password' => $user_password,
    'remember' => $user_remember,
  );
  
  $user = wp_signon($cred);

  return $user->get_error_message();
}
