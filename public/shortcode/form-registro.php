<?php

function plz_script_register(){
  wp_register_script("plz-register", plugins_url("../assets/js/registro.js",__FILE__));
}

add_action("wp_enqueue_scripts","plz_script_register");

function plz_add_register_form()
{
  wp_enqueue_script("plz-register");

  $response = '
  <div class="singup">
    <div class="singup__container">
      <h1 class="sigin__titulo">Register</h1>
      <form class="singup__form" id="singup">
        <div class="singup__name name--campo">
          <label for="Name">Name</label>
          <input name="name" type="text" id="Name">
        </div>
        <div class="singup__email name--campo">
          <label for="email">Email</label>
          <input name="email" type="email" id="email">
        </div>
        <div class="singup__pass name--campo">
          <label for="password">Password</label>
          <input name="password" type="password" id="password">
        </div>
        <div class="singup__submit">
          <input type="submit" value="Create">
        </div>
        <div id="msg"></div>
      </form>
      </div>
    </div>
  ';

  return $response;
}


add_shortcode('plz_registro', 'plz_add_register_form');
