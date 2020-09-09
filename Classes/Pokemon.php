<?php
require_once(__DIR__.'/../Traits/ResponseTrait.php');
require_once(__DIR__.'/../Traits/Pokemon/SetTrait.php');
require_once(__DIR__.'/../Traits/Pokemon/GetTrait.php');

// ポケモン
abstract class Pokemon
{
    use ResponseTrait;
    use SetTrait;
    use GetTrait;

    /**
    * ニックネーム
    * @return string(min:1 max:5)
    */
    protected $nickname;

    /**
    * 現在のレベル
    * @var integer(min:2 max:100)
    */
    protected $level;

    /**
    * 覚えている技
    * @var array(min:1 max:4)
    */
    protected $move = [];

    /**
    * 経験値
    * @var integer
    */
    protected $exp;

    /**
    * 個体値
    * @var array(value min:0 max:31)
    */
    protected $iv = [
        'HP' => null,
        'こうげき' => null,
        'ぼうぎょ' => null,
        'とくこう' => null,
        'とくぼう' => null,
        'すばやさ' => null,
    ];

    /**
    * 努力値
    * @var array
    */
    protected $ev = [
        'HP' => 0,
        'こうげき' => 0,
        'ぼうぎょ' => 0,
        'とくこう' => 0,
        'とくぼう' => 0,
        'すばやさ' => 0,
    ];

    /**
    * インスタンス作成時に実行される処理
    *
    * @param object|null
    * @return void
    */
    public function __construct($before=null)
    {
        // 進化前のポケモンと一致しているかチェック
        if(is_a($before, $this->before_class ?? null)){
            // 進化した際の処理
            $this->takeOverAbility($before);
            // メッセージの引き継ぎ
            $this->setMessage($before->getMessages());
            $this->setMessage($this->name.'に進化した', 'success');
            $this->checkMove();
        }else{
            // 捕まえた際の処理
            $this->setLevel();
            $this->setDefaultExp();
            $this->setDefaultMove();
            $this->setIv();
            $this->setMessage($this->name.'をゲットした', 'success');
        }
    }

    /**
    * レベルアップ処理
    *
    * @var integer
    */
    protected function actionLevelUp()
    {
        // レベルアップ
        $this->level++;
        $this->setMessage($this->getNickName().'のレベルは'.$this->level.'になった！', 'success');
        // 現在のレベルで習得できる技があるか確認
        $this->checkMove();
    }

    /**
    * 進化
    *
    * @return Classes\Pokemon\$after_class
    */
    protected function evolve()
    {
        if(class_exists($this->after_class ?? null)){
            $pokemon = new $this->after_class($this);
            // 進化後のインスタンスを返却
            return $pokemon;
        }else{
            $this->setMessage('このポケモンは進化できません', 'error');
        }
    }

    /**
    * 現在のレベルで覚えられる技があるか確認する処理
    *
    * @var integer
    */
    protected function checkMove()
    {
        // レベルアップして覚えられる技があれば習得する
        $level_move_keys = array_keys(array_column($this->level_move, 0), $this->level);
        foreach($level_move_keys as $key){
            $move_name = $this->level_move[$key][1];
            // 覚えようとしている技が重複していないか確認
            if(!in_array($move_name, $this->move, true)){
                $this->setMove($move_name);
                $this->setMessage($move_name.'を覚えた！', 'success');
            }
        }
    }

    /**
    * 進化時の能力引き継ぎ処理
    *
    * @param object $before 進化前
    * @var void
    */
    protected function takeOverAbility($before)
    {
        $this->nickname = $before->nickname;    # ニックネーム
        $this->level = $before->level;          # レベル
        $this->ev = $before->ev;                # 努力値
        $this->iv = $before->iv;                # 個体値
        $this->exp = $before->exp;              # 経験値
        $this->move = $before->move;            # 技
    }
}
