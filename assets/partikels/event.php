<div class="div" id="event">
    <div class="container">
        <h5 class="text-center sub-title mt-5">MEET ARTIST</h5>
        <h2 class="text-center title-page mb-5">EVENT PERFORMERS</h2>
        <div class="row">
            <?php foreach ($performers as $perf) : ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
                <div class="card hoverme text-bg-dark" style="width: 16rem; height: 20rem;">
                    <img src="assets/img/<?= $perf["gambar_performers"] ?>" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex justify-content-center align-items-end">
                        <h5 class="card-title"><?= $perf["nama_performers"] ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <button class="btn btn-danger mt-5 mb-5 w-100">SEE ALL EVENT PERFORMERS</button>
        </div>
    </div>
</div>