<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js"></script>

</head>

<body>
    <form method="post" action="<?php echo base_url('App/handleForm'); ?>" id="equipment" accept-charset="utf-8"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="sales" class="form-label">Customer Sales :</label>
            <input type="text" name="sales" class="form-control" id="sales">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="country">
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" class="form-control" id="state">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city">
        </div>
        <div class="mb-3">
            <label for="invoice" class="form-label">Invoice</label>
            <input type="text" name="invoice" class="form-control" id="invoice">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
