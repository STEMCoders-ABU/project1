<div class="text-center mt-5 shadow shadow-sm container p-4">
    <?php if (isset($code_sent)): ?>
        <div class="mb-4 alert alert-success lead">
			We've sent you a verification link. It might take a while to arrive, please be patient!<br><br>
            If after waiting nothing arrives, click the button below to resend the link.
		</div>
    <?php elseif (isset($code_already_sent)): ?>
        <div class="mb-4 alert alert-danger lead">
			You already requested a password reset. Please follow the instructions in the email sent to you to continue.<br><br>
            You can click on the link below to resend the verification link to your email.
		</div>
    <?php elseif (isset($code_resent)): ?>
        <div class="mb-4 alert alert-success lead">
			We've resent you a verification link. It might take a while to arrive, please be patient!<br><br>
            If after waiting, nothing arrives, click the button below to resend the link.
		</div>
    <?php endif; ?>

    <a href="<?= site_url('moderation/resend_verification_link/' . $id); ?>" class="btn btn-success btn-theme btn-lg mt-2 mr-5">
        	Resend Link <span class="fas fa-arrow-right ml-2"></span>
    </a>
</div>