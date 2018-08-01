<?php 
$this->tituloPagina = "Cadastrar Usuário";
$this->layout('layout.cabecalho'); ?>
<div class="container">
   
    <form action="/usuarios" method="POST">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cpf" placeholder="CPF">
        <input type="hidden" name="id_cpf">
        <input type="text" name="rg"  placeholder="RG">
        <input type="date" name="datadenascimento">
        <input type="number" name="sexo"  placeholder="Sexo">
        <input type="number" name="status"  placeholder="Sttatus 1 - 2">
        <input type="email" name="email"  placeholder="Email">
        <input type="password" name="senha">
        <label>Estado </label>
        <input type="text" name="estado" maxlength="2"  placeholder="Estado Sigla">
        <label> Cidade - ID Cidade </label>
        <input type="text" name="cidade"  placeholder="Cidade">
        <input type="number" name="id_cidade" placeholder="Id Cidade">
        <input type="text" name="cep"  placeholder="CEP">
        <input type="text" name="complemento"  placeholder="Complemento">
        <input type="text" name="endereco"  placeholder="Endereço">
        <input type="number" name="numero"  placeholder="Numero">
        <label>ID CIDADE</label>
        <input type="number" name="id_cidade"  placeholder="ID CIDADE">
        <input type="number" name="id_tipoendereco"  placeholder="TIPO ENDERECO">
        <input type="text" name="bairro"  placeholder="Bairro">
        <label>Telefone - Ramal - </label>
        <input type="text" name="telefone"  placeholder="(xx)3622-2222">
        <input type="text" name="celular"  placeholder="(xx)9 9999-9999">
        <input type="text" name="ramal"  placeholder="Ramal">
        
        
        <button>Salvar</button>
    </form>
    
</div>
<?php $this->layout('layout.rodape'); ?>