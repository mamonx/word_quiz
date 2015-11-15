<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $errorMessage = '設問に答えてからアクセスしてください。';
    require '.error.php';
    exit;
}

require_once '.before.php';

$answers = isset($_POST['Answer']) ? $_POST['Answer'] : [];
$quiz->setAnswer($answers);

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
<?php if ($quiz->judge()): ?>
    <div class="row">
        <div class="col-md-12">
            <h2>回答結果</h2>
            <hr/>
        </div>
    </div>
    <!--  ここにスコア表示をいい感じにしといてくださいな (プログラムは作っといたから見た目よろ)  -->
    <div class="row">
        <?= $quiz->score()->comment() ?>
        <?= $quiz->score()->comparison() ?>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-bordered">
            <tbody>
            <?php $quiz->each(function($q) use ($answers){ ?>
            <?php /** @var \App\System\QuizEntity $q */ ?>
            <tr>
                <td>
                    <?= $q->getAnswer() === (int)$answers[$q->getId()] ?
                        '<span class="text-success">正解</span>' :
                        '<span class="text-danger">不正解</span>' ?>
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
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <?php foreach($quiz->errors() as $number => $error): ?>
                <p style="color: red">
                    問<?= $number ?>: <?= $error ?>
                </p>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
</div>
</body>
</html>