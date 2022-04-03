<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php _e('New Address', 'wedevs-academy')?>
    </h1>
    <a href="<?php echo admin_url('admin.php?page=wedevs-academy')?>" class="page-title-action">
        <?php _e('Back', 'wedevs-academy')?>
    </a>
    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', 'wedevs-academy');?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="address"><?php _e('Address', 'wedevs-academy');?></label>
                </th>
                <td>
                    <textarea name="address" id="address" class="regular-text" value=""></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e('Phone', 'wedevs-academy');?></label>
                </th>
                <td>
                    <input type="text" name="phone" id="phone" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="email"><?php _e('Email', 'wedevs-academy');?></label>
                </th>
                <td>
                    <input type="email" name="email" id="email" class="regular-text" value="">
                </td>
            </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('new-address')?>
        <?php submit_button(__('Add Address', 'wedevs-academy'), 'primary', 'submit_address');?>
    </form>
</div>