<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inserir atividade</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sistema/admin">Página inicial</a></li>
              <li class="breadcrumb-item"><a href="/sistema/admin/atividades">Atividades</a></li>
              <li class="breadcrumb-item active">Inserir atividade</li>
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
            <h3 class="card-title">Atividade</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form role="form" action="" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Matéria</label>
                  <select class="form-control select2" style="width: 100%;" name="ativ_materia">
                    <?php $counter1=-1;  if( isset($materias) && ( is_array($materias) || $materias instanceof Traversable ) && sizeof($materias) ) foreach( $materias as $key1 => $value1 ){ $counter1++; ?>
                    <option value="<?php echo htmlspecialchars( $value1["mat_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["mat_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Data para entrega</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="ativ_vencimento">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" placeholder="Descrição..." name="ativ_descricao"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="reset" class="btn btn-default" href="/sistema/admin/atividades">Limpar</button>
            <button type="submit" class="btn btn-info float-right">Enviar</button>
          </div>
        </div>
      </form>
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->