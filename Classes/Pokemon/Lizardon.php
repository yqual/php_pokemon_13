<?php
require_once(__DIR__.'/../Pokemon.php');

// リザードン
class Lizardon extends Pokemon
{

    /**
    * 正式名称
    * @var string(min:1 max:5)
    */
    protected $name = 'リザードン';

    /**
    * 進化前（クラス名）
    * @var string
    */
    protected $before_class = 'Lizardo';

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
        [1, 'ひっかく'],
        [1, 'にらみつける'],
        [1, 'なきごえ'],
        [1, 'ひのこ'],
        [9, 'ひのこ'],
        [15, 'にらみつける'],
        [24, 'いかり'],
        [36, 'きりさく'],
        [46, 'かえんほうしゃ'],
        [55, 'ほのうのうず'],
    ];

    /**
    * 種族値
    * @var array
    */
    protected $base_stats = [
        'HP' => 78,
        'こうげき' => 84,
        'ぼうぎょ' => 78,
        'とくこう' => 109,
        'とくぼう' => 85,
        'すばやさ' => 100,
    ];

}
