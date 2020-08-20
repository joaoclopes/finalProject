<?php $this->layout('partials/template', ['subTitle' => 'Criar Tabela']) ?>

<h1>Criar Tabela</h1>

<form action="/table-register" method="POST">
    <input type="text" placeholder="Nome do Time" name="tableName">
    <input type="text" placeholder="Jogador 1" name="tablePrize">
    <input type="text" placeholder="Jogador 2" name="tablePointsToWin">
    <input type="text" placeholder="Jogador 2" name="tableDescription">
    <input type="submit" value="enviar">
</form>