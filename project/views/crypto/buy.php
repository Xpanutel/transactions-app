<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/webroot/buy.css">
    <title>Document</title>
</head>
<body>
    
    <?php foreach ($cryptocurrencies as $cryptocurrency): ?>
        <form action="" method="POST" class="crypto-form">
            <h3><?= htmlspecialchars($cryptocurrency['fullname']) ?></h3>
            <input type="hidden" value="<?= htmlspecialchars($cryptocurrency['coin_id']) ?>" name="coin_id">
            <input type="number" name="quantity" placeholder="Введите количество" required>
            <div class="button-group">
                <button type="submit" name="transaction_type" value="buy" class="btn buy">Купить</button>
                <button type="submit" name="transaction_type" value="sell" class="btn sell">Продать</button>
            </div>
        </form>
    <?php endforeach; ?>
    
</body>
</html>