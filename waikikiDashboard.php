<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pantai Srau</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=0.1" />
    
    <style>
      *{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            line-height: 20px;
            font-size: 20px;
        }

        html{
            margin: 0;
            padding: 0;
            background-color:rgb(242, 250, 242);
            scroll-behavior: smooth;
        }

        body{
            margin: 0;
            padding: 0;
        }

        .LayarDalam{
            width: 1000px;
            margin: auto;
        }

        .LayarPenuh{
            width: 100%;
        }

        nav{
            z-index: 100;
            color: white;
            text-align: center;
            position: fixed;
            border-bottom: 1px solid rgb(177, 177, 177);
            line-height: 60px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        nav.logoDashboard{
            background-color: white;
        }

        nav .logoDashboard{
            float: left;
            position: relative;
            line-height: 55px;
            text-align: center;
        }

        nav .logoDashboard img{
            width: 60px;
            vertical-align: middle;
        }

        .logoDashboard:hover{
            background-color: white;
            transition: background-color 0.5s;
            border-radius: 100px;
        }

        nav .Fitur{
            float: right;
            height: 60px;
            max-width: 700px;
        }

        nav .Fitur ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex ;
        }

        nav .Fitur ul li{
            list-style-type: none;
            float: left;
            line-height: 60px;
        }

        nav ul li a{
            color: rgb(255, 255, 255);
            text-align: center;
            padding: 0px 16px 0px 16px;
            text-decoration: none;
            font-weight: 600;
        }

        nav ul li a:hover{
            text-decoration: underline;
        }

        /*HEADER*/
        header{
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            z-index: 2;
        }
        header video{
          position: absolute;
          top: 0;
          left: 0;
          object-fit: cover;
          z-index: -2;
        }
        header .intro{
          z-index: 100;
          color: white;
          text-align: center;
          position: relative;
          top: 50%;
        }
        header .intro h3{
          font-size: 50px;
          margin: 0;
          padding: 0;
        }
        .tombolmoreinfo{
          background-color: #00B9B9;
          height: 40px;
          line-height: 42px;
          color: white;
          text-decoration: none;
          display: inline-block;
          padding: 0px 20px 0px 20px;
          font-size: 15px;
          font-weight: 500;
          border-radius: 6px;
        }
        .tombolmoreinfo:hover{
          text-decoration: underline;
        }
        header .overlay{
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          background-color: black;
          opacity: 50%;
        }

        .tombolfitur{
          display: none;
          position: absolute;
          top: 1rem;
          right:2rem;
          flex-direction: column;
          justify-content: space-between;
          width: 25px;
          height: 20px;
        }
        .tombolfitur:hover{
          .garis{
            background-color: #00CCCC;
          }
        }
        .tombolfitur .garis{
          height: 2px;
          background-color: white;
        }
        section{
          padding: 50px 0px 50px 0px;
        }
        section h3{
          font-size: 30px;
        }
        section h3::after{
          content:"";
          border-bottom: 5px solid #00CCCC;
          width: 52px;
          display: block;
          margin: 20px auto;
        }
        #fasilitas{
          text-align: center;
        }
        section p.RingkasanFasilitas{
          font-style: italic;
          font-size: 18px;
          color: #ababab;
          margin-bottom: -35px;
          padding-bottom: 45px;
        }
        #moreinfo{
          text-align: center;
        }
        section p.isimoreinfo{
          font-style: normal;
          font-size: 18px;
          color: #333;
          text-align: justify;
        }
        nav.navgelap{
            background-color: #4C5154;
        }

        section#galeri{
          display: flex;
          flex-direction: row;
          justify-content: space-around;
          overflow: hidden;
          padding: 15px 0px 50px 0px;
        }
        section#galeri div{
          padding: 10px;
          text-align: center;
          width: 26%;
        }
        section#galeri div img{
          height: 120px;
          border-radius: 7px;
          margin-bottom: -35px;
        }
        section#galeri div img:hover{
          transition: all 0.2s ease-in-out;
          transform: scale(1.1);
        }
        section#galeri div img h6{
          margin: 0px;
          padding: 0px;
          font-size: 18px;
          font-weight: bold;
        }
        section#galeri p{
          margin: 0px;
          margin-top: -40px;
          padding: 0px;
          font-size: 18px;
          font-weight: 400;
          color: #333;
        }

        /* BAGIAN PROFIL KELOMPOK */
        #kelompok{
          text-align: center;
          background-color: #4C5154;
        }
        #kelompok h3{
          color: rgb(242, 250, 242);
        }
        #TimKami h6{
          color: rgb(242, 250, 242);
        }
        section p.RingkasanKelompok{
          font-style: italic;
          font-size: 18px;
          color: #ababab;
          margin-bottom: -35px;
        }
        section#TimKami{
          background-color: #4C5154;
          display: flex;
          flex-direction: row;
          justify-content: space-around;
          overflow: hidden;
          padding: 40px 0px 100px 0px;
        }
        section#TimKami div{
          padding: 2px;
          text-align: center;
          width: 26%;
        }
        section#TimKami div img{
          height: 120px;
          border-radius: 100px;
          margin-bottom: -35px;
        }
        section#TimKami div img:hover{
          transition: all 0.2s ease-in-out;
          transform: scale(1.1);
        }
        section#TimKami div img h6{
          margin: 0px;
          padding: 0px;
          font-size: 18px;
          font-weight: bold;
        }
        section#TimKami p{
          margin: 0px;
          margin-top: -40px;
          padding: 0px;
          font-size: 18px;
          font-weight: 400;
          color: rgb(242, 250, 242);
        }
        
        @media screen and (max-width:1200px){
          .LayarDalam{
            width: 90%;
          }
          nav .Fitur ul{
            display: none;
            margin-top: 60px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            flex-direction: column;
          }
          nav .Fitur ul li{
            width: 100%;
            border-bottom: 1px solid #ccc;
            background-color: rgb(242, 250, 242);
            line-height: 40px;
          }
          nav .Fitur ul li a{
            color: black;
          }
          .tombolfitur{
            display: flex;
          }
        }
    </style>

    <link rel="stylesheet" href="" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Acme&display=swap"
    />
  </head>
  <body>
    <nav>
      <div class="LayarDalam">
        <div class="logoDashboard">
          <a href="https://www.google.com" target="_blank">
            <img src="Assets/LOGOWaikiki.png" class="navgelap"/>
          </a>
        </div>
        <div class="Fitur">
          <a href="#" class="tombolfitur">
            <span class="garis"></span>
            <span class="garis"></span>
            <span class="garis"></span>
          </a>
          <ul>
            <li><a href="#fasilitas">Fasilitas</a></li>
            <li><a href="Tiket.php">Tiket</a></li>
            <li><a href="Tagihan.php">Tagihan</a></li>
            <li><a href="CetakTiket.php">CetakTiket</a></li>
            <li><a href="Riwayat.php">Riwayat</a></li>
            <li><a href="#kelompok">Tim</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="Logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="LayarPenuh">
      <header id="Beranda">
        <div class="overlay"></div>
        <video autoplay muted loop>
          <source src="Assets/VideoPantai3.mp4" type="video/mp4" />
        </video>

        <div class="intro">
          <h3>PANTAI SRAU</h3>
          <p>Manjakan Dirimu di Hari Liburan Bersama Pantai Srau</p>
          <p>
            <a href="#moreinfo" class="tombolmoreinfo">MORE INFO</a>
          </p>
        </div>
      </header>
      <main>
      <section id="moreinfo">
          <div class="LayarDalam">
            <h3>FYI Tentang Pantai Srau</h3>
            <p class="isimoreinfo">Pantai Srau, yang terletak di Pacitan, Jawa Timur, adalah salah satu destinasi wisata yang memikat dengan keindahan alamnya yang masih alami dan menenangkan. Pantai ini terkenal dengan pasir putihnya yang lembut dan air laut yang jernih, yang berwarna biru kehijauan. Suasana tenang dan damai di pantai ini menjadikannya tempat yang sempurna untuk beristirahat dan menikmati keindahan alam jauh dari keramaian kota. Dikelilingi oleh tebing-tebing karst yang menjulang tinggi dan vegetasi hijau yang subur, Pantai Srau menawarkan pemandangan yang menakjubkan dan mengundang siapa saja untuk datang dan menikmati keindahannya.</p>

            <p class="isimoreinfo">Salah satu daya tarik utama Pantai Srau adalah tiga bagian pantai yang masing-masing memiliki karakteristik unik. Bagian pertama adalah tempat yang paling sering dikunjungi oleh wisatawan karena pasirnya yang putih bersih dan ombaknya yang relatif tenang. Bagian kedua memiliki karakteristik yang lebih berbatu dan sering digunakan oleh para pemancing lokal. Sedangkan bagian ketiga memiliki ombak yang lebih besar, menjadikannya surga bagi para peselancar yang mencari tantangan. Ketiga bagian pantai ini menawarkan pengalaman yang berbeda dan menarik bagi para pengunjung.</p>

            <p class="isimoreinfo">Pantai Srau juga dikenal dengan ombaknya yang besar dan kuat, yang merupakan daya tarik utama bagi para peselancar. Pada musim-musim tertentu, peselancar dari berbagai daerah datang ke Pantai Srau untuk menaklukkan ombaknya yang menantang. Meski demikian, bagi para wisatawan yang tidak tertarik dengan selancar, pantai ini tetap menawarkan banyak kegiatan menyenangkan seperti berenang, bermain pasir, atau sekadar bersantai menikmati pemandangan laut yang memukau.</p>

            <p class="isimoreinfo">Akses menuju Pantai Srau memang memerlukan sedikit usaha, karena jalannya yang berliku dan berbatu. Namun, perjalanan yang menantang ini justru menambah keunikan dan keseruan tersendiri. Setibanya di pantai, segala lelah dan jerih payah perjalanan akan terbayar dengan pemandangan yang menakjubkan dan suasana yang damai. Infrastruktur di sekitar pantai masih tergolong minim, sehingga pengunjung disarankan untuk membawa perbekalan sendiri, terutama jika berniat untuk berkemah.</p>

            <p class="isimoreinfo">Keindahan Pantai Srau tidak hanya terlihat di siang hari. Malam di pantai ini juga sangat mempesona dengan langit yang penuh bintang. Bagi para pecinta alam dan fotografer, Pantai Srau menawarkan banyak kesempatan untuk mengambil foto-foto yang spektakuler. Berkemah di tepi pantai, ditemani suara deburan ombak dan angin laut yang sejuk, memberikan pengalaman yang tak terlupakan dan mendalam.</p>

            <p class="isimoreinfo">Pantai Srau adalah destinasi yang sempurna bagi mereka yang ingin merasakan keindahan alam yang masih alami dan belum terjamah banyak wisatawan. Di sini, pengunjung bisa benar-benar melarikan diri dari hiruk-pikuk kehidupan sehari-hari dan menikmati ketenangan alam yang murni. Dengan keindahan alam yang luar biasa dan suasana yang tenang, Pantai Srau adalah tempat yang wajib dikunjungi bagi setiap pencinta alam dan petualangan.</p>

            <p class="isimoreinfo">Tips Berkunjung: <br> - Waktu terbaik untuk mengunjungi Pantai Srau adalah antara bulan Mei dan September, saat cuaca hangat dan cerah. <br>
            - Gunakan tabir surya dengan SPF tinggi, karena sinar matahari di Pacitan cukup kuat.<br>
            - Bawa uang tunai, karena beberapa toko kecil mungkin tidak menerima kartu kredit.<br>
            - Pelajari beberapa frasa bahasa yang digunakan orang daerah Pacitan<br>
            - Hargai budaya dan adat istiadat lokal.<br><br>
            Pantai Srau menanti Anda untuk merasakan pengalaman liburan yang tak terlupakan. Ayo, kemas tas Anda dan bersiaplah untuk menjelajahi surga tropis ini!</p>
          </div>
        </section>
        <section id="fasilitas">
          <div class="LayarDalam">
            <h3>Fasilitas Srau</h3>
            <p class="RingkasanFasilitas">Beragam fasilitas menarik akan memanjakan dirimu di hari libur yang spesial. Di sini semuanya kami sediakan untukmu.</p>
          </div>
        </section>
        <section id="galeri">
          <div>
            <img src="Assets/gambar1.jpg" alt="">
            <h6>Selancar</h6>
            <p>Nikmati serunya berselancar di tengah-tengah ombak waikiki yang siap membawamu berfantasi di atas papan selancar.</p>
          </div>

          <div>
            <img src="Assets/gambar2.jpg" alt="">
            <h6>Perahu</h6>
            <p>Ingin merasakan sensasi berlayar bagai pelaut setempat saat mencari ikan di tengah laut? Perahu-perahu ini siap membawamu ke sana!</p>
          </div>

          <div>
            <img src="Assets/gambar3.jpg" alt="">
            <h6>Yatch</h6>
            <p>Manjakan dirimu dengan berlayar menggunakan kapal pesiar dengan segala kemewahan dan kenyamanannya.</p>
          </div>

          <div>
            <img src="Assets/gambar4.jpg" alt="">
            <h6>Jetski</h6>
            <p>Bosan dengan selancar dan ingin menguji adrenalinmu melawan ombak waikiki? Jetski selalu hadir dan siap untuk kau bawa menjelajahi lautan kekuasaanmu.</p>
          </div>

          <div>
            <img src="Assets/gambar5.jpg" alt="">
            <h6>Resort</h6>
            <p>Nikmati indahnya pesona pantai waikiki dengan fasilitas-fasilitas menarik dan hidangan khas pantai waikiki yang berkelas dengan megunjungi resort terdekat.</p>
          </div>
        </section>

        <section id="kelompok">
          <div class="LayarDalam">
            <h3>Tim Kami</h3>
            <p class="RingkasanKelompok">Tim perancang website wisata pantai waikiki.<br>KELOMPOK 8, Kelas Pemrorgaman Web (E), Informatika, UPN "Veteran" Jawa Timur</p>
          </div>
        </section>
        <section id="TimKami">
          <div>
            <a href="https://wa.me/+6281252016743" target="_blank">
              <img src="Assets/tomo.jpg" alt="">
            </a>
            <h6> Dwijo Utomo R P</h6>
            <p>22081010220</p>
          </div>

          <div>
            <a href="https://wa.me/+6281230917090" target="_blank">
              <img src="Assets/leon.jpg" alt="">
            </a>
            <h6>Leon Dewandaru P</h6>
            <p>22081010221</p>
          </div>

          <div>
            <a href="https://wa.me/+6281230186641" target="_blank">
              <img src="Assets/nafis.jpg" alt="">
            </a>
            <h6>Nafis Pratama P</h6>
            <p>22081010230</p>
          </div>

          <div>
            <a href="https://wa.me/+6282229121208" target="_blank">
              <img src="Assets/sandy.jpg" alt="">
            </a>
            <h6>Sandy Nicholas</h6>
            <p>22081010237</p>
          </div>

          <div>
            <a href="https://wa.me/+6281352239228" target="_blank">
              <img src="Assets/panggih.jpg" alt="">
            </a>
            <h6>Panggih Santri</h6>
            <p>22081010241</p>
          </div>
        </section>
      </main>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script/jsdashboard.js"></script>
    <script>
      $(document).ready(function(){
          var scroll_pos=0;
          $(document).scroll(function(){
              scroll_pos=$(this).scrollTop();
              if(scroll_pos > 0){
                  $("nav").addClass("navgelap");
              } else{
                  $("nav").removeClass("navgelap");
              }
          })
      });
    </script>

  </body>
</html>
