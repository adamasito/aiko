 <script>
$(function() {
$( "#datepicker1" ).datepicker({
	dateFormat: 'yy-mm-dd',
});
$( "#datepicker2" ).datepicker({
	dateFormat: 'yy-mm-dd',
});
});
</script>

<div id="contents">
    <h2><?php echo $page_title ?></h2>
    <?php echo form_open_multipart('order_shogo/shogo_csv_download');?>
      <section>
        <dl>
          <dt>ファイルタイプ</dt>
          <dd>
              <select name="file_type">
              <option value="0">JPayment</option>
              <option value="1">SMBC</option>
              </select>
          </dd>
        </dl>
        <dl>
          <dt>ファイル<em class="require">*</em></dt>
          <dd>
            <input type="file" name="upload_file" size="20" />
            <?php echo isset($errors['upload_file'])? '<p class="error">'.$errors['upload_file'].'</p>' : "" ?>
          </dd>
        </dl>
<?php
/*
        <dl>
          <dt>受注日</dt>
          <dd><input type="text" id="datepicker1" name="stt_create_date" value="" size="10" />&nbsp;〜&nbsp;<input type="text" id="datepicker2" name="end_create_date" value="" size="10" /></dd>
        </dl>
        <dl>
          <dt>注文番号</dt>
          <dd><input type="text" name="stt_order_id" value="" size="10" />&nbsp;〜&nbsp;<input type="text" name="end_order_id" value="" size="10" /></dd>
        </dl>
        <dl>
          <dt></dt>
          <dd><?php echo isset($errors['no_data'])? '<p class="error">'.$errors['no_data'].'</p>' : "" ?></dd>
        </dl>
*/
?>
        <div class="control">
          <button type="submit">照合</button>
        </div>
      </section>
    </form>
  </div>