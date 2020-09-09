<?php
trait SetTrait
{

    /**
    * ニックネームを付ける
    * @return string
    */
    public function setNickname($nickname)
    {
        if(empty($nickname) || mb_strlen($nickname, 'UTF-8') > 5){
            $this->setMessage('ニックネームは１〜５文字で入力してください', 'error');
            return;
        }
        $this->nickname = $nickname;
        $this->setMessage('ニックネームを変更しました', 'success');
    }

    /**
    * レベルをセットする
    * @return void
    */
    protected function setLevel()
    {
        // 初期レベルからランダムで値を取得
        $key = array_rand($this->default_level);
        $this->level = $this->default_level[$key];
    }

    /**
    * 初期技をセットする
    * @return void
    */
    protected function setDefaultMove()
    {
        foreach($this->level_move as list($level, $move)){
            if($level <= $this->level){
                // 現在レベル以下の技であれば習得
                $this->setMove($move);
            }else{
                // 現在レベルを超えていれば処理終了
                break;
            }
        }
    }

    /**
    * 技を覚える
    * @return string
    */
    protected function setMove($move)
    {
        $this->move[] = $move;
        if(count($this->move) > 4){
            // 技が4つを超過していれば、一番上を忘れさせる
            unset($this->move[0]);
            // 技の添字を採番する
            $this->move = array_values($this->move);
        }
    }

    /**
    * 初期経験値をセットする
    * @return integer
    */
    protected function setDefaultExp()
    {
        $this->exp = $this->level ** 3;
    }

    /**
    * 経験値をセット（取得）する
    * @param integer $exp
    * @return object
    */
    public function setExp($exp)
    {
        if(!is_numeric($exp)){
            // 入力値のチェック
            $this->setMessage('数値を入力してください', 'error');
            return $this;
        }
        $this->exp += (int)$exp;
        $this->setMessage($this->getNickname().'は経験値を'.$exp.'ポイント手に入れた！', 'success');
        if($this->level >= 100){
            // レベルアップ処理は不要
            $this->exp += $exp;
            return $this;
        }
        // 次のレベルに必要な経験値を取得
        if($this->getReqLevelUpExp() <= $exp){
            /**
            * 次のレベルに必要な経験値を超えている場合
            */
            $this->actionLevelUp();
            while($this->getReqLevelUpExp() < 0){
                $this->actionLevelUp();
            }
        }
        // 進化判定
        if(isset($this->evolve_level) && $this->evolve_level <= $this->level){
            return $this->evolve();
        }else{
            return $this;
        }
    }

    /**
    * 個体値をセットする
    * @return void
    */
    protected function setIv()
    {
        /**
        * 個体値のランダム生成（コールバック用）
        * @return integer
        */
        function randIv(){
            // 0〜31の間でランダムの数値を割り振る
            return mt_rand(0, 31);
        }
        $this->iv = array_map('randIv', $this->iv);
    }

}
