<?php 

    //Função de login
    function login(){

        echo "Usuário: " .PHP_EOL;
        $usuario = readline();
        echo "Senha: " .PHP_EOL;
        $senha = readline();

        if($usuario === 'lucas' && $senha === '123'){
            logAlteracoes("O usuário $usuario entrou.");
            return $usuario;
        }

        echo "O usuário ou a senha estão incorretos" .PHP_EOL;
        return false;

    }

    function cadastro(){

        $novoUsuario = readline("Digite o novo usuário: ");
        $novaSenha = readline("Digite a nova senha: ");
        //Essa função abaixo é usada pra colocar strings em um arquivo
        //(nome do arquivo; o que será escrito no arquivo)
        //o FILE_APPEND é para não sobrescrever o arquivo, ele vai escrever no arquivo já existente
        file_put_contents('usuarios.txt', '$novoUsuario:$novaSenha <br>', FILE_APPEND);
        logAlteracoes("O usuário $novoUsuario foi cadastrado.");
        echo "Usuário cadastrado";
    }


    //Código
    while(true){









    }