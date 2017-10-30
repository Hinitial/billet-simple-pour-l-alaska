<?php
namespace BilletSimpleAlaska;
/**
 *
 */
class Autoloader
{
  // Enregistre notre autoloader
  static function register()
  {
    spl_autoload_register(array(__CLASS__,'autoload'));
  }

  // Inclue la class démendé
  static function autoload($class)
  {
      if (strpos($class, __NAMESPACE__ . '\\') === 0){
          $class = str_replace(__NAMESPACE__ . '\\', '', $class);
          $class = str_replace('\\', '/', $class);
          require 'class/' . $class . '.php';
      }
  }
}
 ?>