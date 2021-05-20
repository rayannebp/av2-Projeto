<section class="content-header">
      Administradores / editar
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <?php
                include("classes/Admin.class.php");
                $id = $_GET['id'];
                if(isset($_POST['botao']) && $_POST['botao'] == "Editar"){ 
                    $admin = new Admin();
                    $admin->setId($_POST['id']);
                    $admin->setNome($_POST['nome']);
                    $admin->setEmail($_POST['email']);
                    $admin->setTelefone($_POST['telefone']);
                    $admin->atualizar();    
                }
                $admins = Admin::selecionar($id);

                if($admins){
                    foreach($admins as $admin){
                ?>
                        <form method='post' action=''>
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" value = "<?php echo $admin->getNome();?>">
                            </div>
                            <div class="form-group">
                                <label for="nome">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value = "<?php echo $admin->getEmail();?>">
                            </div>
                            <div class="form-group">
                                <label for="nome">Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value = "<?php echo $admin->getTelefone();?>">
                            </div>
                            <input type="hidden" name='id' value = "<?php echo $admin->getId();?>">
                            <input type='submit' name='botao' value='Editar'>
                <?php
                    }
                }else{echo "<tr><td colspan='4'> Nenhum Registro Encontrado.</td></tr>";}
                ?>
                        </form>
        </div>
    </div>
</section>