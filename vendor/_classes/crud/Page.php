<?php

namespace WPL;
use Rain\Tpl;
use WPL\Crud;

    class Page
    {
        private $versao = "1.0.1";
        private $tpl;
        private $options = [];
        private $defaults = [
            "data" => []
        ];
        public function __construct($opts = array(), $tpl_dir = "/sistema/view/")
        {
            $this-> options = array_merge($this-> defaults, $opts);
            
            $config = array(
                "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . $tpl_dir,
                "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . "/sistema/views-cache/",
                "debug"         => true
               );

            Tpl::configure( $config );

            $this->tpl = new Tpl();

            $this->setData($this-> options["data"]);
        }

        public function setData($data = array())
        {	
        	
            $crud = new Crud();
            $user = $crud-> selectUser();

            $dia = date('Y-m-d');
            $this->tpl-> assign("user",$user[0]);
            $this->tpl-> assign("dia",$dia);
            $this->tpl-> assign("versao",$this-> versao);

            foreach ($data as $key => $value) {
                $this->tpl-> assign($key,$value);
            }
            
        }


        public function setTpl($name, $data = array())
        {

            $this-> setData($data);

            
            $this-> tpl->draw("topo");
            $this-> tpl->draw("validacoes");
            $this-> tpl->draw($name);
            $this-> tpl->draw("footer");

        }

        public function setTable($name, $data = array())
        {

            $this-> setData($data);

            
            $this-> tpl->draw("topo_table");
            $this-> tpl->draw("validacoes");
            $this-> tpl->draw($name);
            $this-> tpl->draw("footer_table");

        }

        public function setForm($name, $data = array())
        {

            $this-> setData($data);

            
            $this-> tpl->draw("topo_form");
            $this-> tpl->draw("validacoes");
            $this-> tpl->draw($name);
            $this-> tpl->draw("footer_form");

        }

        public function headerLocation($get = "", $response = "1")
        {
            $utlimaPagina = explode("?",$_SERVER['HTTP_REFERER']);
            $endereco = $utlimaPagina[0];

            header("Location: {$endereco}?{$get}={$response}");
            exit;
        }


        public function __destruct()
        {
        }

        
    }
    
?>