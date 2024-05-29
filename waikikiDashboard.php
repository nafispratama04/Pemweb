<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PantaiWaikiki</title>
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
        }

        nav.logoDashboard{
            background-color: white;
        }

        nav .Logo{
            float: left;
            position: relative;
            line-height: 55px;
            text-align: center;
        }

        nav .Logo img{
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
            max-width: 600px;
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
          background-color: dodgerblue;
          height: 40px;
          line-height: 42px;
          color: white;
          text-decoration: none;
          display: inline-block;
          padding: 0px 20px 0px 20px;
          font-size: 15px;
          border-radius: 6px;
        }
        header .overlay{
          position: absolute;
          top: 0;
          left: 0;
          height: 100%;
          width: 100%;
          background-color: black;
          opacity: 45%;
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

        .tombolfitur .garis{
          height: 2px;
          background-color: white;
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
            background-color: white;
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
        <div class="Logo">
          <a href=""
            ><img
              src="Assets/LOGOWaikiki.png"
              class="logoDashboard"
              onclick="location.href='https://wa.me/+6281352239228'"
          /></a>
        </div>
        <div class="Fitur">
          <a href="#" class="tombolfitur">
            <span class="garis"></span>
            <span class="garis"></span>
            <span class="garis"></span>
          </a>
          <ul>
            <li><a href="#Fasilitas">Fasilitas</a></li>
            <li><a href="Tiket.php">Tiket</a></li>
            <li><a href="Tagihan.php">Tagihan</a></li>
            <li><a href="CetakTiket.php">CetakTiket</a></li>
            <li><a href="Riwayat.php">Riwayat</a></li>
            <li><a href="#Kontak">Kontak</a></li>
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
          <h3>PANTAI WAIKIKI</h3>
          <p>Manjakan Dirimu di Hari Liburan Bersama Pantai Waikiki</p>
          <p>
            <a href="" class="tombolmoreinfo">MORE INFO</a>
          </p>
        </div>
      </header>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="jsdashboard.js"></script>

  </body>
</html>
