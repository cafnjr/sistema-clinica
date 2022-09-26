
<?php $pagina = 'usuarios' ?>



<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			
        <div class="row botao-novo">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#modal" type="button" class="btn btn-info ">Novo Usuário</button>
            </div>
        </div>
            
			
		</div>
	</div>
	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Buscar Nome" aria-label="Search" name="txtbuscar">
				<button class="btn btn-info  btn-sm my-2 my-sm-0" type="submit" name="<?php echo $pagina; ?>"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<table class="table  table-sm mt-3">
	<thead class="thead-light ">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Usuário</th>
			<th scope="col">Senha</th>
			<th scope="col">Nível</th>
            <th scope="col">Ações</th>
			
		</tr>
	</thead>
	<tbody>

        <?php 


        // DEFINIR ITENS POR PAGINA
       
            $itens_por_pagina = 10;
        
        
        
        //  PEGAR PAGINA ATUAL
        $pagina_pag = intval(@$_GET['pagina']);
        $limite = $pagina_pag * $itens_por_pagina;

        //CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';


            

            if(isset($_GET[$pagina]) and $_GET['txtbuscar'] != '' ){
            $nome_buscar = '%'.$_GET['txtbuscar'].'%';
			$res = $pdo->prepare("SELECT * from usuarios where nome LIKE :nome order by id desc LIMIT $limite, $itens_por_pagina");
			$res->bindValue(":nome", $nome_buscar);
			$res->execute();
            }else {
                $res = $pdo->query("SELECT * from usuarios order by id desc LIMIT $limite, $itens_por_pagina ");
            }

             $dados = $res->fetchAll(PDO::FETCH_ASSOC);


             //TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from usuarios");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);

            

            for($i=0; $i < count($dados); $i++){
            foreach($dados[$i] as $key => $value){
            }
            $id = $dados[$i]['id'];
            $nome = $dados[$i]['nome'];
            $usuario = $dados[$i]['usuario'];
            $senha = $dados[$i]['senha'];
            $nivel = $dados[$i]['nivel'];
            
        
          
        
        
            $linhas = count($dados);
        
        ?>



		<tr>

			<td><?php echo $nome  ?></td>
            <td><?php echo $usuario  ?></td>
            <td><?php echo $senha  ?></td>
            <td><?php echo $nivel  ?></td>
			
			<td>
				<a href="index.php?acao=usuarios&funcao=editar&id=<?php echo $id ?>"><i class="fas fa-edit text-info"></i></a>
				<a href="index.php?acao=usuarios&funcao=excluir&id=<?php echo $id ?>"><i class="far fa-trash-alt text-danger"></i></a>
			</td>
		</tr>

        <?php } ?>

	</tbody>
    
</table>


<?php 
//MOSTRAR A PÁGINAÇÃO SÓ SE NÃO HOUVER BUSCA
if(!isset($_GET[$pagina])){ ?>

<!--ÁREA DA PÁGINAÇÃO -->
<nav class="paginacao" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="btn btn-info btn-sm mr-1" href="<?php echo $caminho_pag; ?>pagina=0&itens=<?php echo $itens_por_pagina ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php 
            for($i=0;$i<$num_paginas;$i++){
            $estilo = "";
            if($pagina_pag == $i)
              $estilo = "active";
            ?>
             <li class="page-item"><a class="btn btn-info btn-sm mr-1 <?php echo $estilo; ?>" href="<?php echo $caminho_pag; ?>pagina=<?php echo $i; ?>&itens=<?php echo $itens_por_pagina ?>"><?php echo $i+1; ?></a></li>
          <?php } ?>
            
            <li class="page-item">
              <a class="btn btn-info btn-sm" href="<?php echo $caminho_pag; ?>pagina=<?php echo $num_paginas-1; ?>&itens=<?php echo $itens_por_pagina ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
</nav>
<?php } ?>









<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuários</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post">
					
						
							<div class="form-group">
								<label for="exampleFormControlInput1">Nome</label>
								<input type="text" class="form-control" id="" placeholder="Insira o Nome" name="nome" required>
							</div>
						

						    <div class="form-group">
						        <label for="exampleFormControlInput1">Email</label>
						        <input type="email" class="form-control" id="" placeholder="Insira o Email" name="usuario" required>
					        </div>


                            <div class="form-group">
								<label for="exampleFormControlInput1">Senha</label>
								<input type="text" class="form-control" id="" placeholder="Insira a Senha" name="senha" required>
							</div>


					
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				<form method="post">
					<button type="submit" name="btn-salvar" class="btn btn-info">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>

 <!--CÓDIGO DO BOTÃO SALVAR -->

