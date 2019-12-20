<span
    id="emailSubmissionStatusMsg"
    class="<?php echo($emailIsStored ? "successMessage" : "errorMessage"); ?>"
>
    <?php echo($emailDBStatusMsg) ?>
</span>

<button
    id="backToMainPageButton"
    onclick="window.history.back();"
>Go to main page</button>