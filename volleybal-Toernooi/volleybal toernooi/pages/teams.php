<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .panel-title > a {
      display: block;
      text-decoration: none;
    }

    .panel-title > a:hover {
      text-decoration: none;
    }
  </style>
</head>
<body>
<?php 
include 'DBconnection1.php';

// Query om alle teams op alfabetische volgorde op te halen
$stmt = $conn->prepare("SELECT * FROM `teams` ORDER BY `teamNaam` ASC;");
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalTeams = count($teams);
$teamsPerColumn = ceil($totalTeams / 4); // Aantal teams per kolom
?>

<div class="container">
  <h2>Teams</h2>
  
  <div class="row">
    <?php for ($col = 0; $col < 4; $col++): ?>
    <div class="col-md-3">
      <div class="panel-group" id="accordion<?php echo $col + 1; ?>">
        <?php for ($i = $col * $teamsPerColumn; $i < ($col + 1) * $teamsPerColumn && $i < $totalTeams; $i++): ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion<?php echo $col + 1; ?>" href="#collapse<?php echo $i + 1; ?>">
                <?php echo $teams[$i]['teamNaam']; ?>
              </a>
            </h4>
          </div>
          <div id="collapse<?php echo $i + 1; ?>" class="panel-collapse collapse">
            <div class="panel-body">
              <ul>
                <?php for ($j = 1; $j <= 6; $j++): // Dit deel kun je aanpassen om de juiste inhoud weer te geven ?>
                <li></li>
                <?php endfor; ?>
              </ul>
            </div>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
    <?php endfor; ?>
  </div>
</div>

</body>
</html>
