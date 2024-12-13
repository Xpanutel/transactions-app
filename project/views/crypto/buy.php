<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php foreach ($cryptocurrencies as $cryptocurrency): ?>
        <form action="" method="POST">
            <h3><?= $cryptocurrency['fullname']?></h3>
            <input type="hidden" value="<?= $cryptocurrency['coin_id']?>" name="coin_id">
            <input type="text" name="quantity" placeholder="Введите значение">
            <button>Купить</button>
        </form>
    <?php endforeach; ?>

    <button type="submit">Узнать цену</button>

    <?php if ($price !== null): ?>
        <p>Выбранная валюта: <?php echo htmlspecialchars($currency);?></p>
        <p>Цена выбранной валюты: <?php echo htmlspecialchars($price); ?></p>
    <?php endif; ?>
    
</body>
</html>