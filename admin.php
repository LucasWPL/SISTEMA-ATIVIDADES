<?php
require_once("vendor/autoload.php");
use Rain\Tpl;
use WPL\Crud;
use WPL\GlobalClass;
use WPL\Page;

$config = array(
    'tpl_dir' => 'view/',
    'cache_dir' => 'cache/'
);

Tpl::configure($config);

// INÍCIO ADMIN

$app->get('/', function () {

    $dia = date("Y-m-d");
    $crud = new Crud();
    $crud -> connect();

    $atividades = $crud -> select("SELECT * FROM tb_atividades");
    $hoje = $crud -> select("SELECT * FROM tb_atividades WHERE ativ_vencimento = '{$dia}'");

    $tpl = new Page();
    $tpl-> setTpl("index", array(
        "atividades"=> count($atividades),
        "atividadeshoje"=> count($hoje)
    ));
    
});

$app->get('/atividades/', function () {

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
    $tpl -> draw("validacoes");
    $tpl -> draw("menu_atividades");
    $tpl -> draw("footer_table");
    
});

$app->get('/atividades/hoje', function () {

    $dia = date("Y-m-d");
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $atividades = $crud -> select("SELECT * FROM tb_atividades WHERE ativ_vencimento = '{$dia}'");

    
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
    $tpl -> draw("validacoes");
    $tpl -> draw("menu_atividades");
    $tpl -> draw("footer_table");
    
});

$app->get('/atividades/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $materias = $crud -> select("SELECT * FROM tb_materias");

    $tpl = new Tpl();
    $tpl -> assign("materias", $materias);
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("validacoes");
    $tpl -> draw("form_atividades");
    $tpl -> draw("footer_form");
    
});

$app->post('/atividades/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> insertAtividade($_POST);

    header("Location: /sistema/atividades/?insert={$resposta}");
    exit;
});


$app->get('/materias/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();

    $tpl = new Tpl();
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("validacoes");
    $tpl -> draw("form_materias");
    $tpl -> draw("footer_form");
    
});

$app->post('/materias/insert/', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> insertMaterias($_POST);

    header("Location: /sistema/atividades/?insert={$resposta}");
    exit;
});

$app->get('/atividades/update/:id', function ($id) {
       
    $crud = new Crud();
    $crud -> connect();
    $user = $crud -> selectUser();
    $atividade = $crud -> select("SELECT * FROM tb_atividades WHERE idatividade = {$id}");

    $tpl = new Tpl();
    $tpl -> assign("atividade", $atividade[0]);
    $tpl -> assign("user", $user[0]);
    $tpl -> draw("topo_form");
    $tpl -> draw("validacoes");
    $tpl -> draw("form_atividades_edit");
    $tpl -> draw("footer_form");
    
});

$app->post('/atividades/update/:id', function () {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> updateAtividade($_POST);
    
    header("Location: {$_SERVER['HTTP_REFERER']}?update={$resposta}");
    exit;
});

$app->get('/atividades/concluir/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> concluirAtividade($id);

    header("Location: {$_SERVER['HTTP_REFERER']}?stta={$resposta}");
    exit;
});

$app->get('/atividades/desconcluir/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> desconcluirAtividade($id);

    header("Location: {$_SERVER['HTTP_REFERER']}?sttb={$resposta}");
    exit;
});

$app->get('/atividades/delete/:ID', function ($id) {
    
    $crud = new Crud();
    $crud -> connect();
    $resposta = $crud -> excluirAtividade($id);

    header("Location: {$_SERVER['HTTP_REFERER']}?delete={$resposta}");
    exit;
});