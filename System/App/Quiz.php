<?php
namespace App\System;


class Quiz
{
    private $quizzes = [];
    private $errors = [];

    public function add(QuizEntity $quiz)
    {
        if ($quiz->isEmpty()) {
            throw new \RuntimeException('Quiz is empty.');
        }
        $this->quizzes[$quiz->getId()] = $quiz;
    }

    public function judge(array $answer)
    {
        $this->each(function(QuizEntity $quiz) use(&$answer) {
            $id = $quiz->getId();
            if (!array_key_exists($quiz->getId(), $answer)) {
                $this->errors[$id] = '選択してください。';
            }
        });

        return empty($this->errors);
    }

    public function errors($id = null)
    {
        if (!empty($id)) {
            return isset($this->errors[$id]) ?
                $this->errors[$id] : null;
        }
        return $this->errors;
    }

    public function each(\Closure $closure)
    {
        foreach ($this->quizzes as $quiz) {
            $closure($quiz);
        }
    }

}