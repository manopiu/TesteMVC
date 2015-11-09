<?php
require_once 'config/includes/config.php';
require_once 'config/includes/roteador.php';
require_once 'config/includes/functions.php';

$roteador = new Roteador();

/*AQUI EU PEGO OS PARAMETROS DA URL
 * EXEMPLO:
 * http://localhost/TesteMVC/Cadastrar
 * TesteMVC  -> SERIA A PASTA DENTRO DO SERVER (À PASTA RAIZ);
 * Cadastrar -> É O COMANDO PARA A PAGINA DE CADASTRO DE USUÁRIO;
 * 
 * VOCÊ TAMBÉM PODE USAR ASSIM...
 * 
 * http://localhost/TesteMVC/Cliente/alterar/30
 * DA MESMA FORMA QUE O ANTERIOR...
 * 
 * TesteMVC  -> SERIA A PASTA DENTRO DO SERVER (À PASTA RAIZ);
 * 
 * Cliente -> PASTA CLIENTE DENTRO DA PASTA WEB, SENDO QUE É DIRECIONADO PARA O 
 * ARQUIVO web_Cliente.php (O PREFIXO "web_" É SÓ PRA DIFERENCIAR DOS ARQUIVOS
 * DO MODEL E CONTROLLER;
 * 
 * alterar - > NESSE CASO SERIA FEITA UMA ALTERAÇÃO DO CLIENTE;
 * 
 * 30 -> AQUI JÁ SERIA O ID DO CLIENTE QUE TERIA QUE SER BUSCADO NO BANDO DE DADOS.
 * 
 * OBSERVAÇÃO - DEIXEI A PAGINA CLIENTE COMO EXEMPLO.
*/
$pagina   = $roteador->parametro(0);
$acao     = $roteador->parametro(1);
$id       = $roteador->parametro(2);

include "web/topo.php";

include "web/paginas.php";

include "web/rodape.php";
?>