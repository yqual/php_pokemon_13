<form action="<?=$action_path?>" method="post">
    <input type="hidden" name="action" value="setNickname">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="最大５文字" name="param" aria-describedby="submit-setNickname">
      <div class="input-group-append">
          <input class="btn btn-primary" type="submit" id="submit-setNickname" value="ニックネームを変更">
      </div>
    </div>
</form>
