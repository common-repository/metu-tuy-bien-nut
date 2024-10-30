jQuery(document).ready(function () {
	jQuery(".metu__switch").click(function (e) {
		e.preventDefault();
		jQuery.ajax({
			type: "post",
			dataType: "json",
			url: ajaxurl,
			data: {
				action: "switch_status"
			},
			success: function (response) {
				jQuery(".metu__toggle").removeClass("active");
				if (response) {
					jQuery(".metu__toggle").addClass("active");
				}
			}
		})
	})
	jQuery("#register_account").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			name: {
				required: true,
			},
			tel: {
				required: true,
				number: true
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#register_password"
			},
		},
		messages: {
			name: {
				required: "Vui lòng nhập tên / doanh nghiệp.",
			},
			email: {
				required: "Vui lòng nhập email.",
				email: "Địa chỉ email không hợp lệ."
			},
			tel: {
				required: "Vui lòng nhập số điện thoại.",
				number: "Số điện thoại không hợp lệ."
			},
			password: {
				required: "Vui lòng nhập mật khẩu",
				minlength: "Mật khẩu tối thiểu 5 ký tự"
			},
			confirm_password: {
				required: "Vui lòng nhập mật khẩu",
				minlength: "Mật khẩu tối thiểu 5 ký tự",
				equalTo: "Mật khẩu không khớp"
			},
		}
	});
})