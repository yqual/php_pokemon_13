<?php

require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Raichu.php');

// ピカチュウ
class Pikachu extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'ピカチュウ';

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Raichu';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        7, 8, 9,
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'でんきショック'],
        [1, 'なきごえ'],
        [9, 'でんじは'],
        [16, 'でんこうせっか'],
        [26, 'スピードスター'],
        [33, 'こうそくいどう'],
        [43, 'かみなり'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 35,
        'こうげき' => 55,
        'ぼうぎょ' => 40,
        'とくこう' => 50,
        'とくぼう' => 50,
        'すばやさ' => 90,
    ];

}
