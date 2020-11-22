<?php
require_once("vendor/autoload.php");
use Rain\Tpl;
use WPL\Crud;
use WPL\GlobalClass;
use WPL\Page;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Fortaleza');

$config = array(
    'tpl_dir' => 'view/',
    'cache_dir' => 'cache/'
);

Tpl::configure($config);

// INÍCIO SISTEMA

$app->post('/jquery/getMaterias', function () {

    $crud = new Crud();
    $materias = $crud-> select("SELECT mat_descricao FROM tb_materias");
    $dados = "";
    foreach ($materias as $value) {
        $dados .= "<option value='{$value['mat_descricao']}'> {$value['mat_descricao']}</option>";
    }
    echo $dados;
});


$app->get('/modal/inserirMateria', function () {

    $crud = new Crud();
    $resposta = $crud -> insertMaterias($_GET);
    
    $tpl = new Page();
    $tpl -> headerLocation("insertMat", $resposta);
});

$app->post('/modal/inserirMateria', function () {

    $materia = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_STRING);

    $crud = new Crud();
    $resposta = $crud -> insertMateriaModal($materia);

    if($resposta){
        echo true;
    }else{
        echo false;
    }
});

$app->get('/', function () {

    $dia = date("Y-m-d");
    $crud = new Crud();

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
    $atividades = $crud -> select("SELECT * FROM tb_atividades");
       
    $tpl = new Page();
    $tpl -> setTable("menu_atividades", array(
        "atividades" => $atividades
    ));
    
});

$app->get('/atividades/hoje', function () {

    $dia = date("Y-m-d");
    $crud = new Crud();
    $atividades = $crud -> select("SELECT * FROM tb_atividades WHERE ativ_vencimento = '{$dia}'");
       
    $tpl = new Page();
    $tpl -> setTable("menu_atividades", array(
        "atividades" => $atividades
    ));
    
});

$app->get('/atividades/insert/', function () {
    
    $crud = new Crud();
    $materias = $crud -> select("SELECT * FROM tb_materias");

    $tpl = new Page();
    $tpl -> setTable("form_atividades", array(
        "materias" => $materias
    ));
    
});

$app->post('/atividades/insert/', function () {
    
    $crud = new Crud();
    $resposta = $crud -> insertAtividade($_POST);

    $tpl = new Page();

    $tpl -> headerLocation("insert", $resposta);

});


$app->get('/materias/insert/', function () {

    $tpl = new Page();
    $tpl -> setTable("form_materias", array());
    
});

$app->post('/materias/insert/', function () {
    
    $crud = new Crud();
    $resposta = $crud -> insertMaterias($_POST);

    $tpl = new Page();

    $tpl -> headerLocation("insert", $resposta);

});

$app->get('/atividades/update/:id', function ($id) {
       
    $crud = new Crud();
    $atividade = $crud -> select("SELECT * FROM tb_atividades WHERE idatividade = {$id}");

    $tpl = new Page();
    $tpl -> setForm("form_atividades_edit", array(
        "atividade" => $atividade[0]
    ));

    
});

$app->post('/atividades/update/:id', function ($id) {
    
    $crud = new Crud();
    $resposta = $crud -> updateAtividade($_POST);
    
    $tpl = new Page();

    $tpl -> headerLocation("update", $resposta);

});

$app->get('/atividades/concluir/:ID', function ($id) {
    
    $crud = new Crud();
    $resposta = $crud -> concluirAtividade($id);

    $tpl = new Page();

    $tpl -> headerLocation("stta", $resposta);

});

$app->get('/atividades/desconcluir/:ID', function ($id) {
    
    $crud = new Crud();
    $resposta = $crud -> desconcluirAtividade($id);

    $tpl = new Page();

    $tpl -> headerLocation("sttb", $resposta);

});

$app->get('/atividades/delete/:ID', function ($id) {
    
    $crud = new Crud();
    $resposta = $crud -> excluirAtividade($id);

    $tpl = new Page();

    $tpl -> headerLocation("delete", $resposta);

});