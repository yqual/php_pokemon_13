<?php
require_once(__DIR__.'/../Pokemon.php');

// カメックス
class Kamex extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'カメックス';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Kameil';

    /**
    * 初期レベル
    * @var array
    */
    protected $default_level = [
        36
    ];

    /**
    * レベルアップで覚える技
    * @var array
    */
    protected $level_move = [
        [1, 'たいあたり'],
        [1, 'しっぽをふる'],
        [1, 'みずてっぽう'],
        [1, 'あわ'],
        [8, 'あわ'],
        [15, 'みずてっぽう'],
        [24, 'かみつく'],
        [31, 'からにこもる'],
        [42, 'ロケットずつき'],
        [52, 'ハイドロポンプ'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 79,
        'こうげき' => 83,
        'ぼうぎょ' => 100,
        'とくこう' => 85,
        'とくぼう' => 105,
        'すばやさ' => 78,
    ];

}
