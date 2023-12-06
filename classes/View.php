<?php

class View{

    public function includeView($filename){
        $dir=dirname(__DIR__);
        include_once $dir."/resources/views/".$filename;



    }

}

