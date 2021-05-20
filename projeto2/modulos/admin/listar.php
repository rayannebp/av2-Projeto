<?php
  include("classes/Admin.class.php");
  $admins = Admin::listar();

  if($admins){
?>

  <!-- Content Header (Page header) -->
    <section class="content-header">
      Administradores / Listar
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Comandos</th>
              </tr>
              <?php
                foreach($admins as $admin){
              ?>
              <tr>
                <td><?php echo $admin->getId();?></td>
                <td><?php echo $admin->getNome();?></td>
                <td><?php echo $admin->getEmail();?></td>
                <td><?php echo $admin->getTelefone();?></td>
                <td>
                  <a href="?modulo=admin&acao=editar&id=<?php echo $admin->getId();?>"><button class="btn btn-warning" title="Editar"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                  <a href="?modulo=admin&acao=excluir&id=<?php echo $admin->getId();?>"><button class="btn btn-danger" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
              </tr>
              <?php
                  }
                }?>
            </table>
        <!-- /.box-footer-->
          </div>
        </div>
      </div>
      <!-- /.box -->
    </section>  
    <!-- /.content -->