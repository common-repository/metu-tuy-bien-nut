<?php if ( $status == 'login-true' ) :?>
    <div class="metu__alert metu__bgreen metu__twhite">
        <?php _e( 'Đăng nhập thành công.', 'metu' ); ?>
    </div>
<?php elseif ( $status == 'login-false' ) :?>
    <div class="metu__alert metu__bred metu__twhite">
        <?php _e( 'Thông tin đăng nhập không chính xác.', 'metu' ); ?>
    </div>
<?php elseif ( $status == 'register-true' ) :?>
    <div class="metu__alert metu__bgreen metu__twhite">
        <?php _e( 'Đăng ký thành công.', 'metu' ); ?>
    </div>
<?php elseif ( $status == 'register-false' ) :?>
    <div class="metu__alert metu__bred metu__twhite">
        <?php _e( 'Đăng ký thất bại.', 'metu' ); ?>
    </div>
<?php elseif ( $status == 'email-false' ) :?>
    <div class="metu__alert metu__bred metu__twhite">
        <?php _e( 'Email đã tồn tại.', 'metu' ); ?>
    </div>
<?php endif;?>