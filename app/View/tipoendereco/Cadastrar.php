<?php 
$this->tituloPagina = "Cadastrar Tipo Endereço";
$this->layout('layout.cabecalho'); ?>
<div class="container">
    
    <form method="post" class="form" novalidate action="/enderecos">
        
        <legend>Cadastro de Tipos de Endereço</legend>
        <div class="row">
            <input type="hidden" name="idtipoendereco" value="">
            <div class="col-md-4">
                <div class="control-group">
                    <label class="control-label">Tipo de Endereco</label>
                    <div class="controls">
                        <input type="hidden" name="idtipoendereco" value="">
                        <input type="text" name="descricao" id="descricao" class="form-control" required
                            data-validation-required-message="Informe uma Descrição para o Tipo">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <button class="btn  btn-warning pull-right">
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
</div>
<?php $this->layout('layout.rodape'); ?>