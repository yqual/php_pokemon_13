<?php
require_once(__DIR__.'/../Pokemon.php');

// フシギバナ
class Fushigibana extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'フシギバナ';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Fushigisou';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        32
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'たいあたり'],
        [1, 'なきごえ'],
        [1, 'やどりぎのタネ'],
        [1, 'つるのムチ'],
        [7, 'やどりぎのタネ'],
        [13, 'つるのムチ'],
        [22, 'どくのこな'],
        [30, 'はっぱカッター'],
        [43, 'せいちょう'],
        [55, 'ねむりごな'],
        [65, 'ソーラービーム'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 80,
        'こうげき' => 82,
        'ぼうぎょ' => 83,
        'とくこう' => 100,
        'とくぼう' => 100,
        'すばやさ' => 80,
    ];

}
