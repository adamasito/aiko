  <div id="contents">
    <h2><?php echo $page_title ?></h2>
    <?php echo form_open_multipart('order_status/status_upload');?>
      <section>
        <dl>
          <dt>更新ステータス<em class="require">*</em></dt>
          <dd>
            <select name="mtb_order_status">
              <option value=""<?php echo set_select('mtb_order_status', "", TRUE); ?>></option>
<?php foreach( $mtb_order_status as $key => $val ){?>
              <option value="<?php echo $val['id'] ?>"<?php echo set_select('mtb_order_status', $val['id']); ?>><?php echo $val['name'] ?></option>
<?php } ?>
            </select>
            <?php echo form_error('mtb_order_status'); ?><?php echo isset($errors['mtb_order_status'])? '<p class="error">'.$errors['mtb_order_status'].'</p>' : "" ?>
          </dd>
        </dl>
        <dl>
          <dt>ファイル<em class="require">*</em></dt>
          <dd>
            <input type="file" name="upload_file" size="20" />
            <?php echo isset($errors['upload_file'])? '<p class="error">'.$errors['upload_file'].'</p>' : "" ?>
          </dd>
        </dl>
        <div class="control">
          <button type="submit">Upload</button>
        </div>
      </section>
    </form>
  </div>

