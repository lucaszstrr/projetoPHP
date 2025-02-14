<?php   

$novoUsuario = readline("Novo usuário: ");
$novaSenha = readline("Nova senha: ");

$logins = ['login' => "$novoUsuario", 'senha' => $novaSenha];    
print_r($logins);
echo "Usuário cadastrado" .PHP_EOL;


/*
if($logins['login'] === $logins['senha']){
    echo "Usuário logado" .PHP_EOL;
}else{
    echo "Usuário não cadastrado e/ou senha/usuário incorretos" .PHP_EOL;
}
*/

$entrada = readline("Digite aqui o login: ");
$password = readline("Digite aqui a senha: ");

if($entrada === $logins["$novoUsuario"] && $password === $logins[$novaSenha]){

    echo "Usuário foi logado com sucesso" .PHP_EOL;

}else{

    echo "O usuário ou senha estão incorretos" .PHP_EOL;

}









/*

$usuariosPermitidos = array_key_exists($novoUsuario, $logins);

if($usuariosPermitidos === true && $logins['login'] === $novaSenha){
   
    echo "Usuário logado" .PHP_EOL;
 
           
}else{

    echo "A chave não existe ou está incorreta, tente novamente" .PHP_EOL;
        
}

*/