<?php 

    function login(){

        echo "Usuário: " .PHP_EOL;
        $usuario = readline();
        echo "Senha: " .PHP_EOL;
        $senha = readline();

        if($usuario === 'lucas' && $senha === '123'){
            logAlteracao("O usuário $usuario entrou.");
            return $usuario;
        }

        echo "O usuário ou a senha estão incorretos" .PHP_EOL;
        return false;

    }


    //Código
    while(true){









    }