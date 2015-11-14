<?php
$config = [];
require_once __DIR__ . '/System/Config/questions.php';
require_once __DIR__ . '/System/App/Quiz.php';
require_once __DIR__ . '/System/App/QuizEntity.php';

$quiz = new \App\System\Quiz();

foreach ($config['questions'] as $id => $question) {
    $entity = new \App\System\QuizEntity();
    $entity->setId($id)
        ->setSubject($question['subject'])
        ->setChoice($question['choice'])
        ->setAnswer($question['answer']);
    $quiz->add($entity);
}

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>単語クイズ</title>
</head>
<body>
<!-- ここに頑張って あの単語クイズに似た HTMLを記述してください -->
<form action="result.php" method="post">
    <br>
    <?php $quiz->each(function($q) { ?>
    <?php /** @var \App\System\QuizEntity $q */ ?>
        <table align="center" border  Width="300">
            <tr>
                <td width="30%" Align="left"><?= $q->getSubject() ?></td>
                <td width="70%" Align="center">
                    <?php foreach($q->getChoice() as $choiceId => $choice): ?>
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