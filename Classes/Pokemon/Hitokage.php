<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Lizardo.php');

// ヒトカゲ
class Hitokage extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'ヒトカゲ';

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Lizardo';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        5
    ];

    /**
    * 進化レベル
    * @var integer
    */
    protected $evolve_level = 16;

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'ひっかく'],
        [1, 'なきごえ'],
        [9, 'ひのこ'],
        [15, 'にらみつける'],
        [22, 'いかり'],
        [30, 'きりさく'],
        [38, 'かえんほうしゃ'],
        [46, 'ほのうのうず'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 39,
        'こうげき' => 52,
        'ぼうぎょ' => 43,
        'とくこう' => 60,
        'とくぼう' => 50,
        'すばやさ' => 65,
    ];

}
