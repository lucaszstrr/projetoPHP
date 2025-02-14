<?php 

    //Para o horário ficar certo
    date_default_timezone_set("America/Sao_Paulo");

    //Array dos usuários cadastrados
    $usuarios = [
        "Lucas" => "123",
    ];

    //Função de login
    function login(){

        global $usuario;
        global $usuarios;

        echo "Usuário: " .PHP_EOL;
        $usuario = readline();
        echo "Senha: " .PHP_EOL;
        $senha = readline();

        if(array_key_exists($usuario, $usuarios)){

            if ($usuarios[$usuario] === $senha){
                logAlteracoes("O usuário $usuario entrou \n");
                return $usuario;
            }else{
                echo "Senha incorreta, tente novamente" .PHP_EOL;
                login();
            }

        }else{

            echo "Usuário não encontrado, tente novamente" .PHP_EOL;
            login();

        }

        return false;

    }
    
    //Função de cadastro
    function cadastro(){

        global $usuarios;

        $novoUsuario = readline("Digite o novo usuário: ");
        $novaSenha = readline("Digite a nova senha: ");
        
        //Verifiquei se o array está funcionando com o comando abaixo
        //print_r($logins);
        
        if (array_key_exists($novoUsuario, $usuarios)) {
            echo "Esse usuário já foi cadastrado" . PHP_EOL;
        } else {
            $usuarios[$novoUsuario] = $novaSenha; // Adiciona o novo usuário ao array
            logAlteracoes("O usuário $novoUsuario foi cadastrado \n");
            echo "Usuário cadastrado com sucesso!" . PHP_EOL;
        }
    }

    //Função de venda
    function venda($mensagem){

        global $mensagem;

        $produto = readline("Qual o produto ? ".PHP_EOL);
        $valor = readline("Qual o valor ? R$" .PHP_EOL);
        //Colocando no log
        //Essa função abaixo é usada pra colocar strings em um arquivo
        //file_put_contents(nome do arquivo; o que será escrito no arquivo, FILE_APPEND)
        //o FILE_APPEND é para não sobrescrever o arquivo, ele vai escrever no arquivo já existente 
        file_put_contents('log.txt', "$mensagem", FILE_APPEND);
        logAlteracoes("$produto foi vendido no valor de R$$valor \n");
        return $valor;
        return $produto;

    }

    //Função do log
    function logAlteracoes($mensagem){

        $data = date('d/m/Y H:i:s');
        file_put_contents('log.txt', "[$data] - $mensagem",  FILE_APPEND);

    }

    //Função de ver log 
    function verLog(){

        if(file_exists('log.txt')){
            //O file_get_contents é uma função para pegar as strings de um arquivo, contrario do file_put_contents
            $pegar = file_get_contents('log.txt');
            echo $pegar .PHP_EOL;
        }else{
            echo "O arquivo de log não foi encontrado".PHP_EOL;
        }
        

    }

    //CÓDIGO ---------------------------------------------------------------------------------------------------

    $chaveExiste = true;
    $mensagemT = true;
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
            $usuarioLogado = true;

        }else{
            
            echo "O que você quer fazer ?
            [1] - Vender
            [2] - Cadastrar
            [3] - Log
            [4] - Deslogar" .PHP_EOL;
            $escolha = (int)readline();

            if($escolha === 1){
                venda($mensagemT);
            }elseif($escolha === 2){
                cadastro();
            }elseif($escolha === 3){
                verLog();
            }elseif($escolha === 4){

                global $mensagem;

                file_put_contents('log.txt', "$mensagem", FILE_APPEND);
                logAlteracoes("$usuario deslogou do sistema \n");

                echo "Saindo......." .PHP_EOL;
                echo "O que você quer fazer agora ?" .PHP_EOL;
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
                echo "Você precisa escolher entre 1 a 4" .PHP_EOL;
            }

            $usuarioLogado = true;

        }
     
    }
    

    