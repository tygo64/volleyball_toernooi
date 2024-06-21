<?php
require('includes/DBconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .team-container {
      display: flex;
      flex-wrap: wrap;
    }
    .team-column {
      flex: 25%;
      box-sizing: border-box;
      padding: 10px;
    }
    .team-item {
      background-color: #eee;
      color: #444;
      padding: 18px;
      margin: 5px 0;
      border: 1px solid #ccc;
      text-align: left;
      cursor: pointer;
    }
    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }
    .active, .accordion:hover {
      background-color: #ccc;
    }
    .accordion:after {
      content: '\002B';
      color: #777;
      font-weight: bold;
      float: right;
      margin-left: 5px;
    }
    .active:after {
      content: "\2212";
    }
    .panel {
      padding: 0 18px;
      background-color: white;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
    }
    .add-player-btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }
    .add-player-form {
      display: flex;
      flex-direction: column;
      margin-top: 10px;
    }
    .add-player-form input {
      margin-bottom: 10px;
      padding: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
<br><br><br><br><br>

<?php
  $dropdown = "SELECT * FROM spelers ORDER BY spelerNaam ASC";
  $result = $conn->prepare($dropdown);
  $result->execute();
  // $row = $result->fetch();
?>

<h2>Team List</h2>

<?php 
var_dump($row);
echo $result->rowCount();
?>

 <form>
  
<select name="dropdown" id="dropdown">
            
<?php
            // Check if there are results and output data as options
            if ($result->rowCount() > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['spelerId'] . "'>" . $row['spelerNaam'] . "</option>";
                }
            } else {
                echo "<option value=''>No results found</option>";
            }
            
            ?>
        </select>
</form>

 <?php



// Query to fetch all teams in alphabetical order
$stmt = $conn->prepare("SELECT `teamNaam` FROM `teams` ORDER BY `teamId` ASC;");
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate the number of teams and the number of teams per column
$totalTeams = count($teams);
$teamsPerColumn = ceil($totalTeams / 4); // Number of teams per column

echo '<div class="team-container">';

for ($i = 0; $i < 4; $i++) {
    echo '<div class="team-column">';
    for ($j = 0; $j < $teamsPerColumn; $j++) {
        $teamIndex = $i * $teamsPerColumn + $j;
        if ($teamIndex < $totalTeams) {
            $teamName = htmlspecialchars($teams[$teamIndex]['teamNaam']);
            echo '<button class="accordion">' . $teamName . '</button>';
            echo '<div class="panel">';
            echo '<form class="add-player-form" action="" method="post">';
            echo '  <input type="hidden" name="teamName" value="' . $teamName . '">';
            echo '  <input type="text" name="spelerNaam" placeholder="Speler Naam" required>';
            echo '  <button type="submit" class="add-player-btn">+ Voeg Speler Toe</button>';
            echo '</form>';
            echo '</div>';
        }
    }
    echo '</div>';
}
echo '</div>';
?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html> 
