<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NYUMBANI HOMES</title>
  <link rel="icon" href="images/icon.png">

  <!-- CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- JS -->
  <script src="js/jquery-2.1.4.min.js"></script>

  <style>

    .house-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      padding: 16px;
      margin-bottom: 20px;
      transition: transform 0.2s ease;
    }
    .house-card:hover {
      transform: translateY(-5px);
    }
    .house-card img {
      border-radius: 12px;
      width: 100%;
      height: 192px;
      object-fit: cover;
    }
    .house-card h2 {
      font-size: 20px;
      font-weight: bold;
      margin-top: 16px;
    }
    .house-card p {
      color: #4B5563;
      margin: 4px 0;
    }
    .house-card input,
    .house-card button {
      width: 100%;
      border-radius: 8px;
      padding: 10px;
    }
    .house-card input {
      border: 1px solid #ccc;
      margin-bottom: 8px;
    }
    .house-card button {
      background: #16a34a;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    .house-card button:hover {
      background: #15803d;
    }
    .icon {
      color: #16a34a;
      margin-right: 8px;
    }
    .location {
      color: #ef4444;
      margin-right: 6px;
    }
  </style>
</head>
<body>
  <div class="banner1">
    <div class="container">
      <div class="w3_agile_banner_top">
        <div class="agile_phone_mail">
          <ul>
            <li><i class="fa fa-phone"></i> +(254) 758 946 742</li>
            <li><i class="fa fa-envelope"></i>
              <a href="mailto:jnyadwera@yahoo.com">jnyadwera@yahoo.com</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="agileits_w3layouts_banner_nav">
        <nav class="navbar navbar-default">
          <div class="navbar-header navbar-left">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.php"><img src="images/logo.png" class="img-responsive" alt="Logo"></a></h1>
          </div>
          <div class="collapse navbar-collapse navbar-right" id="navbar">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li class="active"><a href="portfolio.php">Houses</a></li>
              <li><a href="blog.php">Blog</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <!-- Houses -->
  <div class="gallery">
    <div class="container">
      <h2 class="w3l_head w3l_head1">Our Houses</h2>
      <div class="row">

        <!-- House 1 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house1.jpg" alt="2 Bedroom Apartment">
            <h2><i class="fa fa-building icon"></i>2 Bedroom Apartment</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 15,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="15000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 2 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house2.jpg" alt="3 Bedroom Bungalow">
            <h2><i class="fa fa-home icon"></i>3 Bedroom Bungalow</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 25,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="25000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 3 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house3.jpg" alt="Bedsitter">
            <h2><i class="fa fa-bed icon"></i>Bedsitter</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 8,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="8000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 4 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house4.jpg" alt="1 Bedroom Apartment">
            <h2><i class="fa fa-building icon"></i>1 Bedroom Apartment</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 12,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="12000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 5 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house5.jpg" alt="Studio Apartment">
            <h2><i class="fa fa-cube icon"></i>Studio Apartment</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 10,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="10000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 6 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house6.jpg" alt="4 Bedroom Mansion">
            <h2><i class="fa fa-university icon"></i>4 Bedroom Mansion</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 40,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="40000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 7 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house7.jpg" alt="Single Room">
            <h2><i class="fa fa-key icon"></i>Single Room</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 5,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="5000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 8 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house8.jpg" alt="2 Bedroom Maisonette">
            <h2><i class="fa fa-home icon"></i>2 Bedroom Maisonette</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 20,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="20000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 9 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house9.jpg" alt="Guest House">
            <h2><i class="fa fa-hotel icon"></i>Guest House</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 30,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="30000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

        <!-- House 10 -->
        <div class="col-sm-6 col-md-4">
          <div class="house-card">
            <img src="house10.jpg" alt="Luxury Penthouse">
            <h2><i class="fa fa-diamond icon"></i>Luxury Penthouse</h2>
            <p><i class="fa fa-map-marker location"></i>Kisumu - Ksh 60,000</p>
            <form method="POST" action="stkpush.php">
              <input type="hidden" name="amount" value="60000">
              <input type="text" name="phone" placeholder="Enter M-Pesa number" required>
              <button type="submit"><i class="fa fa-money"></i> Pay Rent</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php include("footer.php"); ?>
</body>
</html>
