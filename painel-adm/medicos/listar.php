<?php 
require_once("../../conexao.php");



$txtbuscar = @$_POST['txtbuscar'];
echo "<script language='javascript'>window.alert('$txtbuscar'); </script> ";






echo  '
<table class="table table-sm mt-3">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Especialidade</th>
			<th scope="col">CRM</th>
			<th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody> ';
     
	
		$res = $pdo->query("SELECT * from medicos order by id desc");
    	$dados = $res->fetchAll(PDO::FETCH_ASSOC);

    for($i=0; $i < count($dados); $i++){
        foreach($dados[$i] as $key => $value){
        }
        $id = $dados[$i]['id'];
        $nomem = $dados[$i]['nome'];
        $especialidade = $dados[$i]['especialidade'];
        $email = $dados[$i]['email'];
        $cpf = $dados[$i]['cpf'];
        $crm = $dados[$i]['crm'];
        $telefone = $dados[$i]['telefone'];
        
    
      
    
    
    

        echo '
		<tr>

			<td>'.$nomem.'</td>
			<td>'.$especialidade.'</td>
			<td>'.$crm.'</td>
			<td>'.$cpf.'</td>
            <td>'.$telefone.'</td>
            <td>'.$email.'</td>
			<td>
				<a href="#"><i class="fas fa-edit text-info"></i></a>
				<a href="#"><i class="far fa-trash-alt text-danger"></i></a>
			</td>
		</tr> ';

    }

        echo '
        


	</tbody>
</table>


'


?>