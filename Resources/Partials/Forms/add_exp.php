<form action="<?=$action_path?>" method="post">
    <input type="hidden" name="action" value="setExp">
    <div class="input-group mb-3">
      <input type="number" class="form-control" min="1" name="param" aria-describedby="submit-setExp">
      <div class="input-group-append">
          <input class="btn btn-primary" type="submit" id="submit-setExp" value="経験値を取得">
      </div>
    </div>
</form>
