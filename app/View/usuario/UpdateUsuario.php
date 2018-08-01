<?php
use App\Controllers\TipoSexoController;
use App\Controllers\TipoEnderecoController;
use App\Controllers\SituacaoController;

$this->tituloPagina = "Editar Usuário";
$this->layout('layout.cabecalho'); 
?>

<div class="container">
    
    <form method="post" class="form" novalidate action="/usuarios">
        
        <legend>Alteração de Dados</legend>
        
        <div class="control-group text-center">
            <label class="control-label">ID Usuário</label>
            <input type="text" name="idcpf" class="form-control text-center" value="<?=$this->dados["pessoa"]->idcpf;?>" readonly>
        </div>
        
        <div class="control-group">
           <label class="control-label">Nome</label>
           <div class="controls">
               <input type="text" name="nome" class="form-control" value="<?=$this->dados["pessoa"]->nome;?>" placeholder="Informe Seu Nome" required
                   data-validation-required-message="Informe seu Nome">
           </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="email" name="email" id="email" class="form-control" value="<?=$this->dados["usuario"]->email;?>"  placeholder="exemplo@exemplo.com" required
                               data-validation-email-message="Email Incorreto"
                               data-validation-required-message="Informe seu Email">
                    </div>
                </div>
            </div>    

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input type="hidden" name="senha_a" value="<?=$this->dados["usuario"]->senha;?>">
                        <input type="password" name="senha" id="senha" class="form-control" 
                        maxlength="12"
                        data-validation-maxlength-message="Máximo 12 Caracteres">
                    </div>
                </div>
            </div>  

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Re-Digite a Senha</label>
                    <div class="controls">
                        <input type="password" name="senha" class="form-control"
                               maxlength="12"
                               data-validation-maxlength-message="Máximo 12 Caracteres" 
                               data-validation-match-match="senha"
                               data-validation-match-message="As senhas Digitadas São Diferentes">
                    </div>
                </div>
            </div>  

        </div><!-- Final ROW -->

        <div class="row">
            <div class="col-md-6">
                <div class="control-group">
                    <label class="control-label">CPF</label>
                    <div class="controls">
                        <input type="text" name="cpf" id="cpf" class="form-control" value="<?=$this->dados["pessoa"]->cpf;?>" required
                               data-validation-required-message="Informe seu CPF" maxlength="14"
                               data-validation-maxlength-message="Informe no Máximo 11 Caracteres" readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="control-group">
                    <label class="control-label">RG</label>
                    <div class="controls">
                        <input type="text" name="rg" class="form-control" value="<?=$this->dados["pessoa"]->rg;?>"  required
                            data-validation-required-message="Informe seu RG">
                    </div>
                </div>
            </div>

        </div><!-- Final ROW -->

        <div class="row">
            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Data de Nascimento</label>
                    <div class="controls">
                        <input type="date" name="datadenascimento" id="datadenascimento" class="form-control" value="<?=$this->dados["pessoa"]->datadenascimento;?>"  onblur="validarData(this.value)" required
                            data-validation-required-message="Informe sua Data de Nascimento">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" required
                            data-validation-required-message="Selecione">
                        <option value="">Selecione</option>
                        <?php
                            $tiposexo = new TipoSexoController();
                            $dados = $tiposexo->getAll();
                            //SELECIONAR OPÇÔES DO BANCO DE DADOS
                            foreach( $dados as $dado){
                                echo "<option value=".$dado->idtiposexo.">$dado->descricao</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div><!-- Final ROW -->
        
        <div class="row">

            <div class="col-md-2">
                <div class="control-group">
                    <label class="control-label">CEP</label>
                    <div class="controls">
                        <input type="text" name="cep" id="cep" class="form-control" value="<?=$this->dados["endereco"]->cep;?>"  onblur="buscarCep(this.value)" required
                            data-validation-required-message="Informe seu CEP">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="control-group">
                    <label class="control-label">Endereço</label>
                    <div class="controls">
                        <input type="text" name="endereco" id="endereco" class="form-control" value="<?=$this->dados["endereco"]->endereco;?>"  required
                            data-validation-required-message="Informe seu Endereço">
                    </div>
                </div>
            </div>
             
            <div class="col-md-2">
                <div class="control-group">
                    <label class="control-label">Tipo de Endereço</label>
                    <select name="id_tipoendereco" id="id_tipoendereco" class="form-control" required
                            data-validation-required-message="Selecione">
                        <option value="">Selecione</option>
                        <?php
                            $tipoendereco = new TipoEnderecoController();
                            //SELECIONAR OPÇÔES DO BANCO DE DADOS na função GetALL da classe MODEL
                            $dados = $tipoendereco->getAll();
                            
                            foreach( $dados as $dado){
                                echo "<option value=".$dado->idtipoendereco.">$dado->descricao</option>";
                            }

                        ?>
                    </select>
                </div>
            </div>
            
            <div class="col-md-2">
                 <div class="control-group">
                    <label class="control-label">Numero</label>
                    <div class="controls">
                        <input type="text" name="numero" id="numero" class="form-control" value="<?=$this->dados["endereco"]->numero;?>"  required
                            data-validation-required-message="Informe o Numero">
                    </div>
                </div>
            </div>

        </div><!-- Final ROW -->

        <div class="row">
            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Bairro</label>
                    <div class="controls">
                        <input type="text" name="bairro" id="bairro" class="form-control" value="<?=$this->dados["endereco"]->bairro;?>" readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Complemento</label>
                    <div class="controls">
                        <input type="text" name="complemento" id="complemento" class="form-control" value="<?=$this->dados["endereco"]->complemento;?>"  placeholder="Ponto de Referencia">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control" value="<?=$this->dados["estado"]->estado;?>"  readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <label class="control-label">Cidade</label>
                    <div class="controls">
                        <input type="text" name="cidade" id="cidade" class="form-control" value="<?=$this->dados["cidade"]->cidade;?>"  readonly>
                        <input type="hidden" name="id_cidade" id="id_cidade" value="<?=$this->dados["cidade"]->idcidade;?>" class="form-control">
                    </div>
                </div>
            </div>
        </div><!-- Final ROW -->

        <div class="row">

            <div class="col-md-2">
                <div class="control-group">
                    <label class="control-label">Telefone</label>
                    <div class="controls">
                        <input type="text" name="telefone" id="telefone" class="form-control" value="<?='('.$this->dados["telefone"]->ddd.')'.$this->dados["telefone"]->telefone;?>"  required 
                               data-validation-required-message="Informe seu Telefone">
                    </div>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="control-group">
                    <label class="control-label">Ramal</label>
                    <div class="controls">
                        <input type="text" name="ramal" id="ramal" class="form-control" value="<?=$this->dados["telefone"]->ramal;?>"  placeholder="Ramal">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="control-group">
                    <label class="control-label">Celular</label>
                    <div class="controls">
                        <input type="text" name="celular" id="celular" class="form-control" value="<?='('.$this->dados["celular"]->ddd.')'.$this->dados["celular"]->telefone;?>" required 
                               data-validation-required-message="Informe seu Celular">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <select name="status" id="status" class="form-control" required
                            data-validation-required-message="Selecione">
                        <option value="">Selecione</option>
                        <?php
                            $situacao = new SituacaoController();
                            //SELECIONAR OPÇÔES DO BANCO DE DADOS e marcar a que retornar no JS
                            $status = $situacao->getAll();
                            foreach( $status as $st){
                                echo "<option value=".$st->idsituacao.">$st->descricao</option>";
                            }

                        ?>
                    </select>
                </div>
            </div>
        </div><!-- Final ROW -->
        <br>
        <button type="submit" name="updateform" class="btn btn-warning pull-right">
            <i class="glyphicon glyphicon-floppy-save"></i>
                Salvar 
        </button>
        <button type="reset" class="btn btn-danger pull-right">
            <i class="glyphicon glyphicon-erase"></i>
             Limpar
        </button>
    </form>
</div>
<script type="text/javascript">
    //Script q vai preencher os campos de SELECT quando for editar
    $("#sexo").val('<?=$this->dados["pessoa"]->idtiposexo;?>');
    $("#id_tipoendereco").val('<?=$this->dados["endereco"]->idtipoendereco;?>');
    $("#status").val('<?=$this->dados["pessoa"]->idsituacao;?>');
</script>
<?php $this->layout('layout.rodape'); ?>