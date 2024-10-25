<?php
session_start();
function usuarioEstaLogado()
{
  return isset($_SESSION["usuario_logado"]);
}
function verificaUsuario()
{
  if (!usuarioEstaLogado()) {
    $_SESSION['danger'] = "você não tem acesso a esta funcionalidade";
    header("Location: /gerarorcamento/principal.php");
    die();
  }
}
function usuarioLogado()
{
  return $_SESSION["usuario_logado"];
}
function logaUsuario($email)
{
  return $_SESSION["usuario_logado"] = $email;
}
function logout()
{
  session_destroy();
}
function modal($mensagem)
{
  //aqui vamos receber por parametro o tipo de condição e o valor
?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><?php echo $mensagem ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendi</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
    myModal.show()
    myModal.close()
  </script>
<?php  }
