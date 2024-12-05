<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Криптовалютный калькулятор</title>
</head>
<body>
    <h1>Выберите криптовалюту для получения цены</h1>
    <form method="POST">
        <label for="currency">Криптовалюта:</label>
        <select name="currency" id="currency">
            <?php foreach ($cryptocurrencies as $key => $value): ?>
                <option value="<?php echo htmlspecialchars($key); ?>"><?php echo htmlspecialchars($value); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Получить цену</button>
    </form>

    <?php if ($price !== null): ?>
        <h2>Текущая цена: <?php echo htmlspecialchars($price); ?> USD</h2>
    <?php endif; ?>
</body>
</html>
