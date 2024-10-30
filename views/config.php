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
            <div class="metu__box metu__config">
                <div class="metu__content f-s-16">
                    <?php _e( 'Website của bạn đã liên kết với tài khoản Metu:', 'metu' ); ?>
                    <b>
                        <?php esc_attr_e( get_option('metu_username'), 'metu' ); ?>
                    </b>
                </div>
                <div class="metu__content">
                    <form action="<?php echo esc_url( Metu_Admin::get_page_url() ); ?>" method="post">
                        <input type="hidden" name="action" value="change-account">
                        <input type="submit" name="submit" id="submit" class="metu__logout" value="<?php _e( 'Đổi tài khoản khác.', 'metu' ); ?>">
                    </form>
                </div>
                <div class="metu__content">
                    <a href="https://admin.metu.vn/auth/login" target="_blank" title="<?php _e( 'Đi đến trang quản trị để cài đặt Metu.', 'metu' ); ?>" class="bootrap__button">
                        <?php _e( 'Đi đến trang quản trị Admin.', 'metu' ); ?>
                    </a>
                </div>
                <div class="bootrap__alert">
                    <?php _e( 'Nếu bạn đã nhúng mã của Metu trước đó, vui lòng gỡ mã trước đó ra.', 'metu' ); ?>
                </div>
                <div class="metu__TL">
                    <?php $metu__toggle = 'metu__toggle'; ?>
                    <?php if( get_option('metu_status') ) { ?>
                        <?php $metu__toggle = 'metu__toggle active'; ?>
                    <?php } ?>
                    <div class="<?php echo $metu__toggle; ?>">
                        <span class="metu__switch"></span>
                    </div>
                    <div class="metu__line">
                        <?php _e( 'Bật / Tắt Metu.', 'metu' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>