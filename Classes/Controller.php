<?php
require_once(__DIR__.'/../Traits/ResponseTrait.php');
require_once(__DIR__.'/Pokemon/Pikachu.php');
require_once(__DIR__.'/Pokemon/Fushigidane.php');
require_once(__DIR__.'/Pokemon/Hitokage.php');
require_once(__DIR__.'/Pokemon/Zenigame.php');

// コントローラー
class Controller
{
    use ResponseTrait;

    /**
    * ポケモン格納用
    * @var object
    */
    public $pokemon;

    /**
    * ポケモン一覧
    * @var array
    */
    private $pokemon_list = [
        'Pikachu' => 'ピカチュウ',
        'Fushigidane' => 'フシギダネ',
        'Hitokage' => 'ヒトカゲ',
        'Zenigame' => 'ゼニガメ',
    ];

    /**
    * @return void
    */
    public function __construct($post, $session)
    {
        if(get_parent_class($session['pokemon'] ?? null) === 'Pokemon'){
            // Pokemonのインスタンスに溜まったメッセージとレスポンスデータを初期化
            $session['pokemon']->resetMessage();
            $session['pokemon']->resetResponse();
        }
        if(isset($post['pokemon'])){
            // ポケモンをゲットした
            $this->checkPokemon($post['pokemon']);
        }
        if(isset($post['action'])){
            // アクションを選択した
            $this->pokemon = $session['pokemon'] ?? null; # 更新時エラー回避用にnullをセット
            // アクションメソッドの実行
            $this->action($post['action'], $post['param'] ?? null);
        }
    }

    /**
    * ポケモンクラスの存在チェック
    *
    * @param string $pokemon(class_name)
    * @var void
    */
    private function checkPokemon($pokemon)
    {
        if(class_exists($pokemon)){
            $this->pokemon = new $pokemon;
            // Pokemonのインスタンスに溜まったメッセージを取得
            $this->setMessage($this->pokemon->getMessages());
        }else{
            $this->setMessage('選択されたポケモンは存在しません', 'error');
        }
    }

    /**
    * アクション
    *
    * @param string $action(method_name)
    * @param mixed $param
    * @return void
    */
    private function action($action, $param)
    {
        if($action === 'reset' || is_null($this->pokemon)){
            // 初期化
            $this->pokemon = null;
            return;
        }
        // 呼び出せるメソッドか判別
        if(is_callable([$this->pokemon, $action])){
            // メソッド実行結果を$resultに格納
            $result = $this->pokemon
            ->$action($param);
            switch ($action) {
                // 経験値の取得
                case 'setExp':
                $this->pokemon = $result;
                break;
            }
            // Pokemonクラスに溜まったメッセージを取得
            $this->setMessage($this->pokemon->getMessages());
        }else{
            $this->setMessage('このアクションは使用できません', 'error');
        }
    }

    /**
    * ポケモン一覧の取得
    *
    * @return array
    */
    public function getPokemonList()
    {
        return $this->pokemon_list;
    }
}
