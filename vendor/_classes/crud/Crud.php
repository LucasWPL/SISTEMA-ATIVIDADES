<?php

namespace WPL;

    class Crud 
    {
        private $conn;
        const HOST = "127.0.0.1";
        const USER = "root";
        const PASS = "";
        const DB = "bd_sistema";
      
        public function connect(){}
        
        public function __construct()
        {
            try
            {
                $this ->conn = new \PDO ( 'mysql:host=' . Crud::HOST . ';dbname=' . Crud::DB, Crud::USER, Crud::PASS);
                $this-> conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       
            }
            catch ( PDOException $e) 
            {
                echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
            }
        } 

        public function select ($query){

            $stmt = $this-> conn-> query($query);
            $res = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
           
            return $res;
        }

        public function selectUser (){

            $stmt = $this-> conn-> query("SELECT * FROM tb_usuarios WHERE idusuario = 1");
            $res = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
           
            return $res;
        }

        public function insertAtividade($post){
            
            
            $stmt = $this-> conn-> prepare("INSERT INTO tb_atividades (ativ_materia, ativ_vencimento, ativ_descricao) VALUES ('{$post['ativ_materia']}', '{$post['ativ_vencimento']}', '{$post['ativ_descricao']}')");
            
            $res = $stmt-> execute();
            
            return $res;
        }

         public function insertMaterias($post){
            
            
            $stmt = $this-> conn-> prepare("INSERT INTO tb_materias (mat_descricao) VALUES ('{$post['mat_descricao']}')");
            
            $res = $stmt-> execute();
            
            return $res;
        }

        public function updateAtividade($post){
            

            $stmt = $this-> conn-> prepare("UPDATE tb_atividades SET ativ_materia = '{$post['ativ_materia']}', ativ_vencimento = '{$post['ativ_vencimento']}', ativ_descricao = '{$post['ativ_descricao']}' WHERE idatividade = {$post['idatividade']}");

            $res = $stmt-> execute();
            
            return $res;
        }

        public function concluirAtividade($id){

            date_default_timezone_set('America/Sao_Paulo');

            $data = \date("Y-m-d");
            $hora = \date("H:i");
            
            $stmt = $this-> conn-> prepare("UPDATE tb_atividades SET ativ_conclusao = 'SIM', ativ_conclusao_data = '{$data}', ativ_conclusao_hora = '{$hora}' WHERE idatividade = {$id}");
            
            $res = $stmt-> execute();
                        
            return $res;
        }

        public function desconcluirAtividade($id){

            $stmt = $this-> conn-> prepare("UPDATE tb_atividades SET ativ_conclusao = '', ativ_conclusao_data = '', ativ_conclusao_hora = '' WHERE idatividade = {$id}");
            
            $res = $stmt-> execute();
                        
            return $res;
        }

        public function excluirAtividade($id){

            $stmt = $this-> conn-> prepare("DELETE FROM tb_atividades WHERE idatividade = {$id}");
            
            $res = $stmt-> execute();
                        
            return $res;
        }

    }
    
?>