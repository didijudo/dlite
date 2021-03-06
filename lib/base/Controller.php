<?php
class Controller {
  const POST = 'POST';
  const GET = 'GET';
  public $request;
  protected $msg = array();
	
  public function __construct(Request $req) {
    $this->request = $req;
  }


	protected function processRequest() {
	}

  protected function url($url) {
    return $url;
  }

  /*
   * Função  para pegar as mensagens do sistema
   */

  protected function getMsg() {
    $html = <div class=" center span12"/>;
    $this->msg = 
      (!isset($_SESSION['msg_system'])) ? '' : $_SESSION['msg_system'];
    if ($this->msg){
      foreach ($this->msg as $msg) {
        switch ($msg[0]) { 

          case ERROR:
            $html->appendChild(
              <div class="alert alert-danger col-lg-12 center front">
                <button type="button" class="close" data-dismiss="alert">
                  &times;
                </button> 
                <strong>{$msg[1]}</strong>
              </div>);
            break;

          case SUCCESS:
            $html->appendChild(
              <div class="alert alert-success front col-lg-12 center">
                <button type="button" class="close" data-dismiss="alert">
                  &times;
                </button> 
                <strong>{$msg[1]}</strong>
              </div>);
            break;

          case WARNING:
            $html->appendChild(
              <div class="alert alert-warning front col-lg-12 center">
                <button type="button" class="close" data-dismiss="alert">
                  &times;
                </button> 
                <strong>{$msg[1]}</strong>
              </div>);
            break;

          case INFO:
            $html->appendChild(
              <div class="alert alert-info col-lg-12 center">
                <button type="button" class="close" data-dismiss="alert">
                  &times;
                </button> 
                <strong>{$msg[1]}</strong>
              </div>);
            break;
        }
      }
    } 
    $_SESSION['msg_system'] = array();
    return $html; 
  }

  protected function setRequest(Request $r) {
    if (!$this->request) {
      $this->request = $r;
    }
  }

  protected function getRequest() {
    return $this->request;
  }
}
