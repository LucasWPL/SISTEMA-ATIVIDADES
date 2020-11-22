<?php

namespace WPL;

    class GlobalClass
    {
    	
        public function __construct(){
        	DEFINE("VERSAO", "1.0.1");
        }

        public function versaoApp(){
        	return VERSAO;
        }
    }
    
?>