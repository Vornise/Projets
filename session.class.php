<?php
class Session{
  public function __construct(){
    session_start();
  }

  public function setFlash($message, $type){
    $_SESSION['flash'] = array(
      'message' => $message,
      'type' => $type
    );

  }

  public function flash(){
    if(isset($_SESSION['flash'])){
        if($_SESSION['flash']['type'] == "idsuccess"){
          echo'
          <div id="valide" class="valide '.$_SESSION['flash']['type'].'">
            '.$_SESSION['flash']['message'].'
          </div>';
        }

        if($_SESSION['flash']['type'] == "idnull"){
          echo'
          <div id="alert" class="alert '.$_SESSION['flash']['type'].'">
            '.$_SESSION['flash']['message'] .'
          </div>';
        }

        if($_SESSION['flash']['type'] == "idsuggestion"){
          echo'
          <div id="suggestion" class="suggestion alert- '.$_SESSION['flash']['type'].'">
            '.$_SESSION['flash']['message'] .'
          </div>';
        }

        if($_SESSION['flash']['type'] == "idinfo"){
          echo'
          <div id="info" class="info  '.$_SESSION['flash']['type'].'">
            '.$_SESSION['flash']['message'] .'
          </div>';
        }
      ?>


      <?php
      unset($_SESSION['flash']);

    }
  }

}
?>
