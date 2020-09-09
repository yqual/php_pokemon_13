<?php
require_once(__DIR__.'/../Pokemon.php');
require_once(__DIR__.'/Lizardon.php');

// リザード
class Lizardo extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'リザード';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Hitokage';

    /**
    * 進化後（クラス名）
    * @var string
    */
    protected $after_class = 'Lizardon';

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
        [1, 'ひっかく'],
        [1, 'なきごえ'],
        [1, 'ひのこ'],
        [9, 'ひのこ'],
        [15, 'にらみつける'],
        [24, 'いかり'],
        [33, 'きりさく'],
        [42, 'かえんほうしゃ'],
        [56, 'ほのうのうず'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 58,
        'こうげき' => 64,
        'ぼうぎょ' => 58,
        'とくこう' => 80,
        'とくぼう' => 65,
        'すばやさ' => 80,
    ];

}
