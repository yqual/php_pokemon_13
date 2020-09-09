<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Kamex.php');

// カメール
class Kameil extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'カメール';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Zenigame';

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Kamex';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        16
    ];

    /**
    * 進化レベル
    * @var integer
    */
    protected $evolve_level = 36;

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'たいあたり'],
        [1, 'しっぽをふる'],
        [1, 'あわ'],
        [8, 'あわ'],
        [15, 'みずてっぽう'],
        [24, 'かみつく'],
        [31, 'からにこもる'],
        [39, 'ロケットずつき'],
        [47, 'ハイドロポンプ'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 59,
        'こうげき' => 63,
        'ぼうぎょ' => 80,
        'とくこう' => 65,
        'とくぼう' => 80,
        'すばやさ' => 58,
    ];

}
