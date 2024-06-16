<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Informasi Profil</title>
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
      </header>
    </div>
  </body>
</html>
