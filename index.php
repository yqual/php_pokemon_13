<?php

require_once(__DIR__.'/Classes/Controller.php');

session_start();

$controller = new Controller($_POST, $_SESSION);
$action_path = '/';
?>
<!DOCTYPE html>
<html lang="jp" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>PHPポケモン</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/Assets/style.css">
</head>
<body>
    <header>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12">
                        <h1>PHPポケモン</h1>
                    </div>
                </div>
            </section>
        </div>
    </header>
    <main>
        <div class="container">
            <?php if(isset($controller->pokemon)): ?>
                <section>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <?php foreach($controller->pokemon->getDetails() as $key => $val): ?>
                                <dl class="row">
                                    <dt class="col-4"><?=$key?></dt>
                                    <?php if(is_array($val)) $val = implode(',', $val); ?>
                                    <dd class="col-8"><?=$val?></dd>
                                </dl>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-12 col-sm-6">
                            <?php foreach($controller->pokemon->getStats() as $key => $val): ?>
                                <dl class="row">
                                    <dt class="col-4"><?=$key?></dt>
                                    <dd class="col-8"><?=$val?></dd>
                                </dl>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <section>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-5">
                        <h2 class="mb-3">メソッドの実行</h2>
                        <?php if(is_object($controller->pokemon ?? null)): ?>
                            <?php $_SESSION['pokemon'] = $controller->pokemon; # ポケモンのインスタンスをセッションに格納 ?>
                            <?php include('Resources/Partials/Forms/change_nickname.php'); # ニックネームの変更?>
                            <?php include('Resources/Partials/Forms/add_exp.php'); # 経験値の取得 ?>
                            <?php include('Resources/Partials/Forms/reset.php'); # リセット ?>
                        <?php else: ?>
                            <?php
                            // ポストとセッションをリセット
                            $_POST = [];
                            $_SESSION = [];
                            ?>
                            <?php include('Resources/Partials/Forms/select_pokemon.php'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-sm-6 mb-5">
                        <h2 class="mb-3">実行結果</h2>
                        <div class="result-box border p-3 mb-3">
                            <?php foreach($controller->getMessages() as list($msg, $status)): ?>
                                <?php if($status == 'error') $class = 'text-danger'; ?>
                                <?php if($status == 'success') $class = 'text-success'; ?>
                                <p class="<?=$class ?? ''?>"><?=$msg?></p>
                            <?php endforeach; ?>
                            <?php if(!empty($controller->getResponses())): ?>
                                <pre><?php var_export($controller->getResponses()); ?></pre>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
