<?php include 'fungsi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="row m-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Simulator Kredit Rumah
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="harga" class="col-sm-4 col-form-label">Harga Rumah</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="harga" name="harga" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dp" class="col-sm-4 col-form-label">Uang Muka</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="dp" name="dp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="angsuran" class="col-sm-4 col-form-label">Lama Angsuran (tahun)</label>
                            <div class="col-sm-8">
                                  <select class="form-control" name="angsuran" id="angsuran" required>
                                  <?php for($i = 5; $i <= 10; $i++){ ?>
                                    <option value="<?=$i;?>"><?=$i;?></option>
                                  <?php } ?>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bunga" class="col-sm-4 col-form-label">Bunga (%)</label>
                            <div class="col-sm-8">
                                  <select class="form-control" name="bunga" id="bunga" required>
                                  <?php for($i = 5; $i <= 10; $i++){ ?>
                                    <option value="<?=$i;?>"><?=$i;?></option>
                                  <?php } ?>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <button type="reset" class="btn btn-dark">Reset</button>
                            </div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success">Hitung</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <?php
        if(isset($_POST['harga'])){ 
            $harga = $_POST['harga'];
            $dp = $_POST['dp'];
            $angsuran = $_POST['angsuran'];
            $bunga = $_POST['bunga'];

            // minimal harga rumah 100jt
            if($harga < 100000000){
                echo "<script>alert('Error! Harga rumah minimal Rp100.000.000,-');window.location.replace('index.php');</script>";
            }

            // minimal dp 30%
            $minimalDp = $harga * 30 / 100;
            if($dp < $minimalDp){
                echo "<script>alert('Error! Minimal DP 30% dari harga rumah');window.location.replace('index.php');</script>";
            }

            // batas angsuran 5-10
            if($angsuran < 5 || $angsuran > 10){
                echo "<script>alert('Error! Lama angsuran harus berkisar antara 5-10 tahun');window.location.replace('index.php');</script>";
            }

            // batas bunga 5-10%
            if($angsuran < 5 || $angsuran > 10){
                echo "<script>alert('Error! Bunga harus berkisar antara 5-10%');window.location.replace('index.php');</script>";
            }
        ?>
            <div class="card">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="harga2" class="col-sm-4 col-form-label">Harga Rumah</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="harga2" value="<?=rupiah($harga);?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dp2" class="col-sm-4 col-form-label">Uang Muka</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="dp2" value="<?=rupiah($dp);?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="angsuran2" class="col-sm-4 col-form-label">Lama Angsuran</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="angsuran2" value="<?=$angsuran . " tahun";?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bunga2" class="col-sm-4 col-form-label">Bunga</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="bunga2" value="<?=$bunga . "%";?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total" class="col-sm-4 col-form-label">Total Harga Rumah</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="total" value="<?=rupiah(harga_rumah([$harga, $dp, $angsuran, $bunga]));?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cicilan" class="col-sm-4 col-form-label">Angsuran per Bulan</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="cicilan" value="<?=rupiah(angsuran(harga_rumah([$harga, $dp, $angsuran, $bunga]), $angsuran));?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                <a href="." class="btn btn-warning">Hitung ulang?</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>