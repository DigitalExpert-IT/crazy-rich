<div class="row">
    <div class="col-md-6">
        <?php if ($info == null) : ?>
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target=".modal-add-announce">Make Announcement</button>
        <?php else : ?>
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" disabled>Make Announcement</button>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h4 class="card-title">Announcement</h4>
            <div class="card card-body">
                <h3 class="card-title mt-0"><?= $result['title'] ?></h3>
                <p class="card-text"><?= $result['description'] ?>.</p>
                <?php if ($info != null) : ?>
                    <a href="#" class="btn btn-warning waves-effect waves-light" onclick="announceButton(<?= $info ?>)" data-id="<?= $info ?>" data-bs-toggle="modal" data-bs-target=".modal-edit-announce">Edit</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade modal-edit-announce" id="modal-edit-iframe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <div class="col-sm-8 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <hr class="solid-divider">
                                        <div class="col-md-8 col-sm-12">
                                            <form autocomplete="off">
                                                <input hidden type="text" id="id-announce">

                                                <div class="form-group">
                                                    <label for="title" class="col-form-label">Title Announcement:</label>
                                                    <input type="text" class="form-control" id="title" placeholder="Title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc" class="col-form-label">Description Announcement</label>
                                                    <textarea name="desc" class="form-control" id="desc" cols="30" rows="10" required></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="editAnnounce">Save changes</button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->

        <!-- Modal Add -->
        <div class="modal fade modal-add-announce" id="modal-add-iframe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="card">
                            <div class="col-sm-8 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <hr class="solid-divider">
                                        <div class="col-md-8 col-sm-12">
                                            <form autocomplete="off">

                                                <div class="form-group">
                                                    <label for="title_make" class="col-form-label">Title Announcement:</label>
                                                    <input type="text" class="form-control" id="title_make" placeholder="Title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc_make" class="col-form-label">Description Announcement</label>
                                                    <textarea name="desc_make" class="form-control" id="desc_make" cols="30" rows="10" required></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="saveAnnounce">Save</button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>