

<?php $pagina = 'medicos' ?>





<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		<div class="float-left">
			
        <div class="row botao-novo">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#modal" type="button" class="btn btn-info ">Novo Médico</button>
            </div>
        </div>
            
			
		</div>
	</div>
	

	<div class="col-md-6 col-sm-12">
		

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CRM" aria-label="Search" name="txtbuscar" id="txtbuscar">
				<button class="btn btn-info btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>




<div id="listar">



</div>






<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cadastro de Médicos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
							<label for="exampleFormControlInput1">Nome</label>
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome" name="nome" required>
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Especialidade</label>
								<select class="form-control" id="especialidade" name="especialidade">
									<option>1</option>
								</select>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">CRM</label>
								<input type="text" class="form-control" id="crm" name="crm" placeholder="Insira o CRM" required>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
							<label for="exampleFormControlInput1">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF" required>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Telefone</label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira o Telefone" required>
							</div>
						</div>
					</div>
					
					
					
					
					
					<div class="form-group">
					<label for="exampleFormControlInput1">Email</label>
					<input name="email" type="email" class="form-control" id="email" placeholder="Insira o Email">
					</div>
					
					<div class="col--md-12"  id="mensagem" >
		

					</div>
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				
					<button name="btn-salvar" id="btn-salvar" class="btn btn-info">Salvar</button>
				
			</div>
			</form>
		</div>
	</div>
</div>




 <!--MASCARAS -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>

<!--AJAX PARA INSERÇÃO DO DADOS -->

<script>
	$(document).ready(function(){
		$('#btn-salvar').click(function(){
			event.preventDefault();
			$.ajax({
				url: "medicos/inserir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){
					$('#mensagem').html(mensagem)

					$('#nome').val('') 
					$('#cpf').val('') 
					$('#crm').val('')
					$('#telefone').val('')
					$('#email').val('')
				}

			})
		})
	})
</script>

<!--AJAX PARA LISTAR DO DADOS -->

<script>
	$(document).ready(function(event){
		
			
			$.ajax({
				url: "medicos/listar.php",
				dataType: "html",
				success: function(result){
					$('#listar').html(result)
					
				}

			})
		})
	
</script> 

<!--AJAX PARA BUSCAR DO DADOS -->

<script>
	$(document).ready(function(event){
		$('#btn-buscar').click(function(){
			event.preventDefault();
			
			$.ajax({
				url: "medicos/listar.php",
				data: $('form').serialize(),
				dataType: "text",
				dataType: "html",
				success: function(result){
					$('#listar').html(result)
					
				}

			})
		})
		})
	
</script> 













