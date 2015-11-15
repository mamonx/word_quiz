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
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min.js"></script>
    <title>回答結果</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>回答結果</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-bordered">
            <tbody>
            <?php if ($quiz->judge($answers)): ?>
            <?php $quiz->each(function($q) use ($answers){ ?>
            <?php /** @var \App\System\QuizEntity $q */ ?>
            <tr>
                <td>
                    <?= $q->getAnswer() === (int)$answers[$q->getId()] ? '正解' : '不正解' ?>
                </td>
                <th>
                    <?= $q->getSubject() ?>
                </th>
                <td>
                    <?= $q->getChoice($q->getAnswer()) ?>
                </td>
            </tr>
            <?php }); ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php else: ?>
    <?php foreach($quiz->errors() as $number => $error): ?>
        <p style="color: red">
            問<?= $number ?>: <?= $error ?>
        </p>
    <?php endforeach ?>
<?php endif ?>
</body>
</html>