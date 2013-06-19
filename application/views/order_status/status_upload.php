  <div id="contents">
    <h2><?php echo $page_title ?></h2>
    <?php echo form_open_multipart('order_status/status_upload');?>
      <section>
<?php if (isset($confirm_flag) && $confirm_flag == 1){ ?>
        <input type="hidden" name="confirm_flag" value="<?php echo $confirm_flag ?>" />
        <input type="hidden" name="order_no" value="<?php echo $order_no ?>" />
        <input type="hidden" name="mtb_order_status" value="<?php echo $mtb_order_status ?>" />
        <p class="message">こちらの内容で登録してもよろしいですか？</p>
        <dl>
          <dt>更新ステータス<em class="require">*</em></dt>
          <dd><?php echo $mtb_order_status_name ?></dd>
        </dl>
        <dl>
          <dt>注文ID<em class="require">*</em></dt>
          <dd>
<?php   foreach( explode('_', $order_no) as $key => $val ){?>
            <?php echo $val ?>&nbsp;
<?php   } ?>
          </dd>
        </dl>
        <div class="control">
          <button type="button" class="historyback">戻る</button>
          <button type="submit">登録</button>
        </div>
<?php }else{ ?>
        <input type="hidden" name="confirm_flag" value="0" />
        <dl>
          <dt></dt>
          <dd><?php echo $count ?>件の更新が完了しました。</dd>
        </dl>
<?php   } ?>
      </section>
    </form>
  </div>

