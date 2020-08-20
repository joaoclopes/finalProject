<?php $this->layout('partials/template', ['subTitle' => 'Inserir Time na Tabela']) ?>

<h1>Inserir Time na Tabela</h1>

<form action="/table-register" method="POST">
    <input type="text" placeholder="Nome do Time" name="teamName">
    <input type="text" placeholder="Nome da Tabela" name="tableName">
    <input type="submit" value="enviar">
</form>