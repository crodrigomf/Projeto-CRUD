<?php 
	include 'init.php';

if (!is_logged()) {
	header('location: index.php');
	exit();
}

$stmt = $pdo->query('select * from titulo');
$titulo = $stmt->fetchAll();

$stmt = $pdo->prepare('select * from livros where user_id = ?'); 
$stmt ->execute([$_SESSION['user_id']]);
$livros = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/style.css">

	<title><?= APP_NAME?></title>
</head>
<body>
<h1>Bem vindo <?= $_SESSION['username'] ?> a seu acervo de livros</h1>
<a href="/auth/logout.php" class="btn">Sair</a>	

<h2>Acervo</h2>
<ul class="titulo">
	<?php foreach ($titulo as $serie): ?>
		<li> <?= $serie['serie'] ?>  - <a href="/titulo/delete.php?id=<?= $serie['id'] ?>">remover</a></li>
	<?php endforeach ?>
	<li>
		<form action="/titulo/save.php" method="POST">
			<input type ="text" name="serie" placeholder="Genero do Livro">
			 <input type ="submit">
		</form>
	</li>
</ul>

<table>
	<tr>
		<th><h2> Nome </h2></th>
		<th><h2> do Livro </h2></th>
		<th></th>
	<?php foreach ($livros as $livro): ?>
		<tr>
			<td><?= $livro['nome'] ?></td>
			<td><?= $livro['serie_id'] ?></td>
			<td>
				<a href="/livros/delete.php?id=<?= $livro['id'] ?>">remover</a></td>
		</tr>
		<?php endforeach ?>
	
</table>

<form action="/livros/save.php" method="POST">
	<input type="text" name="nome" placeholder="nome">
	<select name="serie_id">
		<?php foreach ($titulo as $serie): ?>
			<option value="<?= $serie['id'] ?>"><?= $serie['serie'] ?></option>
		<?php endforeach ?>
	</select>
	<input type ="submit">
</form>


<script>
	let links = document.querySelectorAll('.titulo > li > a');
	for (link of links) {
		link.addEventListener('click', e => {
			if(!confirm('quer mesmo remover?')){
				e.preventDefault();
			}
		})
	}
</script>
.
</body>
</html>