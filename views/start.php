<div class="metu__header">
    <div class="metu__container">
        <div class="metu__logo">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 198" style="enable-background:new 0 0 750 198;" xml:space="preserve">
                <style type="text/css">
                	.st0{fill:#FF0000;}
                	.st1{fill:#FFFFFF;}
                	.st2{fill:#ED1C24;}
                </style>
                <g>
                	<rect x="2.7" class="st0" width="305.2" height="198.4"></rect>
                	<g>
                		<path class="st1" d="M277.5,90.5v81h-58.7v-70.9c0-17.7-6.5-24.4-15.8-24.4c-10.4,0-18.4,7-18.4,26v69.3h-58.7v-70.9
                			c0-17.7-6-24.4-15.8-24.4c-10.4,0-18.4,7-18.4,26v69.3H33v-142h55.8v13.2c10.6-10.6,24.7-15.8,40.2-15.8
                			c18.4,0,34.5,6.7,44.4,21.5c11.4-13.8,28-21.5,47.5-21.5C253.1,26.9,277.5,45.8,277.5,90.5z"></path>
                	</g>
                	<g>
                		<path class="st2" d="M452.7,134.7v36.9H332.1V26.5H450v36.9h-69.8v17h61.3v35.2h-61.3v19.1H452.7z"></path>
                		<path class="st2" d="M503.1,64.4h-42.5V26.5h133.9v37.9H552v107.1h-48.9V64.4z"></path>
                		<path class="st2" d="M603.8,106.3V26.5h48.9v78.3c0,22.2,8.5,30.5,22.2,30.5c13.7,0,22.2-8.3,22.2-30.5V26.5h48.1v79.8
                			c0,43.5-26.1,68.6-70.7,68.6C629.9,174.9,603.8,149.8,603.8,106.3z"></path>
                	</g>
                </g>
            </svg>
        </div>
    </div>
</div>
<div class="metu__body">
    <div class="metu__container">
		<?php if ( ! empty( $notices ) ) { ?>
			<?php foreach ( $notices as $notice ) { ?>
				<?php Metu::view( 'notice', $notice ); ?>
			<?php } ?>
		<?php } ?>
        <div class="metu__box metu__intro">
            <div class="metu__title">
				<?php _e( 'Tuỳ biến nút - Hút khách hàng.', 'metu' ); ?>
			</div>
        </div>
        <div class="metu__boxes metu__LR">
            <div class="metu__box metu__login">
                <div class="metu__title">
					<?php _e( 'Đăng nhập', 'metu' ); ?>
				</div>
                <div class="metu__content">
					<?php _e( 'Đã có tài khoản, đăng nhập tại đây.', 'metu' ); ?>
				</div>
				<form action="<?php echo esc_url( Metu_Admin::get_page_url() ); ?>" method="post">
					<input type="hidden" name="action" value="login-account">
					<div class="metu__group">
						<label for="login_username">
							<?php _e( 'Email / Tài khoản: ', 'metu' ); ?>
						</label>
						<input type="text" name="login_username" id="login_username" class="metu__input">
					</div>
					<div class="metu__group">
						<label for="login_password">
							<?php _e( 'Mật khẩu: ', 'metu' ); ?>
						</label>
						<input type="password" name="login_password" id="login_password" class="metu__input">
					</div>
					<div class="metu__group">
					    <input type="submit" name="submit" id="login-submit" class="metu__button" value="<?php _e( 'Đăng nhập', 'metu' ); ?>">    
					</div>
                </form>
            </div>
            <div class="metu__box metu__register">
                <div class="metu__title">
					<?php _e( 'Hoặc đăng ký Metu', 'metu' ); ?>
				</div>
                <div class="metu__content">
					<?php _e( 'Chưa có tài khoản, đăng ký tại đây.', 'metu' ); ?>
				</div>
                <form action="<?php echo esc_url( Metu_Admin::get_page_url() ); ?>" id="register_account" method="post">
					<input type="hidden" name="action" value="register-account">
                    <div class="metu__group">
						<label for="register_name">
							<?php _e( 'Tên / Doanh nghiệp*: ', 'metu' ); ?>
						</label>
						<input type="text" name="name" id="register_name" class="metu__input">
					</div>
					<div class="metu__group">
						<label for="register_email">
							<?php _e( 'Email*: ', 'metu' ); ?>
						</label>
						<input type="text" name="email" id="register_email" class="metu__input">
					</div>
					<div class="metu__group">
						<label for="register_tel">
							<?php _e( 'Số điện thoại*: ', 'metu' ); ?>
						</label>
						<input type="tel" name="tel" id="register_tel" class="metu__input">
					</div>
					<div class="metu__group">
						<label for="register_password">
							<?php _e( 'Mật khẩu*: ', 'metu' ); ?>
						</label>
						<input type="password" name="password" id="register_password" class="metu__input">
					</div>
					<div class="metu__group">
						<label for="register_confirm-password">
							<?php _e( 'Xác nhận mật khẩu*: ', 'metu' ); ?>
						</label>
						<input type="password" name="confirm_password" id="register_confirm-password" class="metu__input">
					</div>
					<div class="metu__group">
					    <input type="submit" name="submit" id="register_submit" class="metu__button" value="<?php _e( 'Đăng ký', 'metu' ); ?>">    
					</div>
                </form>
            </div>
        </div>
    </div>
</div>