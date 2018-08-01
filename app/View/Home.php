<?php 
$this->tituloPagina = "Home";
$this->layout('layout.cabecalho'); ?>
<div class="container">
    
    <div class="text-capitalize">
        
        <div class="col-md-3">
            <a href="/usuarios/adicionar">
                <img src="assets/img/user_icon.ico" class="img img-responsive" alt="Cadastrar Usuário" title="Cadastrar Usuário">
                <p class="text-center">Cadastrar Usuário</p>
            </a>
        </div>

        <div class="col-md-2">
            <br>
            <p>Usuários Cadastrados: <br><b><?=$this->dados["totalregistros"] ?></b></p>
            <p>Data dos Cadastros: <br><b><?=$this->dados["cadastradoshoje"]->created;?></b></p>
            <p>Últimos Cadastros: <br><b><?=$this->dados["cadastradoshoje"]->nome;?></p>
        </div>
        
        <?php
            
        ?>
        
        <div class="col-md-2"></div>
         
        <div class="col-md-3">
            <a href="/usuarios">
                <img src="assets/img/user-list.png" class="img img-responsive" alt="Listar Usuários" title="Listar Usuários">
                <p class="text-center">Listar Usuários</p>
            </a>
        </div>
        
        <div class="col-md-2"></div>
        
    </div>
    
</div>
<?php
    /*Incluir o Rodape*/ $this->layout('layout.rodape');?>