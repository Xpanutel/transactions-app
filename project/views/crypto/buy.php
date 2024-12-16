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
            <input type="text" value="<?= $cryptocurrency['coin_id']?>" name="coin_id">
            <input type="number" name="quantity" placeholder="Введите значение">
            <button name="transaction_type" placeholder="Купить" value="buy">Купить</button>
            <button name="transaction_type" placeholder="Продать" value="sell">Продать</button>
        </form>
    <?php endforeach; ?>
    
</body>
</html>