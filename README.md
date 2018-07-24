## File Class

Classe para manipulação de arquivo texto.


## Recursos
  - __construct($pathWithFileName) - Nome do arquivo com seu caminho
  - create() - Cria o arquivo caso ele não exista
  - write($content) - Grava string no arquivo
  - readAsString() - Ler o arquivo e retorna seu conteúdo como uma string
  - read() - Ler o arquivo e retorna seu conteúdo, onde cada linha é uma posição do array
  - delete() - Remove o arquivo
  - import() - Inclui o arquivo (include)

## Exemplo de uso 

```
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

Saída da função highlight_string: 
<?php
class Pessoa{
    private $nome;
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}


// Faz o include so arquivo para utilizar a classe
$arquivoImportato = $file->import(); 

// Exibe a estrutura da classe
echo '<pre>';
var_dump($arquivoImportato);

// Cria instancia da classe Pessoa do arquivo importato
$pessoa = new Pessoa();
$pessoa->setNome('Pedro');

// Exibe instancia da classe em memória com nome Pedro setado
var_dump($pessoa);
echo '</pre>';

// Remove o arquivo criado com a classe Pessoa
$file->delete(); 
```