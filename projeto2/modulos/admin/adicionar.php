  <!-- Content Header (Page header) -->
    <section class="content-header">
      Administradores / adicionar
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
	        <?php
				if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){ 
					include("classes/Admin.class.php");
					$admin = new admin();
		    		$admin->setNome($_POST['nome']);
		    		$admin->setEmail($_POST['email']);
		    		$admin->setTelefone($_POST['telefone']);
		    		$admin->adicionar();    
				}
			?>

				<form method='post' action=''>
					<div class="form-group">
				    	<label for="nome">Nome:</label>
				    	<input type="text" class="form-control" id="nome" name="nome"placeholder="Nome completo">
					</div>
					<div class="form-group">
				    	<label for="email">Email</label>
				        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
				    </div>
					<div class="form-group">
				    	<label for="nome">Telefone:</label>
				    	<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
					</div>
					<input type='submit' name='botao' value='Salvar'>
				</form>
			</div>
		</div>
	</section>