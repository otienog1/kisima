		<section class="footer kisima-article hidden-sm-down bg-dark">
			<div class="container">
				<div class="row">
				<?php if ( is_active_sidebar( 'footer_1' )  ) : ?>
					<div id="secondary" class="d-flex sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_1' ); ?>
					</div><!-- .sidebar .widget-area -->
				<?php endif; ?>
				</div>
			</div>
			<div class="container text-light reveal last-f" style="border-top: 1px solid rgba(255,255,255,.05)">
				<div class="row justify-content-between">
					<div class="col-md-6">
						<p>&copy; <?php echo date("Y"); ?> Kisima Tours & Safaris | All Rights Reserved</p>
					</div>
					<div class="col-md-6 text-right">
						<a href="/online-payment" class="pay-online" title="Online payment">
							<span class="cards">
								<img alt="Credit Card Logos" src="http://www.credit-card-logos.com/images/visa_credit-card-logos/visa_logo_3.gif" width="35" height="22" border="0" />
							</span>
							<span class="cards">
								<img alt="Credit Card Logos" src="http://www.credit-card-logos.com/images/mastercard_credit-card-logos/mastercard_logo_3.gif" width="37" height="22" border="0" />
							</span>
						</a>
					</div>
				</div>
			</div>
		</section>

		<!-- <div class="feedback p-fixed"> -->
			<div class="feedback-body p-fixed">
				<form id="kisimaFeedbackForm" action="" method="POST" role="form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<input id="name" type="text" class="form-control" name="name"  required="required" placeholder="Name" />
					<input id="email" type="email" class="form-control" name="email" required="required" placeholder="example@email.com" />
					<textarea id="feedback" name="feedback" id="feedback" rows="3" class="form-control" placeholder="Feedback"></textarea>
					<button class="btn"><i class="fa fa-send"></i></button>

					<small class="form-control-msg js-form-submission text-white">Sending. Please wait...</small>
					<small class="form-control-msg js-form-success text-white">Sent successfully. Thank you!</small>
					<small class="form-control-msg js-form-error text-white">An error occured. Please try again!</small>
				</form>
			</div>
			<a href="#feedback" id="feedback-btn" class="feedback-icon d-block ml-auto p-fixed"><i class="dashicons dashicons-megaphone"></i></a>
		<!-- </div> -->

		<?php wp_footer(); ?>
		<script type="text/javascript">
			
            
            $(function () {
                $('.datetime > input').datetimepicker({
                	format: 'D-M-YYYY'
                });
				

            });

			$('#single-post-image').stellar();
        </script>
	</body>
</html>