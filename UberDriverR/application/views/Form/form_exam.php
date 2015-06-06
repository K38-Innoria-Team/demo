<html xmlns="http://www.w3.org/1999/html">
    <head>
        <title>My form</title>
    </head>
    <body>
        <?php echo validation_errors();?>
        <?php echo form_open('form'); ?>
    <h5>Username</h5>
    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50"/>
    <h5>Password</h5>
    <input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
    <h5>Password Confirm</h5>
    <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
    <h5>Email Address</h5>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
    <h5>Colors</h5>
    <input type="text" name="colors[]" value="<?php echo set_value('colors[]'); ?>" size="50" />

    <div><input type="submit" value="submit" /></div>
    </form>

        <?php echo form_open('path/to/controller/update/method'); ?>

        <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

            <tr>
                <th>QTY</th>
                <th>Item Description</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

                <tr>
                    <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                    <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                            <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                <?php endforeach; ?>
                            </p>

                        <?php endif; ?>

                    </td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>

        </table>

        <p><?php echo form_submit('', 'Update your Cart'); ?></p>

    </body>
</html>
