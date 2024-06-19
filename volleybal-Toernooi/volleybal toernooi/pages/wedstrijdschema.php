<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedstrijdschema</title>
    <link rel="stylesheet" href="stylesheets/wedstrijdschema.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Function to handle updating matches
        function updateMatch(wedstrijdId) {
            var veld = $('#veld_' + wedstrijdId).text().trim();
            var team1 = $('#team1_' + wedstrijdId).text().trim();
            var team2 = $('#team2_' + wedstrijdId).text().trim();
            var tijd = $('#tijd_' + wedstrijdId).text().trim();

            $.ajax({
                url: 'update_match.php',
                method: 'POST',
                data: {
                    wedstrijdId: wedstrijdId,
                    veld: veld,
                    team1: team1,
                    team2: team2,
                    tijd: tijd
                },
                success: function(response) {
                    alert('Wedstrijd geüpdatet!');
                    // Optionally, update the table display or handle success feedback
                },
                error: function(xhr, status, error) {
                    alert('Er is een fout opgetreden bij het updaten van de wedstrijd.');
                    console.error(error);
                }
            });
        }

        // Event listener for save buttons
        $('button.save-btn').click(function() {
            var wedstrijdId = $(this).data('wedstrijd-id');
            updateMatch(wedstrijdId);
        });
    });
</script>

</head>

<body>

    <?php
    // Voorbeeld data voor wedstrijden
    $wedstrijden = [
        ['wedstrijdId' => 1, 'veld' => 1, 'team1' => 'Team A', 'team2' => 'Team B', 'tijd' => '10:00'],
        ['wedstrijdId' => 2, 'veld' => 2, 'team1' => 'Team C', 'team2' => 'Team D', 'tijd' => '10:30'],
        ['wedstrijdId' => 3, 'veld' => 3, 'team1' => 'Team E', 'team2' => 'Team F', 'tijd' => '11:00'],
        ['wedstrijdId' => 4, 'veld' => 1, 'team1' => 'Team G', 'team2' => 'Team H', 'tijd' => '11:30'],
        ['wedstrijdId' => 5, 'veld' => 2, 'team1' => 'Team I', 'team2' => 'Team J', 'tijd' => '12:00'],
        ['wedstrijdId' => 6, 'veld' => 3, 'team1' => 'Team K', 'team2' => 'Team L', 'tijd' => '12:30'],
    ];
    ?>

    <table class="container">
        <tr>
            <th>Veld</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Tijd</th>
            <th>Actie</th>
        </tr>
        <?php foreach ($wedstrijden as $wedstrijd): ?>
            <tr>

            <td id="veld_<?php echo $wedstrijd['wedstrijdId']; ?>"><?php echo htmlspecialchars($wedstrijd['veld']); ?></td>
            <td id="team1_<?php echo $wedstrijd['wedstrijdId']; ?>" contenteditable="true"><?php echo htmlspecialchars($wedstrijd['team1']); ?></td>
            <td id="team2_<?php echo $wedstrijd['wedstrijdId']; ?>" contenteditable="true"><?php echo htmlspecialchars($wedstrijd['team2']); ?></td>
            <td id="tijd_<?php echo $wedstrijd['wedstrijdId']; ?>" contenteditable="true"><?php echo htmlspecialchars($wedstrijd['tijd']); ?></td>

                <td>
                    <button class="save-btn" data-wedstrijd-id="<?php echo $wedstrijd['wedstrijdId']; ?>">Opslaan</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
