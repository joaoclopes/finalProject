<?php $this->layout('partials/template', ['subTitle' => 'Criar Time']) ?>

<h1>Criar Time</h1>

<form action="/team-register" method="POST">
    <input type="text" placeholder="Nome do Time" name="teamName">
    <input type="text" placeholder="Jogador 1" name="playerOne">
    <input type="text" placeholder="Jogador 2" name="playerTwo">
    <input type="submit" value="enviar">
</form>