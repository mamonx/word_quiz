<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $errorMessage = '設問に答えてからアクセスしてください。';
    require $errorMessage;
    exit;
}

require_once '.before.php';

$answers = isset($_POST['Answer']) ? $_POST['Answer'] : [];

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>回答結果</title>
</head>
<body>
<?php if ($quiz->judge($answers)): ?>
    <?php $quiz->each(function($q) use ($answers){ ?>
        <?php /** @var \App\System\QuizEntity $q */ ?>
        <table align="center" border  Width="300">
            <tr>
                <td width="10%" align="center">
                    <?= $q->getAnswer() === (int)$answers[$q->getId()] ? '正解' : '不正解' ?>
                </td>
                <td width="30%" align="left">
                    <?= $q->getSubject() ?>
                </td>
                <td width="60%" align="center">
                    <?= $q->getChoice($q->getAnswer()) ?>
                </td>
            </tr>
        </table>
    <?php }); ?>
<?php else: ?>
    <?php foreach($quiz->errors() as $number => $error): ?>
        <p style="color: red">
            問<?= $number ?>: <?= $error ?>
        </p>
    <?php endforeach ?>
<?php endif ?>
</body>
</html>