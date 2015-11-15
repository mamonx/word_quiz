<?php
/**
 * Created by PhpStorm.
 * User: noguhiro
 * Date: 15/11/15
 * Time: 15:23
 */

namespace App\System;


class ScoreTable
{
    const COL_MIN     = 0;
    const COL_MAX     = 1;
    const COL_COMMENT = 2;

    private $tables = [
        [0, 3, 'なめてるのか＾ｑ＾'],
        [4, 6, 'ふつうだねー＾～＾'],
        [7, 9, 'やればできるじゃん＾ｗ＾'],
        [10, null, 'さすがだわ']
    ];

    private $score;

    private $quizCount;

    public function __construct($score, $quizCount)
    {
        if (!is_numeric($score) || !is_numeric($quizCount)) {
            throw new \RuntimeException(
                'bad variable type, score and quiz count is integer only. ');
        }
        $this->score = $score;
        $this->quizCount = $quizCount;
    }

    public function comparison()
    {
        return sprintf('%s 点 / %s点 満点中', $this->score, $this->quizCount);
    }

    public function comment()
    {
        foreach ($this->tables as $table) {
            if (is_null($table[self::COL_MAX])) {
                if ($this->score >= $table[self::COL_MIN]) {
                    return $table[self::COL_COMMENT];
                }
            }
            if ($this->score >= $table[self::COL_MIN] && $this->score <= $table[self::COL_MAX]) {
                return $table[self::COL_COMMENT];
            }
        }
        return null;
    }

}