<?php

if(isset($_POST['btn-salvar'])){
    $nome = $_POST['nome'];
	  $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

   // VERIFICAR SE USUARIO JÁ ESTA CADASTRADO

   $res_c = $pdo->query("SELECT * from usuarios where usuario = '$usuario' ");
   $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
   $linhas = count($dados_c);

   if($linhas == 0){
      // SALVANDO USUARIO
        $res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, nivel) values (:nome, :usuario, :senha, :nivel) ");

        $res->bindValue(":nome", $nome);
        $res->bindValue(":usuario", $usuario);
        $res->bindValue(":senha", $senha);
        $res->bindValue(":nivel", 'admin');
        

        
        $res->execute();

        echo "<script language='javascript'>window.alert('Registro Inserido !!'); </script> ";
        echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script> ";
        
   }else{
    echo "<script language='javascript'>window.alert('Usuário já Cadastrado !!'); </script> ";
   }

 
    
}

?>


<!--CÓDIGO DO BOTÃO EDITAR -->

<?php

if(@$_GET['funcao'] == 'editar'){
    $id_usuario = @$_GET['id'];

   // BUSCAR DADOS DO REGISTRO A SER EDITADO

   $res_c = $pdo->query("SELECT * from usuarios where id = '$id_usuario' ");
   $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
   
   $nome_usuario = $dados_c[0]['nome'];
   $email_usuario = $dados_c[0]['usuario'];
   $senha_usuario = $dados_c[0]['senha'];
   $email_usuario_rec = $dados_c[0]['usuario'];
   ?>


<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Usuários</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post">
					
						
							<div class="form-group">
								<label for="exampleFormControlInput1">Nome</label>
								<input type="text" class="form-control" id="" value="<?php echo $nome_usuario ?>" placeholder="Insira o Nome" name="nome">
							</div>
						

						    <div class="form-group">
						        <label for="exampleFormControlInput1">Email</label>
						        <input type="email" value="<?php echo $email_usuario ?>" class="form-control" id="" placeholder="Insira o Email" name="usuario">
					        </div>


                            <div class="form-group">
								<label for="exampleFormControlInput1">Senha</label>
								<input type="text" value="<?php echo $senha_usuario ?>" class="form-control" id="" placeholder="Insira a Senha" name="senha">
							</div>


					
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<form method="post">
					<button type="submit" name="btn-editar" class="btn btn-primary">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['btn-editar'])){
    $nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    

   // VERIFICAR SE USUARIO JÁ ESTA CADASTRADO SOMENTE SE TROCAR O EMAIL

   if($email_usuario_rec != $usuario){
    $res_c = $pdo->query("SELECT * from usuarios where usuario = '$usuario' ");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados_c);
   

   if($linhas != 0){
      // EDITANDO USUARIO
      echo "<script language='javascript'>window.alert('Usuário já Cadastrado !!'); </script> ";
      exit();
   }
   }
    

   $res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha  where id = :id");

   $res->bindValue(":nome", $nome);
   $res->bindValue(":usuario", $usuario);
   $res->bindValue(":senha", $senha);
   $res->bindValue(":id", $id_usuario);
   $res->execute();

   echo "<script language='javascript'>window.alert('Registro Editado !!'); </script> ";
   echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script> ";
    
}

?>



 
<?php } ?>



 </form>


 <!--CÓDIGO DO BOTÃO EXCLUIR -->

<?php

if(@$_GET['funcao'] == 'excluir'){
    $id_usuario = @$_GET['id'];
    $res = $pdo ->query("DELETE from usuarios where id = '$id_usuario'");
    echo "<script language='javascript'>window.alert('Registro Excluido !!'); </script> ";
    echo "<script language='javascript'>window.location='index.php?acao=$pagina'; </script> ";
}
    ?>

 <!--SCRIPT PARA CHAMR MODAL EDITAR -->

 <script>$("#modalEditar").modal("show");</script>
 <script>$("#modalAlert").modal("show");</script>

 <!--MASCARAS -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>

<!-- Modal Alert-->

<div class="modal" tabindex="-1" role="dialog" id="modalAlert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Texto do corpo do modal, é aqui.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>