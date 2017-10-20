<?php
namespace Hcode;
use Rain\Tpl;
class Page //iniciando classe para confecção de layout do site
{
private $tpl;
private $options=[];
private $defaults=[
"data"=>[]
];
public function __construct($opts = array()) //cabeçalho do site
{
$this->options = array_merge($this->$defaults, $opts); //mescla os array | caso o usuario passe parametros prevalece os parametros passado | pega os parametros defaults
$config = array(
"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/", //INDICA O LUGAR A ONDE ESTA O TEMPLATE
"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/", //INDIACA O LUGAR A ONDE ESTA O CACHE DO TEMPLATE
"debug"         => false // set to false to improve the speed
    );
Tpl::configure( $config ); //instancia o $config do Tpl
$this->$tpl = new Tpl; //instancia a class Tpl
$this->setData($this->options["data"]);  //chama o metodo setData e passa parametros
$this->tpl->draw("header"); //criar o cabeçalho
}
private function setData($data = array()) //criando metodo foreach para usar em varios lugares
{
foreach ($data as $key =>$value)
{
$this->tpl->assign($key,$value);
}
}
public function setTpl($name, $data = array(), $returnHTML = false) //corpo do site
{
$this->setData($data); //criar o corpo do site
return $this->tpl->draw($name, $returnHTML); //cria o template do site
}
public function __destruct() //rodape do site
{
$this->tpl->draw("footer"); //criar o rodape
}
}
?>
