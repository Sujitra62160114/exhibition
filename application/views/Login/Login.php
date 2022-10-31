<div class="auth-wrapper">
	<div class="auth-content">
		<div class="auth-bg">
			<span class="r"></span>
			<span class="r s"></span>
			<span class="r s"></span>
			<span class="r"></span>
		</div>
		<div class="card">
			<div class="card-body text-center">
				<div class="mb-4">
					<i class="feather icon-unlock auth-icon"></i>
				</div>
				<h3 class="mb-4">Login</h3>
				<div class="input-group mb-3">
					<input type="email" id='username' class="form-control" placeholder="Email" autocomplete="off">
				</div>
				<div class="input-group mb-4">
					<input type="password" id='password' class="form-control" placeholder="password">
				</div>
				<button class="btn btn-primary shadow-2 mb-4" onclick="login()">Login</button>
			</div>
		</div>
	</div>
</div>
<script>
	function login() {
		let username = $('#username').val();
        let password = $('#password').val();

		$.ajax({
            type: "POST",
            url: "<?php echo site_url() . '/Login/check_login'; ?>",
            data: {
                'username': username,
                'password': password,
            },
            dataType: 'json',
            success: function(data) {
				console.log(data)
                if (data.message) {
       		 		window.location.href = "<?php echo site_url() . '/User/show_user_manage'; ?>";    
                }
                else {
					alert('fail')
                }
            }
        });




	}


</script>