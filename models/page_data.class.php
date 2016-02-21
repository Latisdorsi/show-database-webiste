<?php
class page_data{
    public $title = "";
    public $css = "";
    public $script = "";
    public $content = "";

    public function addStyle($file){

        $this->css .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$file\">";
    }
    public function addScript($file){

        $this->script .= "<script src=\"$file\"></script>";
    }
}