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
    <!-- navigasi -->
    <nav
  class="navbar navbar-expand-lg navbar-dark bg-transparent shadow-lg fixed-top"
>
  <div class="container">
    <img src="foto/logo_RJR-.png" width="30" height="30" alt="logo">
    <a class="navbar-brand fw-bold" href="#">RJR CLOTHING</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-right" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produk.php">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tentang.php">Tentang</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- banner -->
    <section class="banner-home">
      <div class="tittle container">
        <h1 class="text-light">Selamat Datang di<br> <span> <b>RJR CLOTHING</b></span></h1>
      <h2 class="text-light fs-6">BRAND NEW WITH THE BEST QUALITY FOR YOUR FASION</h2>
      <a href="produk.php">
      <button class="btn btn-danger" type="submit">BELI SEKARANG</button>
    </a>
      </div>
    </section>
    <!-- <div class="container-fluid banner">
      <div class="container text-start">
        <h4 class="display-5" >SELAMAT DATANG di <br> <span class="fw-bold">RJR CLOTHING</span> </h4>
        <a href="#layanan">
          <button type="button" class="btn btn-danger btn-lg">
            BELI SEKARANG
          </button>
        </a>
      </div>
    </div> -->
    <!-- layanan -->
    <!-- <div class="container-fluid layanan pt-5 pb-5">
      <div class="container text-center">
        <h2 class="display-3" id="layanan">Layanan</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate,
          doloribus.
        </p>
        <div class="row pt-4">
          <div class="col-md-4">
            <span class="lingkaran"><i class="fas fa-code fa-5x"></i></span>
            <h3 class="mt-3">Programming</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat,
              a!
            </p>
          </div>

          <div class="col-md-4">
            <span class="lingkaran"><i class="fas fa-palette fa-5x"></i></span>
            <h3 class="mt-3">Design</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat,
              a!
            </p>
          </div>

          <div class="col-md-4">
            <span class="lingkaran"
              ><i class="fas fa-network-wired fa-5x"></i
            ></span>
            <h3 class="mt-3">Networking</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat,
              a!
            </p>
          </div>
        </div>
      </div>
    </div> -->
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
        
    <!-- tentang -->
    <!-- <div class="container-fluid pt-5 pb-5">
      <div class="container">
        <h2 class="display-3 text-center" id="tentang">Tentang</h2>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, ex!
        </p>
        <div class="clearfix pt-5">
          <img
            src="https://img.freepik.com/free-vector/about-us-website-banner-concept-with-thin-line-flat-design_56103-96.jpg?size=626&ext=jpg"
            class="col-md-6 float-md-end mb-3 crop-img"
            width="300"
            height="300"
          /> -->
          <!-- <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
            veritatis at voluptate commodi officiis sapiente.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
            veritatis at voluptate commodi officiis sapiente.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
            veritatis at voluptate commodi officiis sapiente.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Dignissimos laboriosam excepturi exercitationem qui expedita, ex
            temporibus natus necessitatibus accusamus voluptatibus.
          </p>
        </div>
      </div>
    </div> -->
    <!-- tim -->
    <!-- <div class="container-fluid pt-5 pb-5 bg-light">
      <div class="container text-center">
        <h2 class="display-3" id="staff">Tim Kami</h2>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et deleniti
          quas at magni, iusto voluptates neque corrupti dolorum! Repellat,
          quod.
        </p>
        <div class="row pt-4 gx-4 gy-4">
          <div class="col-md-4 text-center tim">
            <img
              src="https://s3.amazonaws.com/cms-assets.tutsplus.com/uploads/users/810/profiles/19338/profileImage/profile-square-extra-small.png"
              class="rounded-circle mb-3"
            />
            <h4>John Doe</h4>
            <p>Web Designer</p>
            <p>
              <a href="" class="social"><i class="fab fa-twitter"></i></a>
              <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
            </p>
          </div>
          <div class="col-md-4 text-center tim">
            <img
              src="http://gokubi.com/wp-content/uploads/2013/10/Steve-Andersen-Headshot-square1.jpeg"
              class="rounded-circle mb-3"
            />
            <h4>Michael Dell</h4>
            <p>Data Scientist</p>
            <p>
              <a href="" class="social"><i class="fab fa-twitter"></i></a>
              <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
            </p>
          </div>
          <div class="col-md-4 text-center tim">
            <img
              src="https://www.kingrosales.com/wp-content/uploads/2018/05/king-rosales-profile-photo-square.jpg"
              class="rounded-circle mb-3"
            />
            <h4>Paul</h4>
            <p>Network Engineer</p>
            <p>
              <a href="" class="social"><i class="fab fa-twitter"></i></a>
              <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Client -->
    <!-- <div class="container-fluid client pt-5 pb-5">
      <div class="container text-center">
        <div class="row pt-4 gx-4 gy-4">
          <div class="col">
            <img
              src="https://cdn.iconscout.com/icon/free/png-256/microsoft-28-761688.png"
            />
          </div>
          <div class="col">
            <img
              src="https://cdn3.iconfinder.com/data/icons/glypho-social-and-other-logos/64/logo-facebook-512.png"
            />
          </div>
          <div class="col">
            <img src="https://image.flaticon.com/icons/png/512/61/61109.png" />
          </div>
          <div class="col">
            <img
              src="https://i.pinimg.com/originals/20/1d/17/201d17590b3a7bc8939ca37e577bbbd8.png"
            />
          </div>
          <div class="col">
            <img
              src="https://www.ictmagazine.nl/wp-content/uploads/2020/10/ibm-720x340-1.png"
            />
          </div>
        </div>
      </div>
    </div> -->
    <!-- kontak -->
    <!-- <div class="container-fluid pt-5 pb-5 kontak">
      <div class="container">
        <h2 class="display-3 text-center" id="kontak">Kontak Kami</h2>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, porro.
        </p>
        <div class="row pb-3">
          <div class="col-md-6">
            <input
              class="form-control form-control-lg mb-3"
              type="text"
              placeholder="Nama"
            />
            <input
              class="form-control form-control-lg mb-3"
              type="text"
              placeholder="Email"
            />
            <input
              class="form-control form-control-lg"
              type="text"
              placeholder="No. Phone"
            />
          </div>
          <div class="col-md-6">
            <textarea class="form-control form-control-lg" rows="5"></textarea>
          </div>
        </div>
        <div class="col-md-3 mx-auto text-center">
          <button type="button" class="btn btn-danger btn-lg">
            Kirim Pesan
          </button>
        </div>
      </div>
    </div> -->

    <!-- <footer style="background-color: #333; color: white; padding: 20px; text-align: center;">
      <div style="margin-bottom: 10px;">
        <h4>Kontak Admin</h4>
        <p>Email: admin@rjrclothing.com</p>
        <p>Telepon: +62 812-3456-7890</p>
      </div>
      <div>
        <h4>Lokasi Toko</h4>
        <p>RJR Clothing Store</p>
        <p>Jl. Merdeka No. 123, Jakarta, Indonesia</p>
        <p>Jam Operasional: 09.00 - 21.00 WIB</p>
      </div>
      <div style="margin-top: 10px;">
        <p>© 2024 RJR Clothing. All Rights Reserved.</p>
      </div>
    </footer> -->
    

    

    <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Menarik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .footer {
            background-color: #5a5959;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer h3 {
            margin-bottom: 15px;
            font-size: 18px;
            text-transform: uppercase;
        }

        .footer-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 10px 0;
        }

        .footer-icons a {
            text-decoration: none;
            color: #fff;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: #333;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .footer-icons a:hover {
            background-color: #030303;
            transform: scale(1.1);
        }

        .footer-location {
            margin-top: 15px;
            font-size: 14px;
        }

        .footer-location a {
            color: #ff7f50;
            text-decoration: none;
        }

        .footer-location a:hover {
            text-decoration: underline;
        }
    </styborder-radius>
</head>
<body>
    <footer class="footer">
        <h3>Temukan Kami</h3>
        <div class="footer-icons">
            <a href="https://wa.me/+625601747306" target="_blank" title="WhatsApp">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp">
            </a>
            <a href="https://instagram.com/nama_akun" target="_blank" title="Instagram">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram-new.png" alt="Instagram">
            </a>
            <a href="https://goo.gl/maps/linklokasi" target="_blank" title="Lokasi">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/marker.png" alt="Lokasi">
            </a>
        </div>
        <div class="footer-location">
            <p>Kunjungi toko kami di <a href="https://goo.gl/maps/linklokasi" target="_blank">Google Maps</a></p>
        </div>
    </footer>
</body>
</html> -->

<?php include 'footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
