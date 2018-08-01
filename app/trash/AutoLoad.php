<?php
/**
    Este arquivo é responsavel por realizar o carregamento das classes quando
    instanciadas dentro de alguma outra classe
 */
spl_autoload_register( function(){
    //Controllers
    require_once "../controllers/SituacaoController.php";
    require_once "../controllers/TipoSexoController.php";
    require_once "../controllers/PessoaController.php";
    require_once "../controllers/EnderecoController.php";
    require_once "../controllers/EstadoController.php";
    require_once "../controllers/CidadeController.php";
    require_once "../controllers/TelefoneController.php";
    require_once "../controllers/UsuarioController.php";
    require_once "../controllers/TipoEnderecoController.php";
    
    //Models
    require_once "../models/Cidade.php";
    require_once "../models/Endereco.php";
    require_once "../models/Estado.php";
    require_once "../models/Model.php";
    require_once "../models/Situacao.php";
    require_once "../models/Telefone.php";
    require_once "../models/TipoEndereco.php";
    require_once "../models/TipoSexo.php";
    require_once "../models/TipoTelefone.php";
    require_once "../models/Uf.php";
    require_once "../models/Usuario.php";
});