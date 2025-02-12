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

    //Função de cadastro
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

    function venda(){

        $produto = readline("Qual o produto ? ".PHP_EOL);
        $valor = readline("Qual o valor ? R$" .PHP_EOL);
        //Colocando no log 
        logAlteracoes("$produto foi vendido no valor de R$$valor");
        return $valor;

    }

    function logAlteracoes(){

        if(file_exists('log.txt')){
            //O file_get_contents é uma função para pegar as strings de um arquivo, contrario do file_put_contents
            file_get_contents('log.txt', false);
        }else{
            echo "O arquivo de log não foi encontrado".PHP_EOL;
        }

    }

    

    //Código

    $usuarioLogado = false;

    while(true){
        if($usuarioLogado === false){
  
            echo "[1] - Logar [2] - Sair" .PHP_EOL;
            echo "Escolha uma opção: " .PHP_EOL;
            $escolha = (int)readline();

            if($escolha === 1){
                $usuarioLogado = login();
            }elseif($escolha === 2){
                echo "Você escolheu sair!" .PHP_EOL;
                break;
            }else{
                echo "Você precisa escolher entre 1 ou 2" .PHP_EOL;                
            }

        }else{
            

            echo "O que você quer fazer ?
            [1] - Vender
            [2] - Cadastrar
            [3] - Log
            [4] - Deslogar" .PHP_EOL;
            $escolha = readline();

            

            
        }
    }