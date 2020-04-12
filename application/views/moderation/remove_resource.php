<div class="text-center mt-5 shadow shadow-sm container p-4">
	<h4 class="text-center">Remove Resource</h4>
	<hr class="mb-5 w-25 bg-dark">

    <div class="mb-5 alert alert-info">
        <p class="lead d-inline">Do you really want to permanently remove </p> <h4 class="d-inline text-danger"><?= $resource['title']?></h4><span class="lead">?</span>
        <p class="lead">Please note, you cannot reverse this process after clicking the button below!</p>
    </div>

	<?= form_open('moderation/remove_resource/' . $resource['id']) ?>
        <button type="submit" class="btn btn-success btn-lg btn-theme mt-2 mr-5">
        	<span class="fas fa-trash mr-2"></span> Yes, Remove It
        </button>
    </form>
</div>