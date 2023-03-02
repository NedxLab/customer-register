<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.css">

</head>

<body>
    <form method="post" action="<?php echo base_url('App/handleForm'); ?>" class="dynamic-dependent-frm"
        id="dynamic-dependent-frm" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="sales" class="form-label">Customer Sales :</label>
            <input type="text" name="sales" class="form-control" id="sales">
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <select title="Select Country" name="country" class="form-control" id="country-name">
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
        <div class="row">
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


        <div class="mb-3">
            <label for="invoice" class="form-label">Invoice</label>
            <input type='file' name='files[]' class="form-control" accept=".pdf">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".png">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" id="date">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
    var baseurl = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>

</body>

</html>