<?php $this->layout('partials/template', ['subTitle' => 'Tabelas']) ?>

<h1> Tabelas </h1>
<h1>Selecione a tabela</h1>
<?php foreach($teams as $team) : ?>
    <h1>
        <a href="/tables/<?=$this->e($team->id)?>">
            <?=$this->e($team->name)?>
        </a>
    </h1>
<?php endforeach; ?>
