<?php   

$novoUsuario = [];
$novaSenha = [];

$novoUsuario = readline();
$novaSenha = readline();

$logins = ['login' => $novoUsuario, 'senha' => $novaSenha];    

print_r($logins);

if($logins['login'] === $logins['senha']){
    echo "Usuário logado" .PHP_EOL;
}else{
    echo "Usuário não cadastrado e/ou senha/usuário incorretos" .PHP_EOL;
}