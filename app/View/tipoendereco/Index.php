<?php 
$this->tituloPagina = "Tipos de Endereço";
$this->layout('layout.cabecalho'); ?>
<div class="container">
    <legend>Tipos de Endereço Cadastrados</legend>
    
    <a href="/enderecos/adicionar" class="btn btn-primary pull-right">Novo Cadastro</a>
    <div class="clearfix"></div>
    <div class="table-responsive ">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <td class="text-center">ID</td>
                    <td width="80%">Tipo de Endereço</td>
                    <td class="text-center" width="280em">Ação</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach( $this->dados as $tipo => $value ){ ?>
                    <tr>
                        <td class="text-center"><?= $value->idtipoendereco; ?></td>
                        <td><?= $value->descricao;?></td>
                        <td class="text-center">
                            <a href="/enderecos/editar/<?= $value->idtipoendereco; ?>" class="btn btn-primary">
                                <i class="glyphicon glyphicon-edit"></i> Editar 
                            </a>
                        </td>
                    </tr>
                <?php    
                    }
                ?>                
            </tbody>
        </table>
    </div>
</div>
<?php $this->layout('layout.rodape'); ?>