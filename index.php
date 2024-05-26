<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bensin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://asset.kompas.com/crops/lNJkPulqNzoSL6YmlVahytJoiH8=/0x61:1024x744/1200x800/data/photo/2022/04/28/626a051ed36ec.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: #fff;
        }

        .main {
            height: 100vh;
        }

        .motorkeong {
            height: 600px;
            width: 550px;
            box-sizing: border-box;
            border-radius: 10px;
        }

        @media print {
            body>*:not(.output-container) {
                display: none;
            }

            form {
                display: none;
            }

            .mawang {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container main d-flex flex-column justify-content-center align-items-center ">
        <div class="container motorkeong p-5 shadow-lg p-3 mb-5">
            <p class="container text-center fs-5 fw-bold">Welcome to Shell</p>
            <form action="" method="post">

                <div>
                    <label for="bil1">Masukan jumlah liter</label>
                    <input type="number" class="form-control" name="liter" id="liter">
                </div>

                <div class="container coba mt-3"><label for="bil1 ">Pilih jenis </label></div>

                <select class="container form-select mt-1" name="vshel" aria-label="Default select example">
                    <option selected disabled>Pilih bahan bakar</option>
                    <option value="super">Shell super</option>
                    <option value="power">Shell v-power</option>
                    <option value="diesel">Shell v-power diesel</option>
                    <option value="nitro">Shell v-power nitro</option>
                </select>

                <div class="container coba mt-3"><label for="bil1 ">Pilih pembayaran </label></div>

                <select class="container form-select mt-1" name="payment" aria-label="Default select example">
                    <option selected disabled>Pilih pembayaran</option>
                    <option value="cash">Cash</option>
                    <option value="credit">Credit card</option>
                    <option value="qris">Qris</option>
                </select>

                <div>
                    <label for="bil1">Masukan jumlah uang</label>
                    <input type="number" class="form-control" name="uang" id="liter">
                </div>

                <div>
                    <button class="container btn btn-success form-control mt-3" type="submit" name="hitung">Hitung
                    </button>
                </div>

            </form>
            <?php
            if (isset($_POST['hitung']) && $_POST['liter'] && $_POST['vshel'] && $_POST['payment'] && $_POST['uang']) {

                $liter = $_POST['liter'];
                $jenis = $_POST['vshel'];
                $payment = $_POST['payment'];
                $uang = $_POST['uang'];
                $message = "wrong answer";

                class bensin
                {
                    public $harga, $liter, $jenis, $uang, $message, $payment, $ppn = 10 / 100;

                    public function __construct($liter, $jenis, $payment, $uang, $message)
                    {
                        $this->message = $message;
                        $this->uang = $uang;
                        $this->payment = $payment;
                        $this->liter = $liter;
                        $this->jenis = $jenis;
                        switch ($this->jenis) {
                            case "super":
                                $this->harga = 15420;
                                break;
                            case "power":
                                $this->harga = 16130;
                                break;
                            case "diesel":
                                $this->harga = 18310;
                                break;
                            case "nitro":
                                $this->harga = 16250;
                                break;
                        }
                    }
                }

                class beli extends bensin
                {
                    public function beli()
                    {

                        $total = number_format(($this->liter * $this->harga) + $this->harga * $this->liter * $this->ppn, 2, ',', '.');
                        $akhir = number_format($this->uang - (($this->liter * $this->harga) + $this->harga * $this->liter * $this->ppn), 2, ',', '.');
                        if ($this->uang < $total) {
                            echo '<div class="alert alert-danger my-3" role="alert">
                            uang anda kurang
                        </div>';
                        } else {
                            $str = "<div class='card my-3 bg-primary text-white'>
            <div class='card-body text-center'>
                <h3>Shell V-$this->jenis</h3>
                <p class=' ms-2 mb-0'>Jumlah $this->liter liter</p> 
                <p class=' ms-2 mb-0'>Kamu harus membayar Rp $total</p> 
                <p class=' ms-2 mb-0'>Dengan metode pembayaran " . ucfirst($this->payment) . "</p>
                <p class=' ms-2 mb-0'>Uang anda Rp. " . $this->uang . "</p>
                <p class=' ms-2 mb-0'>kembalian " . $akhir . "</p>


                <button onclick=window.print() class='mawang container btn btn-success form-control mt-3' type='submit' name='print'>Print</button>
            </div>
        </div>";

                            echo $str;
                        }
                    }
                }

                $produk1 = new beli($liter, $jenis, $payment, $uang, $message);
                $produk1->beli();

            } else {
                echo '
                <div class="alert alert-danger my-3" role="alert">
                    Silahkan Masukan Jumlah Liter, Jenis Bensin, dan Metode Pembayaran
                </div>';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>