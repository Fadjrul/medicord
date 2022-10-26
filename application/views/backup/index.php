    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Backup & Restore db</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Backup & Restore db</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <div class="row">
        <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="<?php echo base_url();?>assets/images/clouds.jpeg" alt="Card image cap"
                            style="height: 20rem" />
                        <div class="card-body">
                            <h4 class="card-title">Backup Database</h4>
                            <a href="<?php echo site_url('backup/doBackupDatabases/gz')?>" class="btn btn-info block">Backup (.gz)</a>
                            <a href="<?php echo site_url('backup/doBackupDatabases/sql')?>" class="btn btn-info block">Backup (.sql)</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Restore Database</h4>
                            <a href="<?php echo site_url('backup/doRestoreDatabase')?>" class="btn btn-info block" data-bs-toggle="modal" data-bs-target="#FormRestoredb">Restore</a>
                        </div>
                        <img class="card-img-bottom img-fluid" src="<?php echo base_url();?>assets/images/cloud-computing.jpeg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Restore db -->
        <div class="modal fade text-start" id="FormRestoredb" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title" id="myModalLabel33">Form Restore Database</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <?php echo form_open_multipart("backup/doRestoreDatabases")?>
                    <form>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="file_db">File database </label>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                    <?php echo csrf();?>
                                        <input type="file" class="form-control" id="file_db" name="userfile" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Restore</span>
                            </button>
                            <button type="button" class="close btn btn-light-secondary" data-bs-dismiss="modal" aria-label="Close">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                        </div>
                    </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
    </div>