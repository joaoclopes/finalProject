<?php $this->layout('partials/template', ['subTitle' => 'Criar Tabela']) ?>

<h1>Criar Tabela</h1>

<form action="/table-register" method="POST">
    <input type="text" placeholder="Nome do Tabela" name="tableName">
    <input type="text" placeholder="Prize" name="tablePrize">
    <input type="text" placeholder="Pontos" name="tablePointsToWin">
    <input type="text" placeholder="Descrição" name="tableDescription">
    <input type="submit" value="enviar">
</form>