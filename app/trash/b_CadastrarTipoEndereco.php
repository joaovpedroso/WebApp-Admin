<?php   
namespace App\View;

include "Menu.php";
use App\Controllers\TipoEnderecoController;
use App\Helpers\Util;
use App\Config\Conecta;



    $tipoendereco = new TipoEnderecoController();
    
    if( isset( $_POST["update"] ) ){
        $idtipoendereco = Util::getParameter('id_tipoendereco');
        $descricao = $tipoendereco->getOne($idtipoendereco)->descricao;
        
    }else {
        $idtipoendereco = $descricao= "";
    }
?>
<div class="container">
    
    <form method="post" class="form" novalidate action="../controllers/TipoEnderecoController.php">
        
        <legend>Cadastro de Tipos de Endereço</legend>
        <div class="row">
            <input type="hidden" name="idtipoendereco" value="<?=$idtipoendereco;?>">
            <div class="col-md-4">
                <div class="control-group">
                    <label class="control-label">Tipo de Endereco</label>
                    <div class="controls">
                        <input type="text" name="descricao" id="descricao" class="form-control" value="<?=$descricao;?>" required
                            data-validation-required-message="Informe uma Descrição para o Tipo">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <button type="submit" name="salvar_tipo" class="btn  btn-warning pull-right">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                        Salvar 
                </button>
                <button type="reset" class="btn btn-danger pull-right">
                    <i class="glyphicon glyphicon-erase"></i>
                     Limpar
                </button>
            </div> 
        </div>
    </form>

    <hr>
    <legend>Tipos de Endereço Cadastrados</legend>
    <div class="table-responsive ">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td class="text-center">ID</td>
                    <td width="80%">Tipo de Endereço</td>
                    <td class="text-center" width="280em">Ação</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tipoendereco = $tipoendereco->getAll("tipoendereco");
                    foreach( $tipoendereco as $tipo => $value ){ ?>
                    <tr>
                        <td class="text-center"><?= $value->idtipoendereco; ?></td>
                        <td><?= $value->descricao;?></td>
                        <td class="text-center">
                            <form method="post">
                                <input type="hidden" name="id_tipoendereco" value="<?=$value->idtipoendereco;?>">
                                <button type="submit" name="update" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-edit"></i> Editar 
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php    
                    }
                ?>                
            </tbody>
        </table>
    </div>
</div>