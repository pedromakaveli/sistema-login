<?php
   /* CONFIGURA ACESSO A DB **/

   $db_host = 'Localhost';
   $db_user = 'root';
   $db_pass = '';
   $db_name = 'cadastro_formulario';

   try {
      $connect = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
   } catch (Exception $e) {
      die("ERRO: Falha ao conectar-se ao banco de dados: {$e->getMessage()}");
   }

?>