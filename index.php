<?php require __DIR__ . '/.before.php' ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <title>単語クイズ</title>
</head>
<body>
<form action="result.php" method="post">
    <?php $quiz->each(function($q) { ?>
    <?php /** @var \App\System\QuizEntity $q */ ?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tbody>
            <tr>
                <th><?= $q->getSubject() ?></th>
                <td>
                    <?php foreach($q->getChoices() as $choiceId => $choice): ?>
                        <p class="text-center">
                            <input type="radio" name="Answer[<?= $q->getId() ?>]" value="<?= $choiceId ?>" >
                            <?= htmlspecialchars($choice) ?>
                        </p>
                    <?php endforeach ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
    <?php }); ?>
    <p align="center">
        <input type="submit" value="送信する">
    </p>
<!-- ここに頑張って あの単語クイズに似た HTMLを記述してください -->
<form action="result.php" method="post">
    <br>
    <?php $quiz->each(function($q) { ?>
    <?php /** @var \App\System\QuizEntity $q */ ?>
        <table align="center" border  Width="300">
            <tr>
                <td width="30%" Align="left"><?= $q->getSubject() ?></td>
                <td width="70%" Align="center">
                    <?php foreach($q->getChoices() as $choiceId => $choice): ?>
                        <p>
                            <input type="radio" name="Answer[<?= $q->getId() ?>]" value="<?= $choiceId ?>" >
                            <?= htmlspecialchars($choice) ?>
                        </p>
                    <?php endforeach ?>
                </td>
            </tr>
        </table>
    <?php }); ?>
    <p align="center">
        <input type="submit" value="送信する">
    </p>
</form>
</body>
</html>