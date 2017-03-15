<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

//echo nav();

?>

<div class="container">

        <div class="loginmodal-container">
          <h1>Aqualine</h1><br>
          <?php echo validation_errors(); ?>
          <?php echo form_open('Verifylogin'); ?>
            <input type="text" name="usuario" id="usuario" placeholder="Usuário">
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <input type="submit" name="login" class="login loginmodal-submit" value="Entrar">
          </form>
  
        </div>
</div>

<?php
    echo html_footer(); 
?>