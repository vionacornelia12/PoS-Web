<?php
include("mysql/conn.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ADVJ_Resto </title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="assets/utils/css/style.css">
      <script src="assets/utils/js/calculator.js"></script>
   </head>
<body>
  <div id="header"></div>

  <div class="row text-center my-2">
    <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-6 text-start">
            <table class="table table-borderless border-0">
            <?php
              // sementara selalu si johan
              $query = mysqli_query($conn, "SELECT * FROM staff WHERE id_staff='2'");
              if($query->num_rows > 0 )
              {
                while($row = $query->fetch_assoc()){
            ?>
              <input id="id_staff" type="hidden" value="<?=$row['id_staff']?>>"
              <tr>
                <td>Staff</td>
                <td>:</td>
                <td class="fw-bold"><?=$row['nama']?></td>
              </tr>
              <tr>
                <td>Station</td>
                <td>:</td>
                <td class="fw-bold"><?=$row['station']?></td>
              </tr>
            <?php
                }
              }
            ?>
            </table>
          </div>
          <div class="col-sm-6 text-start">
            <table class="table table-borderless border-0">
              <tr>
                <td>Selasa, 31 Januari 2023</td>
              </tr>
              <tr>
                <td>14:56:02</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="d-flex flex-column">
          <table class="table caption-top">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
              $query = mysqli_query($conn, 
              "SELECT * FROM invoice 
              JOIN menu ON invoice.id_menu = menu.id_menu
              JOIN staff On invoice.id_staff = staff.id_staff
              ");
              if($query->num_rows > 0 )
              {
                $count = 1;
                while($row = $query->fetch_assoc()){
            ?>
              <tr>
                <th scope="row"><?=$count?></th>
                <td><?=$row['nama_menu']?></td>
                <td><?=$row['jumlah']?></td>
                <td>Rp <?php
                $total  = $row['harga'] * $row['jumlah'];
                echo $total;
                ?></td>
                <td><?=$row['status']?></td>
              </tr>
              <?php
              $count++;
              }
            }
            ?>
            </tbody>
          </table>
          <div class="container">
            <div class="row g-0">
            <?php
              $query = mysqli_query($conn, "SELECT * FROM menu");
              if($query->num_rows > 0 )
              {
                while($row = $query->fetch_assoc()){
            ?>
                <div class="col-md-2 menu" data-id="<?=$row['id_menu']?>">
                    <img class="w-100" src="assets/images/Pict/<?=$row['image_url']?>" alt="menu_pic">
                </div>
            <?php
                }
              }
            ?>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-4 p-0">
      <div id="calculator"></div>
    </div>
</div>

  <div class="footer"></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script>
    $(function(){
        $('#header').load("template/header.html");
        $('#footer').load("template/footer.html");

        $('#calculator').load("assets/utils/index.html");
    })
  </script>


</body>
</html>