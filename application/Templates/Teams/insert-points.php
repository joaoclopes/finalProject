<?php $this->layout('partials/template', ['subTitle' => 'Inserir Pontos']) ?>

<h1> Inserir Pontos</h1>
        <h1>Time Tabela Pontos</h1>
<form action="/add-points" method="POST">
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
    <input type="number" placeholder="Pontos" name="points">        
    <input type="submit" value="enviar">
</form>
