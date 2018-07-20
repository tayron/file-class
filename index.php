<?php
require('File.php');

$contentPHP = "<?php" . File::ENTER;
$contentPHP .= 'class Pessoa{' . File::ENTER2;
$contentPHP .= File::TAB . 'private $nome;' . File::ENTER2;
$contentPHP .= File::TAB . 'public function setNome($nome)' . File::ENTER;
$contentPHP .= File::TAB . '{' . File::ENTER;
$contentPHP .= File::TAB2 . '$this->nome = $nome;' . File::ENTER;
$contentPHP .= File::TAB . '}' . File::ENTER;
$contentPHP .= '}';

$file = new File('teste.txt');
$file->create();
$file->write($contentPHP);
highlight_string(implode(null, $file->read()));
$arquivoImportato = $file->import();

echo '<pre>';
var_dump($arquivoImportato);

$pessoa = new Pessoa();
$pessoa->setNome('Pedro');

var_dump($pessoa);
echo '</pre>';

$file->delete();