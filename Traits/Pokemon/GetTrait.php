<?php
trait GetTrait
{

    /**
    * 詳細を取得する
    * @return integer
    */
    public function getDetails()
    {
        return [
            '正式名称' => $this->getName(),
            'ニックネーム' => $this->getNickName(),
            '現在のレベル' => $this->getLevel(),
            '覚えている技' => $this->getMove(),
            '現在の経験値' => $this->getExp(),
            '次のレベルまでに必要な経験値' => $this->getReqLevelUpExp(),
        ];
    }

    /**
    * 正式名称を取得する
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
    * ニックネームを取得する
    * @return string
    */
    public function getNickname()
    {
        if(empty($this->nickname)){
            return $this->name;
        }
        return $this->nickname;
    }

    /**
    * 覚えている技の一覧を取得する
    * @return array
    */
    public function getMove()
    {
        return $this->move;
    }

    /**
    * 現在のレベルを取得する
    * @return integer
    */
    public function getLevel()
    {
        return $this->level;
    }

    /**
    * 現在の経験値を取得する
    * @return integer
    */
    public function getExp()
    {
        return $this->exp;
    }

    /**
    * 次のレベルに必要な経験値
    * @return integer
    */
    public function getReqLevelUpExp()
    {
        if($this->level >= 100){
            return 0;
        }
        return ($this->level + 1) ** 3 - $this->exp;
    }

    /**
    * ステータスの取得
    *
    * @var void
    */
    public function getStats()
    {
        foreach($this->base_stats as $key => $val){
            /**
            * ステータスの計算式（小数点以下は切り捨て）
            * HP：(種族値×2+個体値+努力値÷4)×レベル÷100+レベル+10
            * HP以外：(種族値×2+個体値+努力値÷4)×レベル÷100+5
            */
            if($key === 'HP'){
                $correction = $this->level + 10;
            }else{
                $correction = 5;
            }
            $stats[$key] = (int)(($val * 2 + $this->iv[$key] + $this->ev[$key] / 4) * $this->level / 100 + $correction);
        }
        return $stats;
    }

}
