<?php 
$this->tituloPagina = "Editar Tipo Endereço";
$this->layout('layout.cabecalho'); ?>
<div class="container">
    
    <form method="post" class="form" action="/enderecos">
        
        <legend>Editar Tipo de Endereço</legend>
        <div class="row">
            
            <div class="col-md-4">
                <div class="control-group">
                    <label class="control-label">Tipo de Endereco</label>
                    <div class="controls">
                        <input type="hidden" name="idtipoendereco" value="<?=$this->dados["tipoendereco"]->idtipoendereco;?>" readonly>
                        <input type="text" name="descricao" id="descricao" class="form-control" value="<?=$this->dados["tipoendereco"]->descricao;?>" required
                            data-validation-required-message="Informe uma Descrição para o Tipo">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <button class="btn  btn-warning">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                        Salvar 
                </button>
            </div> 
        </div>
    </form>
</div>
<?php $this->layout('layout.rodape'); ?>