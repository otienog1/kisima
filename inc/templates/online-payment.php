<div class="container">
    <form id="payment_form" action="<?php echo get_template_directory_uri(); ?>/inc/templates/process.php" method="post">
        <input type="hidden" name="access_key" value="955104876ea63327bb09ff59f6784d41">
        <input type="hidden" name="profile_id" value="05574E9E-8B9C-48CF-8D5E-2F18C7F50E90">
        <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
        <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
        <input type="hidden" name="unsigned_field_names">
        <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
        <input type="hidden" name="locale" value="en">
        <!--
        <fieldset>
            <legend>Payment Details</legend>
            -->

            <div class="form-group">
                <label for="reference_number">Reference Number: <span><em>1434535875367</em></span></label>
                <input type="text" class="form-control" id="reference_number" name="reference_number" size="25" placeholder="Reference Number">
            </div>

            <div class="form-group">
                <label for="amount">Amount: <span><em><em>100.00</em></em></span></label>
                <input type="text" class="form-control" id="amount" name="amount" size="25" placeholder="Reference Number" required="required">
            </div>

            <input type="hidden" name="transaction_type" size="25" value="sale">

            <input type="hidden" name="currency"  value="usd" size="25" required="required">
            <input  id="submitButton" href="#" class="progress-button btn btn-k-form" type="submit" id="submit" name="submit" value="Submit"/>                
            <script type="text/javascript" src="payment_form.js"></script>
    </form>