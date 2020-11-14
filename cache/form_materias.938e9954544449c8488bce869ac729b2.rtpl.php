<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inserir atividade</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sistema/admin">Página inicial</a></li>
              <li class="breadcrumb-item"><a href="/sistema/materias">Matérias</a></li>
              <li class="breadcrumb-item active">Inserir matéria</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Matérias</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form role="form" action="" method="POST">
          <div class="card-body">
             <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>Matéria</label>
                  <input type="text" style="width: 100%; height: 50px;"class="form-control" name="mat_descricao" >
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="reset" class="btn btn-default" href="/sistema/atividades">Limpar</button>
            <button type="submit" class="btn btn-info float-right">Enviar</button>
          </div>
        </div>
      </form>
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->