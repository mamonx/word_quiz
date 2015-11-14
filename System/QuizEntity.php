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

    public function getChoice()
    {
        return $this->choice;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @param array $choice
     */
    public function setChoice(array $choice)
    {
        $this->choice = $choice;
    }

    public function setSubject($subject)
    {
        $this->subject;
    }

}