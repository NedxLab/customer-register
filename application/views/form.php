<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.css">
	<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/smart-forms.css">
	<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" />
</head>
<style>
	@font-face {
		font-family: 'FontAwesome';
		src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/fontawesome-webfontba72.eot?#iefix') format('embedded-opentype'), url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/fontawesome-webfontba72.woff') format('woff'), url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/fontawesome-webfontba72.ttf') format('truetype'), url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/fontawesome-webfontba72.svg#FontAwesome') format('svg');
		font-weight: normal;
		font-style: normal;
	}
</style>

<body>

	<div class="smart-wrap">
		<div class="smart-forms smart-container wrap-2">
			<div class="form-header header-primary">
				<h4><i class="fa fa-pencil-square"></i>Interview Question</h4>
			</div><!-- end .form-header section -->
			<form method="post" action="<?php echo base_url('App/handleForm'); ?>" class="dynamic-dependent-frm"
				id="dynamic-dependent-frm" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="form-body">

					<?php if (isset($error_message)) {
						print $error_message;
					} ?>
					<div class="spacer-b30">
						<div class="tagline"><span>Odo Chinedu</span></div><!-- .tagline -->
					</div>
					<div class="frm-row">
						<div class="section colm colm6">
							<label for="firstname" class="field prepend-icon">
								<input type="text" name="name" id="firstname" class="gui-input" placeholder="Name">
								<label for="firstname" class="field-icon"><i class="fa fa-user"></i></label>
							</label>
						</div><!-- end section -->


						<div class="section colm colm6">
							<label for="sales" class="field prepend-icon">
								<input type="text" name="sales" id="sales" class="gui-input"
									placeholder="Customer Sales">
								<label for="sales" class="field-icon"><i class="fa fa-shopping-cart"></i></label>
							</label>
						</div><!-- end section -->
					</div><!-- end .frm-row section -->



					<div class="section">
						<div class="row pt-4">
							<div class="col-lg-12">
								<div class="form-group">
									<select title="Select Country" name="country" class="form-control"
										id="country-name">
										<option value="">Select Country</option>
										<?php
										foreach ($geCountries as $key => $element) {
											echo '<option value="' . $element['country_id'] . '">' . $element['country'] . '</option>';
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="row py-4">
							<div class="col-lg-12">
								<div class="form-group">
									<select title="Select State" name="state" class="form-control" id="state-name">
										<option value="">Select State</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<select title="Select City" name="city" class="form-control" id="city-name">
										<option value="">Select City</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="section">
						<label for="file1" class="field file">
							<span class="button btn-primary"> Upload Invoice </span>
							<input type="file" class="gui-file" name='files[]' id="file1" multiple="" accept=".pdf">
							<input type="text" class="gui-input" id="uploader1"
								placeholder="You can pick multiple PDF files" readonly>
						</label>
					</div><!-- end  section UPLOAD-->
					<div class="section">
						<label for="file2" class="field file">
							<span class="button btn-primary"> Choose File </span>
							<input type="file" class="gui-file" id="file2" name="image" accept=".png">
							<input type="text" class="gui-input" id="uploader1"
								placeholder="Pick PNG files with Dimensions - 64 * 64" readonly>
						</label>
					</div><!-- end  section UPLOAD-->

					<div class="mb-3">

						<label for="date" class="form-label">Date</label>
						<input type="date" name="date" class="form-control field gui-	date"
							max="<?php echo date("Y-m-d"); ?>" id="date">
					</div>
				</div><!-- end .form-body section -->
				<div class="form-footer">
					<button type="submit" class="button btn-primary"> Validate Form </button>
					<button type="reset" class="button"> Reset </button>
				</div><!-- end .form-footer section -->
			</form>

		</div><!-- end .smart-forms section -->
	</div><!-- end .smart-wrap section -->



	<script>
		var baseurl = "<?php echo base_url(); ?>";
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<sc ript type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js">
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

</body>




</html>