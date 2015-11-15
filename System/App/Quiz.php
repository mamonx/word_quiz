<?php
namespace App\System;


class Quiz
{
    private $quizzes = [];
    private $errors = [];
    private $answers = [];

    /**
     * @param QuizEntity $quiz
     */
    public function add(QuizEntity $quiz)
    {
        if ($quiz->isEmpty()) {
            throw new \RuntimeException('Quiz is empty.');
        }
        $this->quizzes[$quiz->getId()] = $quiz;
    }

    /**
     * @param array $answer
     */
    public function setAnswer(array $answer)
    {
        $this->answers = $answer;
    }

    /**
     * @return bool
     */
    public function judge()
    {
        $this->each(function(QuizEntity $quiz) {
            $id = $quiz->getId();
            if (!array_key_exists($quiz->getId(), $this->answers)) {
                $this->errors[$id] = '選択してください。';
            }
        });

        return empty($this->errors);
    }

    /**
     * @return ScoreTable
     */
    public function score()
    {
        $score = 0;
        $this->each(function($q) use(&$score) {
            /** @var QuizEntity $q */
            if (!array_key_exists($q->getId(), $this->answers)) {
                throw new \RuntimeException('すべての設問に答えていません');
            }
            if ($q->getAnswer() === intval($this->answers[$q->getId()])) {
                $score++;
            }
        });
        return new ScoreTable($score, count($this->quizzes));
    }

    /**
     * @param integer|null $id
     * @return array|null
     */
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