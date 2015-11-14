<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>エラー</title>
</head>
<body>
<?php if (isset($errorMessage)): ?>
    <p><?= $errorMessage ?></p>
<?php endif ?>
</body>
</html>