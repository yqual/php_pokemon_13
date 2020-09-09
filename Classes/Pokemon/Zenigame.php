<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Kameil.php');

// ゼニガメ
class Zenigame extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'ゼニガメ';

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Kameil';

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
        [1, 'たいあたり'],
        [1, 'しっぽをふる'],
        [8, 'あわ'],
        [15, 'みずてっぽう'],
        [22, 'かみつく'],
        [28, 'からにこもる'],
        [35, 'ロケットずつき'],
        [42, 'ハイドロポンプ'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 44,
        'こうげき' => 48,
        'ぼうぎょ' => 65,
        'とくこう' => 50,
        'とくぼう' => 64,
        'すばやさ' => 43,
    ];

}
