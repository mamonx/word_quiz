<?php

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
