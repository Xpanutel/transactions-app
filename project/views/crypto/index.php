<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="">
        <select name="currency" id="currency">
            <?php foreach ($cryptocurrencies as $cryptocurrency): ?>
                <option value="<?php echo htmlspecialchars($cryptocurrency['coin_id']); ?>">
                        <?php echo htmlspecialchars($cryptocurrency['fullname']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Узнать цену</button>
    </form>

    <?php if ($price !== null): ?>
        <p>Выбранная валюта: <?php echo htmlspecialchars($currency);?></p>
        <p>Цена выбранной валюты: <?php echo htmlspecialchars($price); ?></p>
    <?php endif; ?>
    
</body>
</html>