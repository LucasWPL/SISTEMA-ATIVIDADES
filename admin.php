<?php
require_once("vendor/autoload.php");
use Rain\Tpl;
use WPL\Crud;

$config = array(
    'tpl_dir' => 'view/',
    'cache_dir' => 'cache/'
);

Tpl::configure($config);

// INÍCIO ADMIN

$app->get('/admin/', function () {

    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $atividades = $crud -> select("SELECT * FROM tb_atividades");

    $tpl = new Tpl();
    $tpl -> assign("user", $user[0]);
    $tpl -> assign("atividades", count($atividades));

    $tpl -> draw("topo");
    $tpl -> draw("index");
    $tpl -> draw("footer");
    
});

$app->get('/admin/atividades/', function () {

    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $atividades = $crud -> select("SELECT * FROM tb_atividades");

    
    $i = 0;
    
    foreach ($atividades as $value) {

        $atividades[$i]['ativ_vencimento'] = date('d/m/Y', strtotime($value['ativ_vencimento']));
        $atividades[$i]['ativ_conclusao_data'] = date('d/m/Y', strtotime($value['ativ_conclusao_data']));
        
        $i++;

    }
       
    $tpl = new Tpl();
    $tpl -> assign("atividades", $atividades);
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_table");
    $tpl -> draw("menu_atividades");
    $tpl -> draw("footer_table");
    
});

$app->get('/admin/atividades/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $materias = $crud -> select("SELECT * FROM tb_materias");

    $tpl = new Tpl();
    $tpl -> assign("materias", $materias);
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("form_atividades");
    $tpl -> draw("footer_form");
    
});

$app->post('/admin/atividades/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> insertAtividade($_POST);

    header("Location: /sistema/admin/atividades/?insert={$resposta}");
    exit;
});


$app->get('/admin/materias/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();

    $tpl = new Tpl();
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("form_materias");
    $tpl -> draw("footer_form");
    
});

$app->post('/admin/materias/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> insertMaterias($_POST);

    header("Location: /sistema/admin/atividades/?insert={$resposta}");
    exit;
});

$app->get('/admin/atividades/update/:id', function ($id) {
       
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $atividade = $crud -> select("SELECT * FROM tb_atividades WHERE idatividade = {$id}");

    $tpl = new Tpl();
    $tpl -> assign("atividade", $atividade[0]);
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("form_atividades_edit");
    $tpl -> draw("footer_form");
    
});

$app->post('/admin/atividades/update/:id', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> updateAtividade($_POST);

    header("Location: /sistema/admin/atividades/?update={$resposta}");
    exit;
});

$app->get('/admin/atividades/concluir/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> concluirAtividade($id);

    header("Location: /sistema/admin/atividades/?insert={$resposta}");
    exit;
});

$app->get('/admin/atividades/desconcluir/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> desconcluirAtividade($id);

    header("Location: /sistema/admin/atividades/?insert={$resposta}");
    exit;
});

$app->get('/admin/atividades/delete/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> excluirAtividade($id);

    header("Location: /sistema/admin/atividades/?delete={$resposta}");
    exit;
});