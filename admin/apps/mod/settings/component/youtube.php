<?php
$query = "SELECT * from youtube_streaming";
$con = mysqli_query($con, $query);
$yt = mysqli_fetch_assoc($con);
$iframe = $yt['id'];

?>
<div class="row">
    <div class="col-xl-6 card-center">
        <div class="card">
            <div class="card-body">
                <?php if ($iframe == null) : ?>
                    <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target=".add-iframe">Make Live Stream</button>
                <?php else : ?>
                    <button type="button" class="btn btn-primary waves-effect waves-light mb-3" disabled>Make Live Stream</button>
                <?php endif; ?>
                <h4 class="card-title">Live Stream Youtube</h4>
                <!-- <p class="card-title-desc">Aspect ratios can be customized with modifier classes.</p> -->

                <!-- 1:1 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <?php if (empty($yt['iframe_link'])) : ?>
                        <img src="http://putin.smarttrade.top/assets/images/banners/video_unavailable.jpeg" alt="video_unavailable.jpeg">
                    <?php else : ?>
                        <?= $yt['iframe_link']; ?>
                    <?php endif ?>
                </div>
                <hr class="solid-divider">
                <div class="text-center">
                    <?php if ($iframe != null) : ?>
                        <a href="#" style="margin-top:20px;" class="btn btn-warning waves-effect waves-light edit" onclick="editIframeButton(<?= $iframe ?>)" data-id='<?= $iframe ?>' data-bs-toggle='modal' data-bs-target='.edi-iframe'>Edit</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade edi-iframe" id="modal-edit-iframe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Youtube Streaming</h5>
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
                                                <input hidden type="text" id="id-iframe-edit">
                                                <div class="form-group">
                                                    <label for="link_iframe_edit" class="col-form-label">IFrame Link:</label>
                                                    <input class="form-control" type="text" id="link_iframe_edit" placeholder="IFrame Link Youtube">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="editFrame">Save changes</button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->


        <!-- Modal Add -->
        <div class="modal fade add-iframe" id="modal-edit-iframe" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Youtube Streaming</h5>
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
                                                <input hidden type="text" id="id-iframe-edit">
                                                <div class="form-group">
                                                    <label for="namaLengkap" class="col-form-label">Add Link Iframe:</label>
                                                    <input type="text" class="form-control" id="link_iframe">

                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="saveFrame">Save</button>
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div> <!-- end col -->
</div>