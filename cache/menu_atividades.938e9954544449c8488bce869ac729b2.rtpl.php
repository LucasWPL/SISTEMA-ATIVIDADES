<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Atividades</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sistema/admin">Página Inicial</a></li>
              <li class="breadcrumb-item active">Menu atividades</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de atividades</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Matéria</th>
                    <th>Descrição</th>
                    <th>Data de entrega</th>
                    <th>Status</th>
                    <th>Data de conclusão</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                <?php $counter1=-1;  if( isset($atividades) && ( is_array($atividades) || $atividades instanceof Traversable ) && sizeof($atividades) ) foreach( $atividades as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["idatividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["ativ_materia"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["ativ_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["ativ_vencimento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

                    <?php if( $value1["ativ_conclusao"] == 'SIM' ){ ?>
                      <td>Concluída</td>
                      <?php }else{ ?>
                      <td>Não concluída</td>
                    <?php } ?>
                    <?php if( $value1["ativ_conclusao"] != '' ){ ?>
                      <td><?php echo htmlspecialchars( $value1["ativ_conclusao_data"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ás <?php echo htmlspecialchars( $value1["ativ_conclusao_hora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                      <?php }else{ ?>
                      <td></td>
                    <?php } ?>
                    
                    <td>

                        <?php if( $value1["ativ_conclusao"] == 'SIM' ){ ?>
                          <a class="btn btn-success btn-sm" href="/sistema/atividades/desconcluir/<?php echo htmlspecialchars( $value1["idatividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente mudar o status para não concluída?')">
                            <i class="fas fa-sync-alt">
                            </i>
                            
                        </a>
                          <?php }else{ ?>
                          <a class="btn btn-success btn-sm" href="/sistema/atividades/concluir/<?php echo htmlspecialchars( $value1["idatividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente mudar o status para concluída?')">
                            <i class="fas fa-check">
                            </i>
                            
                        </a>
                        <?php } ?>
                        <a class="btn btn-info btn-sm" href="/sistema/atividades/update/<?php echo htmlspecialchars( $value1["idatividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            
                        </a>
                        <a class="btn btn-danger btn-sm" href="/sistema/atividades/delete/<?php echo htmlspecialchars( $value1["idatividade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir esta atividade?')">
                            <i class="fas fa-trash">
                            </i>
                            
                        </a>
                    </td>
                  </tr>
                <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
