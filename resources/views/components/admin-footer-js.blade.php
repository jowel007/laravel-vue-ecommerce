<!-- Bootstrap JS -->
<script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="{{ asset('backend') }}/assets/js/index.js"></script>
<!--app JS-->
<script src="{{ asset('backend') }}/assets/js/app.js"></script>

<script src="https://developercodez.com/developerCorner/parsley/parsley.min.js"></script>

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

    <!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>



	<script>
		$(document).ready(function(f){
			$('#formSubmit').on('submit', (function(e){
				if($(this).parsley().validate()) {
					e.preventDefault();
					var formData = new FormData(this);
					var html = '<button class="btn btn-primary" type="button" disabled=""> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>';
					var html = '<input type="submit" id="submitButton" class="btn btn-primary px-4" />';
					$('#submitButton').html(html);
					$.ajax({
						type: 'POST',
						url : $(this).attr('action'),
						data: formData,
						cache: false,
						contentData:false,
						processData:false,
						Content-Disposition:_form-data,
						success: function(result){
							// console.log(result);
							// $('#submitButton').html(html);
							if(result.status == 'Success'){
								$('#submitButton').html(html);
							}else{
								$('#submitButton').html(html1);
							}

						}
					});

					// $('#submitButton').html(html1);
				}
			}));
		});
	</script>