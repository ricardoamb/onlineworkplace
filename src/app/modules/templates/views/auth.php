<?php defined('BASEPATH') OR exit('Acesso Negado.');

switch ($screen)
{
    case 'login':
        echo 'Tela de Login';
        break;
    default:
        echo 'Página não existe!';
        break;
}