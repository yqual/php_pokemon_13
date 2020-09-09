<form action="<?=$action_path?>" method="post">
    <p>ポケモンを選択してください</p>
    <div class="input-group">
        <select class="form-control" id="select_pokemon" name="pokemon">
            <option>--選択してください--</option>
            <?php foreach($controller->getPokemonList() as $class => $pokemon): ?>
                <option value="<?=$class?>"><?=$pokemon?></option>
            <?php endforeach; ?>
        </select>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">ゲット</button>
        </div>
    </div>
</form>
