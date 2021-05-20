<section class="content-header">
      Clientes / excluir
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
        <?php
            include("classes/Cliente.class.php");
            $id = $_GET['id'];
            if(isset($_POST['botao']) && $_POST['botao'] == "Excluir"){ 
                $cliente = new Cliente();
                $cliente->setId($_POST['id']);
                $cliente->setNome($_POST['nome']);
                $cliente->setEmail($_POST['email']);
                $cliente->setTelefone($_POST['telefone']);
                $cliente->excluir();    
            }

            $clientes = Cliente::selecionar($id);

        if($clientes){
            foreach($clientes as $cliente){
        ?>
                <form method='post' action=''>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value = "<?php echo $cliente->getNome();?>">
                    </div>
                    <div class="form-group">
                        <label for="nome">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value = "<?php echo $cliente->getEmail();?>">
                    </div>
                    <div class="form-group">
                        <label for="nome">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value = "<?php echo $cliente->getTelefone();?>">
                    </div>
                    <input type="hidden" name='id' value = "<?php echo $cliente->getId();?>">
                    <input type='submit' name='botao' value='Excluir'>
    <?php
            }
        }else{echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";}
    ?>
                </form>
        </div>
    </div>
</section>
