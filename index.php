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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>単語クイズ</h2>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="result.php" method="post">

                <table class="table table-bordered">
                    <tbody>
                    <?php $quiz->each(function($q) { ?>
                    <?php /** @var \App\System\QuizEntity $q */ ?>
                    <tr>
                        <th style="vertical-align: middle"><?= $q->getSubject() ?></th>
                        <td style="padding-top: 20px;text-indent: 1em">
                            <?php foreach($q->getChoices() as $choiceId => $choice): ?>
                                <p class="text-left">
                                    <input type="radio" name="Answer[<?= $q->getId() ?>]" value="<?= $choiceId ?>" >
                                    <?= htmlspecialchars($choice) ?>
                                </p>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <?php }); ?>
                    </tbody>
                </table>
                <p class="text-center">
                    <input class="btn btn-lg btn-primary" type="submit" value="送信する"/>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>