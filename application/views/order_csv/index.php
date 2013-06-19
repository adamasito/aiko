 <script>
$(function() {
//$( "#datepicker1" ).datepicker();
//$( "#datepicker2" ).datepicker();
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
    <?php echo form_open_multipart('order_csv/csv_data_download');?>
      <section>
        <dl>
          <dt>受注日</dt>
          <dd><input type="text" id="datepicker1" name="stt_create_date" value="" size="10" />&nbsp;〜&nbsp;<input type="text" id="datepicker2" name="end_create_date" value="" size="10" /></dd>
        </dl>
        <dl>
          <dt>支払方法</dt>
          <dd>
              <select name="payment_method">
              <option value=""></option>
<?php foreach ($payment_type as $val){ ?>
                 <option value="<?php echo $val['payment_id'] ?>" <?php echo set_select('payment_method', $val['payment_id']); ?> ><?php echo $val['payment_method'] ?>
                 </option>
<?php } ?>
              </select>
          </dd>
        </dl>
        <dl>
          <dt>名前(姓)</dt>
          <dd><input type="text" name="order_name01" value="" size="30" /></dd>
        </dl>
        <dl>
          <dt>名前(名)</dt>
          <dd><input type="text" name="order_name02" value="" size="30" /></dd>
        </dl>
		<dl>
          <dt>注文番号</dt>
          <dd><input type="text" name="stt_order_id" value="" size="10" />&nbsp;〜&nbsp;<input type="text" name="end_order_id" value="" size="10" /></dd>
        </dl>
        <div class="control">
          <button type="submit">Download</button>
        </div>
      </section>
    </form>
  </div>