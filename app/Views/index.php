<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php base_url() ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="form-inline ml-auto">
            <button class="btn btn-outline-success my-2 my-sm-0">Hello</button>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-5 text-center"><?= $title ?></h1>
                    <p class="text-center"><?= $subtitle ?></p>
                    <p class="lead text-center">
                        <a class="btn btn-primary btn-sm" href="<?php base_url() ?>" role="button">Learn more</a>
                    </p>
                    <hr class="my-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <div class="tables">
                        <h3># List of Tables :</h3>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php foreach ($tables as $key => $row) {
                                if ($row == 'migrations') {
                                    continue;
                                } ?>
                                <a class="nav-link <?php $key == 1 ? 'active' : '' ?>" id="<?= $row ?>" data-toggle="pill" href="#<?= $key ?>" role="tab" aria-controls="<?= $row ?>" aria-selected=""><?= $row ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center"># Resources List :</h3>
                    <div class="card">
                        <div class="card-body">
                            <p><small>*** Click the table and get your example Resources.</small></p>
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php foreach ($tables as $key => $row) {
                                    if ($row == 'migrations') {
                                        continue;
                                    } ?>
                                    <div class="tab-pane fade show <?php $key == 1 ? 'active' : '' ?>" id="<?= $key ?>" role="tabpanel" aria-labelledby="<?= $row ?>">
                                        <ol>
                                            <li>
                                                <a href="<?= base_url() . '/' . $row ?>" target="_blank" rel="noopener noreferrer">
                                                    <?= base_url() . '/' . $row ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="insertid()" data-target="#insertid" data-url="<?= base_url() . '/' . $row ?>" id="insertid" rel="noopener noreferrer">
                                                    <?= base_url() . '/' . $row . '/{id}' ?>
                                                </a>
                                            </li>
                                        </ol>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="insertid" tabindex="-1" role="dialog" aria-labelledby="insertidTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Give me some ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="inputid" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="" target="_blank" type="button" id="submit" class="btn btn-primary">Get Data</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php base_url() ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php base_url() ?>js/popper.min.js"></script>
    <script src="<?php base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php base_url() ?>js/app.js"></script>
</body>

</html>