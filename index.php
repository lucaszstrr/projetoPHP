<?php 

    //Para o horário ficar certo
    date_default_timezone_set("America/Sao_Paulo");

    //Função de login
    function login(){

        global $usuario;

        echo "Usuário: " .PHP_EOL;
        $usuario = readline();
        echo "Senha: " .PHP_EOL;
        $senha = readline();

        if($usuario === 'Lucas' && $senha === '123'){   
            logAlteracoes("O usuário $usuario entrou \n");

            return $usuario;
        }else{

            echo "Usuário não encontrado, tente novamente" .PHP_EOL;
            login();

        }

    }
    
    //Função de cadastro
    function cadastro(){

        global $novoUsuario;
        global $novaSenha;
        global $logins;   

        $novoUsuario = readline("Digite o novo usuário: ");
        $novaSenha = readline("Digite a nova senha: ");
        $logins = ['login' => $novoUsuario, 'senha' => $novaSenha];
        //Verifiquei se o array está funcionando com o comando abaixo
        //print_r($logins);
        
        logAlteracoes("O usuário $novoUsuario foi cadastrado \n");
        echo "Usuário cadastrado" .PHP_EOL;

    }

    function login2($logins){

        global $usuario;
        global $novoUsuario;
        global $novaSenha;
        global $chaveExiste;
        global $logins;

        echo "Usuário: " .PHP_EOL;
        $novoUsuario = readline();
        echo "Senha: " .PHP_EOL;
        $novaSenha = readline();

        print_r($logins);

        $chaveExiste = array_key_exists($novoUsuario, $logins);

        if($chaveExiste === true){

            if($novoUsuario && $novaSenha){

                echo "Usuário logado" .PHP_EOL;
                logAlteracoes("O usuário $novoUsuario entrou \n");
                return $usuario;

            }else{

                echo "Usuário não encontrado" .PHP_EOL;
                login2($logins);

            }

            //echo "A chave existe e tem o valor $logins[login]" .PHP_EOL;
            
        }else{

            echo "Seu login e/ou senha estão incorretos" .PHP_EOL;
            login2($logins);

        }
/*        
        if($logins['login'] === $logins['senha']){
            echo "Usuário logado" .PHP_EOL;
            return $usuario;
        }else{

            echo "O usuário ou a senha estão incorretos" .PHP_EOL;
            login($novoUsuario, $novaSenha);

        }

*/
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
                $usuarioLogado = venda($mensagemT);
            }elseif($escolha === 2){
                $usuarioLogado = cadastro();
            }elseif($escolha === 3){
                $usuarioLogado = verLog();
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
                    $usuarioLogado = login2($logins);
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
    

    