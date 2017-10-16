<form id="kisimaContactForm" class="k-contact-form m-auto" action="" method="POST" role="form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<p>Form title</p>

	<div class="form-group">
		<input type="text" class="form-control k-input" id="name" name="name" placeholder="Your Name">
		<small class="text-danger form-control-msg js-name-error input-msg">Your Name is Required</small>
	</div>
	
	<div class="form-group">
		<input type="email" class="form-control k-input" id="email" name="email" placeholder="Your Email">
		<small class="text-danger form-control-msg js-email-error input-msg">Your Email is Required</small>
	</div>

	<div class="form-group">
		<textarea name="message" id="message" rows="4" class="form-control k-input" placeholder="Your Message"></textarea>
		<small class="text-danger form-control-msg js-msg-err input-msg">The field can not be blank. It is Required</small>
	</div>
	

	<button type="submit" class="btn btn-secondary btn-k-form">Send</button>
	<small class="text-info form-control-msg js-form-submission">Sending. Please wait...</small>
	<small class="text-success form-control-msg js-form-success">Sent successfully. Thank you!</small>
	<small class="text-danger form-control-msg js-form-error">An error occured. Please try again!</small>
</form>