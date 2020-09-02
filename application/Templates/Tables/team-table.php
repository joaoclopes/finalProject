<?php $this->layout('partials/template', ['subTitle' => 'Tabelas e Times']) ?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

.verde {
    background-color: green;
}

.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>

<h1> Tabelas e times</h1>
        <h1>Time Tabela Pontos</h1>
        
<table>
  <tr>
    <th>Time</th>
    <th>Pontos</th>
    <th>Descrição</th>
  </tr>
  <?php foreach($tableAndTeams as $team) : ?>
  <tr class="<?php echo $team->points >= $team->pointstowin ? "verde" : ""; ?>">
    <td><?=$this->e($team->name)?></td>
    <td><?=$this->e($team->points)?></td>
    <td>
    <?=$this->e($team->description)?></td>
  </tr>
  <?php endforeach; ?>
</table>

<a href="/team-view" class="button button1">Voltar</a>


