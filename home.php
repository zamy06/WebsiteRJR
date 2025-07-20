<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RJR CLOTHING</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <link rel="icon" href="foto/logo_RJR-.png">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
<?php include 'navbar.php'; ?>

    <!-- banner -->
    <section class="banner-home">
      <div class="tittle container">
        <h1 class="text-light">Selamat Datang di<br> <span> <b>RJR CLOTHING </b></span></h1>
      <h2 class="text-light fs-6">BRAND NEW WITH THE BEST QUALITY FOR YOUR FASION</h2>
      <a href="produk.php">
      <button class="btn btn-danger" type="submit">BELI SEKARANG</button>
    </a>
      </div>
    </section>
    
    <!-- portofolio -->
    <div class="container-fluid pt-0 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="portofolio">Kategori Produk</h2>
        <p>
        PAKAIAN RESMI RJR CLOTH DAN PRINTING MARKER
        </p>
        <div class="container">
          <div class="row pt-4 gx-4 gy-4">

            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/topi bloods.jpeg" class="card-img-top" alt="Topi Bloods" />
                <div class="card-body">
                  <h5 class="card-title">Topi Bloods</h5>
                  <p class="card-text">
                    Topi dengan desain modern dan nyaman dipakai. Cocok dipakai santai maupun formal.
                  </p>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/crewneck bloods.jpg" class="card-img-top" alt="Crewneck Bloods" />
                <div class="card-body">
                  <h5 class="card-title">Crewneck Bloods</h5>
                  <p class="card-text">
                    Crewneck dengan desain simple namun stylish. Cocok untuk berbagai suasana.
                  </p>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/sweter bloods.jpg" class="card-img-top" alt="Sweater Bloods" />
                <div class="card-body">
                  <h5 class="card-title">Sweater Bloods</h5>
                  <p class="card-text">
                    Sweater adalah pakaian hangat yang dirancang untuk memberikan kenyamanan.
                  </p>
                </div>
              </div>
            </div>
          </div>

        <!-- card 4 -->
          <div class="row pt-4 gx-4 gy-4">
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/tas bloods.jpg" class="card-img-top" alt="Back Bag" />
                <div class="card-body">
                  <h5 class="card-title">Back Bag</h5>
                  <p class="card-text">
                    Tas punggung yang menghubungkan fungsi praktis dengan gaya streetwear modern. Dengan desain khas yang simple namun bold.
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Card 5 -->
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/kaos.jpg" class="card-img-top" alt="Kaos Bloods" />
                <div class="card-body">
                  <h5 class="card-title">T-shirt Bloods</h5>
                  <p class="card-text">
                    Kaos Bloods adalah pakaian kasual dengan sentuhan gaya streetwear yang ikonik. Didesain dengan cutting yang nyaman dan bahan berkualitas tinggi.
                  </p>
                </div>
              </div>
            </div>
            
              <!-- Card 6-->
            <div class="col-md-4">
              <div class="card crop-img">
                <img src="foto/sepatu ventela.jpeg" class="card-img-top" alt="Sepatu Ventela" />
                <div class="card-body">
                  <h5 class="card-title">Sepatu ventela</h5>
                  <p class="card-text">
                    Sepatu Ventela adalah produk lokal Indonesia yang dikenal dengan kualitas premium dan desain yang timeless.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        
<?php include 'footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
