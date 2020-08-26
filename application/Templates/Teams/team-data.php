<?php $this->layout('partials/template', ['subTitle' => 'Criar Time']) ?>
<h1>Dados dos Times</h1>

<h1> Vincular Time Nas Tabelas</h1>

<form action="/vinculate-team-table" method="POST">
    <select name="teams" id="teams">
        <?php foreach($teams as $team) : ?>
        <option value="<?=$this->e($team->id)?>"><?=$this->e($team->name)?></option>
        <?php endforeach; ?>
    </select>

    <select name="tables" id="tables">
        <?php foreach($tables as $table) : ?>
        <option value="<?=$this->e($table->id)?>"><?=$this->e($table->name)?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="enviar">
</form>