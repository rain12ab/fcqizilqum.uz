<div class="row">
    <div class="col-md-12"
        <div class="admin-default-index">
            <h2><?= $this->context->action->uniqueId ?></h2>
            <p>
                This is the view content for action "<?= $this->context->action->id ?>".
                The action belongs to the controller "<?= get_class($this->context) ?>"
                in the "<?= $this->context->module->id ?>" module.
            </p>
            <p>
                You may customize this page by editing the following file:<br>
            </p>
        </div>
    </div>
</div>