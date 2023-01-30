<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> ADVJ_Resto </title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Insert querystring (qs)
  website: https://cdnjs.com/libraries/qs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.11.0/qs.min.js"
    integrity="sha512-/l6vieC+YxaZywUhmqs++8uF9DeMvJE61ua5g+UK0TuHZ4TkTgB1Gm1n0NiA86uEOM9JJ6JUwyR0hboKO0fCng=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/socket.io/socket.io.js"></script>
  <script src="assets/js/main.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div id="header"></div>
  <div class="row">
    <div class="text-start col-sm-6">
      <table class="table table-borderless border-0">
        <tr>
          <td>Staff</td>
          <td>:</td>
          <td class="fw-bold">Johan Anastasya</td>
        </tr>
        <tr>
          <td>Station</td>
          <td>:</td>
          <td class="fw-bold">S-03487</td>
        </tr>
      </table>
    </div>
    <div class="text-start col-sm-6">
      <?php
            $now = new DateTime();
            setlocale(LC_TIME, 'id_ID');
            $hari = array(
                1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
            $bulan = array(
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            ?>
            <table class="table table-borderless border-0">
              <tr>
                <td><?=$hari[date_format($now, 'N')].", ".date_format($now,"d")." ".$bulan[date_format($now, 'n')]." ".date_format($now,"Y")?></td>
              </tr>
              <tr>
                <td class="waktu"></td>
              </tr>
            </table>
    </div>
  </div>
  <div class="d-flex flex-column">

    <div class="row mb-3">

      <div class="col-sm-4">
        <div class="card p-2 rounded-0 text-bg-primary justify-content-center align-items-start" style="height:100px;">
          <i class='bx bx-dollar'></i>
          <h5 class="">Rp 12.500.328,00</h5>
          <small>Total Revenue</small>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card p-2 rounded-0 text-bg-primary justify-content-center align-items-start" style="height:100px;">
          <i class='bx bx-receipt'></i>
          <h5 class="">289</h5>
          <small>Total Penjualan</small>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card p-2 rounded-0 text-bg-primary justify-content-center align-items-start" style="height:100px;">
          <i class='bx bxs-user'></i>
          <h5 class="">849</h5>
          <small>Total Pengunjung</small>
        </div>
      </div>

    </div>

    <div class="text-start">
      <b>Item Terjual</b>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Item</th>
            <th scope="col">Pemesanan</th>
            <th scope="col">Pendapatan</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row">1</th>
            <td>Item1</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Item2</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Item3</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Item4</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Item5</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Item6</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">7</th>
            <td>Item7</td>
            <td>2</td>
            <td>Test</td>
          </tr>
          <tr>
            <th scope="row">8</th>
            <td>Item8</td>
            <td>2</td>
            <td>Test</td>
          </tr>
        </tbody>
      </table>
      <b>Overall Statistics</b>
      <div class="graphBox text-start">
        <div class="box">
          <canvas id="myChart"></canvas>
        </div>
        <div class="box">
          <canvas id="earning"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="footer"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
  <script src="assets/js/my_chart.js"></script>
  <script>
    $(function () {
      $('#header').load("template/header.html");
      $('#footer').load("template/footer.html");

      setInterval(function() {
            var date = new Date();
            $('.waktu').html(
                date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
                );
        }, 500);
    })
  </script>


</body>

</html>