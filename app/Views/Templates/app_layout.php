<?= $this->include('Templates/dependencies') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<?= $this->renderSection('header') ?>
  <title>Dashboard BCN</title>
  <meta name="description" content="Dashboard monitoring kinerja pabrik gula">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="public/assets/favicon.ico"/>
</head>
<body class="antialiased" onLoad="defaultLoad();">
  <?= $this->renderSection('content') ?>
  <?= $this->renderSection('scripts') ?>
</body>
</html>
