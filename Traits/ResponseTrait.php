<?php
trait ResponseTrait
{
    /**
    * メッセージの格納用
    * @var array
    */
    private $msgs = [];

    /**
    * レスポンステータの格納用
    * @var array
    */
    private $responses = [];

    /**
    * メッセージの取得
    *
    * @return array
    */
    public function getMessages()
    {
        return $this->msgs;
    }

    /**
    * メッセージの格納
    *
    * @param string|array $msg
    * @param string $param error|success default=null
    * @return array
    */
    public function setMessage($msg, $param=null)
    {
        if(is_array($msg)){
            // 一括登録
            $this->msgs = array_merge($this->msgs, $msg);
        }else{
            // 単発登録
            $this->msgs[] = [$msg, $param];
        }
    }
    
    /**
    * メッセージの初期化
    *
    * @return void
    */
    public function resetMessage()
    {
        $this->msgs = [];
    }

    /**
    * レスポンステータの取得
    *
    * @return array
    */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
    * レスポンステータの格納
    *
    * @param mixed @response
    * @return array
    */
    public function setResponse($response, $key=null)
    {
        if(is_null($key)){
            $this->responses[] = $response;
        }else{
            $this->responses[$key] = $response;
        }
    }

    /**
    * レスポンステータの初期化
    *
    * @return void
    */
    public function resetResponse()
    {
        $this->responses = [];
    }

}
