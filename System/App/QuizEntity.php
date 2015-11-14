<?php
/**
 * Created by PhpStorm.
 * User: noguhiro
 * Date: 15/11/15
 * Time: 1:07
 */

namespace App\System;


class QuizEntity
{
    private $id;
    private $subject;
    private $answer;
    private $choice;

    public function getId()
    {
        return $this->id;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function getChoices()
    {
        return $this->choice;
    }

    public function getChoice($number)
    {
        if (isset($this->choice[$number])) {
            return $this->choice[$number];
        }
        return null;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param int $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * @param array $choice
     * @return $this
     */
    public function setChoice(array $choice)
    {
        $this->choice = $choice;
        return $this;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function isEmpty()
    {
        $params = ['id', 'subject', 'choice', 'answer'];
        foreach ($params as $param) {
            if (!isset($this->{$param})) {
                return true;
            }
        }
        return false;
    }
}