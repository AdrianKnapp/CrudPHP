<?php
require __DIR__.'/../config.php';
class Usuarios {
  private $pdo;
  private $id;
  private $permissoes;
  public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  public function fazerLogin($loginUser, $loginPass) {
    $loginUser = addslashes($loginUser);
    $loginPass = addslashes($loginPass);
    $sql = "SELECT * FROM usuarios WHERE user = '$loginUser' AND password = '$loginPass'";
		$sql = $this->pdo->query($sql);
    if($sql->rowCount() > 0) {
      $sql = $sql->fetch();
      $_SESSION['logado'] = $sql['id'];
      return true;
    } else {
      return false;
    }
  }
  public function cadastrarUsuario($name, $passport, $user, $password){
    $sql = "
    INSERT INTO usuarios
    (
      name,
      passport,
      user,
      password,
      type,
      permissoes
    )
    VALUES 
    (
      '$nome',
      '$origem',
      '$email',
      '$senha1',
      '$numCelular',
      'user'
    )
    ";
    print_r($sql);
    var_dump($sql);
    $sql = $this->pdo->query($sql);
  }

  public function setUsuario($id) {
    $this->id=$id;
    $sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
    $sql->execute();

/*     if($sql->rowCount() > 0){
      $sql = $sql->fetch();
      $this->permissoes = explode(',', $sql['permissoes']);
    }  */
  }
  public function getPermissoes(){
    return $this->permissoes;
  }
  public function temPermissao($p) {
    if(in_array($p, $this->permissoes)) {
      return true;
    } else{
      return false;
    }
  }
}
?>