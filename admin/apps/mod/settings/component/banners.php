<!-- Table Banner -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Banners</h4>

                <button type="button" id="addBanners" data-bs-toggle="modal" data-bs-target=".add" class="btn btn-primary waves-effect waves-light">Add Baner</button>
                <table id="banner_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>autono</th>
                            <th>Banner File</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
    <!-- Modal Edit Banner -->
    <div class="modal fade detail" id="edit-banner" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    <!-- Simple card -->
                    <div class="card">
                        <img class="card-img-top img-fluid" src="" alt="Banners" id="gambar-banner">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Edit Banner</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <form action="#" enctype="multipart/form-data">
                                                    <input hidden type="text" name="autono-img" id="autono-img">
                                                    <input name="file" type="file" id="edit-img-banner" name="edit-img-banner">
                                            </div>

                                            <div class="text-center mt-4">
                                                <button type="button" id="EditBanners" class="btn btn-primary waves-effect waves-light">Send Files</button>
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>

                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <!-- add banner modal -->
    <div class="modal fade add" id="add-banner" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" multiple>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="original_banner" name="original_banner">
                                <div id="tambah_gambar"></div>
                                <button type="button" class="btn btn-primary mt-3 mb-3" id="btn-tambah" data-toggle="tooltip" data-placement="bottom" title="Tambah Gambar">+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <!-- <button type="button" class="btn btn-warning" id="saveBanners">Save</button> -->
                                <!-- <button type="button" onClick="editpass()" class="btn btn-secondary">Edit</button> -->
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="saveBanners">Send File</button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.end modal add banner -->
</div>
<!-- /.end modal edit banner -->
<!-- Modal Edit Banner -->