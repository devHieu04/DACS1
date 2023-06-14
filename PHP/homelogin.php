<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
  <title>NH coin</title>
  <link rel="stylesheet" href="/CSS/home.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/JS/home.js"></script>
</head>

<body>



  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-yellow" href="/HTML/homepage.html">NH Crypto</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">About us</a>
          </li>
          <li class="nav-item">
  <a class="nav-link btn-primary text-white-hover" href="../PHP/account.php">
    <?php 
      // session_start(); 
      $servername = "localhost";
      $username = "root";
      $password = "naruto523";
      $tk = $_SESSION['taikhoan']; 
      $mk = $_SESSION['matkhau']; 
      $db =  mysqli_connect($servername, $username, $password , "javacuoiki2");
      $sql = "SELECT ten FROM account WHERE email ='$tk' AND matkhau='$mk'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_assoc($result);
      echo "Welcome " . $row['ten'];
    ?>
  </a>
</li>
          <li class="nav-item">
            <img src="/IMG/sun.png" class="dark-mode-toggle" alt="Dark Mode Toggle" onclick="switchTheme()">
          </li>
        </ul>

        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <main>
    <div class="hd d-flex  mt-3">
      <h5>
        Cộng đồng đang tìm kiếm gì?
      </h5>
      <div>
        <p class="text-color-green">đang diễn ra </p>
      </div>

    </div>
    <div class="coin">
      <table id="coinTable">
        <thead>
          <tr>
            <th>Name </th>
            <th>Cost</th>
            <th>Change in 24h</th>
            <th>7-day chart</th>
            <th>Giao dịch</th>
          </tr>
        </thead>
        <tbody>
          <!-- Dữ liệu sẽ được thêm vào đây bằng JavaScript -->
        </tbody>
      </table>
    </div>
  </main>
  <footer class="bg-light text-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <h5>About Us</h5>
          <p>We are the largest virtual currency community in the world</p>
        </div>
        <div class="col-12 col-md-4">
          <h5>Follow Us</h5>
          <ul class="list-unstyled social-icons">
            <li>
              <a href="https://www.facebook.com/devhieu20052004" class="text-light">
                <img src="/IMG/facebook.png" alt="Facebook" width="30" height="30">
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/dhis_._._/" class="text-light">
                <img src="/IMG/instagram.png" alt="Instagram" width="30" height="30">
              </a>
            </li>
            <li>
              <a href="https://www.telegram.org" class="text-light">
                <img src="/IMG/telegram.png" alt="Telegram" width="30" height="30">
              </a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-md-2">
          <h5>Navigation</h5>
          <ul class="list-unstyled ">
            <li><a href="/HTML/homepage.html" class="text-decoration-none text-dark">Home</a></li>
            <li><a href="#" class="text-decoration-none text-dark">About</a></li>
            <li><a href="#" class="text-decoration-none text-dark">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script>
    // Lấy dữ liệu từ API CoinGecko thông qua proxy
    const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
    const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1';
    const coinUrl = 'https://api.coingecko.com/api/v3/coins/';

    fetch(proxyUrl + apiUrl)
      .then(response => response.json())
      .then(data => {
        const coinTable = document.getElementById('coinTable');

        // Lặp qua dữ liệu và tạo các hàng trong bảng
        data.forEach(coin => {
          const row = document.createElement('tr');

          const nameCell = document.createElement('td');
          nameCell.textContent = coin.name;
          row.appendChild(nameCell);

          const priceCell = document.createElement('td');
          priceCell.textContent = coin.current_price;
          row.appendChild(priceCell);

          const percentChangeCell = document.createElement('td');
          percentChangeCell.textContent = coin.price_change_percentage_24h;
          row.appendChild(percentChangeCell);

          const chartCell = document.createElement('td');
          chartCell.setAttribute('class', 'chart-cell');
          const chartCanvas = document.createElement('canvas');
          chartCanvas.setAttribute('id', `chart-${coin.id}`);
          chartCell.appendChild(chartCanvas);
          row.appendChild(chartCell);

          const transactionCell = document.createElement('td');
          transactionCell.setAttribute('class', 'transaction-cell');
          transactionCell.textContent = '[giao dịch]';
          row.appendChild(transactionCell);

          coinTable.querySelector('tbody').appendChild(row);

          // Lấy dữ liệu biểu đồ 7 ngày từ API CoinGecko thông qua proxy
          fetch(proxyUrl + coinUrl + `${coin.id}/market_chart?vs_currency=usd&days=7&interval=daily`)
            .then(response => response.json())
            .then(chartData => {
              const priceData = chartData.prices.map(entry => entry[1]);
              const labels = chartData.prices.map(entry => new Date(entry[0]).toLocaleDateString());

              const chartConfig = {
                type: 'line',
                data: {
                  labels: labels,
                  datasets: [{
                    label: 'Price',
                    data: priceData,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false
                }
              };

              const chart = new Chart(chartCanvas, chartConfig);
            });
        });
      });
  </script>

</body>

</html>

<!-- Bây giờ trang của bạn sẽ truy cập vào API CoinGecko để lấy dữ liệu và tạo bảng và biểu đồ dựa trên dữ liệu đó. -->