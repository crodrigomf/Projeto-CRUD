<?php 
	include 'init.php';

if (!is_logged()) {
	header('location: index.php');
	exit();
}

$stmt = $pdo->query('select * from series');
$series = $stmt->fetchAll();

//$sql = "
//	select
//		funkos.id,
//		funkos.nome,
//		series.series
//	from funkos
//		left join series on series.id = funkos.serie_id
//	where user_id = ?
//	"
//$stmt = $pdo->prepare($sql);

$stmt = $pdo->prepare('select * from funkos where user_id = ?'); 
$stmt ->execute([$_SESSION['user_id']]);
$funkos = $stmt->fetchAll();

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
<h1>Bem vindo <?= $_SESSION['username'] ?></h1>
<a href="/auth/logout.php" class="btn">Sair</a>	

<h2>Séries</h2>
<ul class="series">
	<?php foreach ($series as $serie): ?>
		<li> <?= $serie['serie'] ?>  - <a href="/series/delete.php?id=<?= $serie['id'] ?>">remover</a></li>
	<?php endforeach ?>
	<li>
		<form action="/series/save.php" method="POST">
			<input type ="text" name="serie" placeholder="serie">
			 <input type ="submit">
		</form>
	</li>
</ul>

<table>
	<tr>
		<th> Nome </th>
		<th> Serie</th>
		<th></th>
	<?php foreach ($funkos as $funko): ?>
		<tr>
			<td><?= $funko['nome'] ?></td>
			<td><?= $funko['serie_id'] ?></td>
			<td>
				<a href="/funko/delete.php?id=<?= $funko['id'] ?>">remover</a></td>
		</tr>
		<?php endforeach ?>
	
</table>

<form action="/funkos/save.php" method="POST">
	<input type="text" name="nome" placeholder="nome">
	<select name="select_id">
		<?php foreach ($series as $serie): ?>
			<option value="<?= $serie['id'] ?>"><?= $serie['serie'] ?></option>
		<?php endforeach ?>
	</select>
	<input type ="submit">
</form>


<script>
	let links = document.querySelectorAll('.series > li > a');
	for (link of links) {
		link.addEventListener('click', e => {
			if(!confirm('quer mesmo remover?')){
				e.preventDefault();
			}
		})
	}
</script>

</body>
</html>