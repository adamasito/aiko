  <div id="contents">
    <h2><?php echo $page_title ?></h2>
    <?php echo form_open_multipart('order_csv/csv_data_download2');?>
      <section>
        <dl>
          <dt>受注日</dt>
          <dd><input type="text" name="stt_create_date" value="" size="10" />&nbsp;〜&nbsp;<input type="text" name="end_create_date" value="" size="10" /></dd>
        </dl>
        <dl>
          <dt>支払方法</dt>
          <dd><input type="text" name="payment_method" value="" size="10" /></dd>
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