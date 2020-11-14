<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php if( isset($_GET['insert']) and $_GET['insert'] == 1 ){ ?>
    <div class="col-md-12">
      <div class="card bg-success">
        <div class="card-header">
          <h3 class="card-title">Atividade inserida com sucesso!</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <?php } ?>

    <?php if( isset($_GET['insert']) and $_GET['insert'] != 1 ){ ?>
    <div class="col-md-12">
      <div class="card bg-danger">
        <div class="card-header">
          <h3 class="card-title">Ocorreu um erro na inserção da atividade!</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <?php } ?>

    <?php if( isset($_GET['stta']) and $_GET['stta'] == 1 ){ ?>
    <div class="col-md-12">
      <div class="card bg-success">
        <div class="card-header">
          <h3 class="card-title">Status atualizado com sucesso!</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <?php } ?>

    <?php if( isset($_GET['stta']) and $_GET['stta'] != 1 ){ ?>
    <div class="col-md-12">
      <div class="card bg-danger">
        <div class="card-header">
          <h3 class="card-title">Ocorreu um erro na atualização de status!</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <?php } ?>