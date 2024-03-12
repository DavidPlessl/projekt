<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statistik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    .header-content h2 {
      position: relative;
      font-size: 3em;
      margin-bottom: 20px;
      margin-top: 0px;
      color: white;
    }

    h2{
      font-weight: bold;
      text-align: center;
    }

    h3{
    font-weight: bold;
    }

    footer p {
      font-weight: bold;
    }

    .chart-container {
      margin-top: 50px;
      max-width: 600px;
      margin: auto;
    }
    .p4{
      background-color: red;
    }
    
    footer {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
      margin-top: 50px;
    }

    .chart-container {
      margin-top: 50px;
      max-width: 600px;
      margin: auto;
    }

    .rechts {
      text-align: right !important;
    }

    h3 {
      text-align: center;
      font-weight: bold;
    }

    .container {
     max-width: 1200px; 
     margin: 0 auto; 
    }
    .navbar-nav .nav-link {
        color: white; 
    }
    .navbar-nav .dropdown-menu .dropdown-item {
        color: black; 
    }

    .navbar-nav .dropdown-menu .dropdown-item:hover {
        background-color: #343a40; 
    }

    .bg-red {
      background-color: red;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<div class="bg-red p-4">
    <h3>Hier finden Sie einige Statistiken:</h3>
    <hr>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="startseite.php">zurück zur Startseite</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="aktivitaeten.php">Aktivitäten</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Über uns</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="mitglieder.php">Mitglieder</a></li>
          <li><a class="dropdown-item" href="geraete.php">Ausrüstung</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="werde_mitglied.php">werde Mitglied!</a>
      </li>
    </ul>
  </div>
</nav><br><br>

<h2>Verhältnis Mitglieder/Fahrzeuge</h2>
<div class="container">
  <!-- Chart Container for bar chart -->
  <div class="chart-container">
    <canvas id="barChart"></canvas>
  </div>
</div>

<h2>Verteilung von Frauen und Männer</h2>
<div class="container">
  <!-- Chart Container for pie chart -->
  <div class="chart-container">
    <canvas id="pieChart"></canvas>
  </div>
</div>

<script>
  // Säulendiagramm
  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Mitglieder', 'Fahrzeuge'],
        datasets: [{
          label: 'Anzahl',
          data: [12, 7],
          backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });
  });

  // Kreisdiagramm 
  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Frauen', 'Männer'],
        datasets: [{
          data: [4, 7],
          backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            font: {
              size: 24, // Größe der Überschrift
              weight: 'bold' // Fettgedruckt
            }
          }
        }
      }
    });
  });
</script>

<footer>
  <form method="POST" action="anmelden.php">
    <hr>
    <h2>Hier finden Sie uns auf Social Media</h2><br>

    <div class="row">
      <div class="col-lg">
        <a href="https://www.instagram.com/ihre_instagram_seite" target="_blank">
          <img src="images/instagram.jpg" alt="Instagram-Logo" width="50" height="50" style="border-radius: 50%;">
        </a><br><br>
        <p>Instagram</p>
      </div>

      <div class="col-lg">
        <a href="https://www.flickr.com/photos/IhrFlickrAccount" target="_blank" style="border-radius: 10px; overflow: hidden; display: inline-block;">
          <img src="images/flickr.jpeg" alt="Flickr-Logo" width="50" height="50" style="border-radius: 50%;">
        </a><br><br>
        <p>Flickr</p>
      </div>

      <div class="col-lg">
        <a href="https://www.facebook.com/IhreFacebookSeite" target="_blank" style="border-radius: 10px; overflow: hidden; display: inline-block;">
          <img src="images/facebook.jpeg" alt="Facebook-Logo" width="50" height="50" style="border-radius: 50%;">
        </a><br><br>
        <p>Facebook</p>
      </div>
    </div>
  </form>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
