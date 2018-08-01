<?php 
$this->tituloPagina = "Listar Usuários";
$this->layout('layout.cabecalho'); ?>
<div class="container">
    <div class="table-responsive ">
        <a href="/usuarios/adicionar" class="btn btn-primary pull-right">Novo Cadastro</a>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <td class="text-center" width="10em">ID</td>
                    <td width="400em">Nome</td>
                    <td width="200em" class="text-center">Data de Nascimento</td>
                    <td>Email</td>
                    <td width="3em">Status</td>
                    <td class="text-center" width="280em">Ações</td>
                </tr>
            </thead>
            <tbody>
                
                    
                    <tr>
                        <?php
                        foreach ($this->users as $key => $value) { ?>
                        <td><?=$value->idcpf;?></td>
                        <td><?=$value->nome;?></td>
                        <td><?=$value->datadenascimento;?></td>
                        <td><?=$value->email;?></td>
                        <td><?=$value->descricao;?></td>
                       
                        <td>
                            <div class="col-md-4">
                                <a href="/usuarios/editar/<?=$value->idcpf;?>" class="btn btn-primary" title="Editar" alt="Editar">
                                    <i class="glyphicon glyphicon-edit"></i> Editar 
                                </a>
                                
                            </div>

                            <div class="col-md-4">
                                <a href="/usuarios/deletar/<?=$value->idcpf;?>" class="btn btn-danger" title="Deletar" alt="Deletar">
                                    <i class="glyphicon glyphicon-erase"></i> Excluir 
                                </a>
                            </div>
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