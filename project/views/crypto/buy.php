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
            <input type="button" name="transaction_type" placeholder="Купить" value="buy">
            <input type="button" name="transaction_type" placeholder="Продать" value="sell">
            <button name="transaction_type" placeholder="Купить" value="buy">Купить</button>
        </form>
    <?php endforeach; ?>
    
</body>
</html>