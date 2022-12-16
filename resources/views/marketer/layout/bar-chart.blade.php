<div class="row flex-grow">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title card-title-dash">Transaksi Sukses</h4>
                        <p class="card-subtitle card-subtitle-dash">Overview penjualan</p>
                    </div>
                    <div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button"
                                id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> Tahun </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">2021</a>
                                <a class="dropdown-item" href="#">2022</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Jumlah penjualan</a>
                                <a class="dropdown-item" href="#">Jumlah transaksi</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                    <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                        <span class="tw-text-xl mx-2 tw-font-bold">20 Unit<span>

                    </div>
                    <div class="me-3">
                        <div id="marketing-overview-legend"></div>
                    </div>
                </div>
                <div class="chartjs-bar-wrapper mt-3">
                    <canvas id="marketingOverview"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
