<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <span id="msg"></span>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inserir atividade</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/sistema/admin">Página inicial</a></li>
              <li class="breadcrumb-item"><a href="/sistema/atividades">Atividades</a></li>
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
                  <label>Matéria
                    <a href="#" id="btn-modal" class="btn btn-tool btn-sm" style="padding-top: 0;">
                      <i class="fas fa-plus"> Incluir nova matéria</i>
                    </a>
                  </label>
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
            <button type="reset" class="btn btn-default" href="/sistema/atividades">Limpar</button>
            <button type="submit" class="btn btn-info float-right">Enviar</button>

          </div>
        </div>
      </form>
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $("#btn-modal").click(function(){
    $("#modalInserirMateria").modal();
  });

  $(document).ready(function(){
    $('#insertForm').on('submit', function(event){
      event.preventDefault();
      var dados = $('#insertForm').serialize();

      $.post("/sistema/modal/inserirMateria", dados, function(retorna){
        
        if(retorna){
          
          $("#msg").html('<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
          
          $('#insertForm')[0].reset();
          
          $('#modalInserirMateria').modal('hide');
        
        }else{

        }
        
      });
    });
  });

</script>
  <div class="modal fade" id="modalInserirMateria">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inserir matéria</h4>
            </div>

            <div class="modal-body">
                <form class="form-group row" method="post" id="insertForm">
                  <label class="col-sm-2 col-form-label">Matéria</label>
                  <div class="col-sm-10">
                    <input type="text" name="materia" name="materia" class="form-control" placeholder="Nome da matéria...">
                  </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="cadMateria" id="cadMateria" value="Cadastrar" class="btn btn-info">Cadastrar</button>
            </div>
            </form>
        </div>
    </div>
</div>

  <!-- /.content-wrapper -->