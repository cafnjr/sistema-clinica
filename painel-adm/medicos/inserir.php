<?php 

require_once("../../conexao.php");


$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];


	//VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from medicos where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into medicos (nome, especialidade, crm, cpf, telefone, email) values (:nome, :especialidade, :crm, :cpf, :telefone, :email) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":especialidade", $especialidade);
	$res->bindValue(":crm", $crm);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	

	$res->execute();

   


	echo '
    
    <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Cadastrado com Sucesso !!
  </div>
    
    ';

}else{
	echo '
    
    <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Profissional já Cadastrado !!
  </div>
</div>
    
    ';
}

?>
