<?php $this->layout('partials/template', ['subTitle' => 'Inserir Time na Tabela']) ?>

<h1>Inserir Time na Tabela</h1>

<form action="/table-register" method="POST">
    <option value="teamName"></option>
    <option value="tableName"></option>
    <input type="submit" value="enviar">
</form>