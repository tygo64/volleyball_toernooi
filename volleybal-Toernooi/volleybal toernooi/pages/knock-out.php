<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/knockout.css">
    <title>Tournament Bracket</title>
</head>
<body>
    <br><br><br><br><br><br>
    <div class="bracket-container">
        <div class="bracket-content">
            <div class="round left-side">
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team A</div>
                        <div class="team-right">Team B</div>
                    </div>
                    <div class="matchup">
                        <div class="team-left">Team C</div>
                        <div class="team-right">Team D</div>
                    </div>
                </div>
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team E</div>
                        <div class="team-right">Team F</div>
                    </div>
                    <div class="matchup">
                        <div class="team-left">Team G</div>
                        <div class="team-right">Team H</div>
                    </div>
                </div>
            </div>
            <div class="round left-side">
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team A</div>
                        <div class="team-right">Team D</div>
                    </div>
                    <div class="spacer"></div>
                    <div class="matchup">
                        <div class="team-left">Team E</div>
                        <div class="team-right">Team G</div>
                    </div>
                </div>
            </div>

            <div class="round center custom-position">
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team A</div>
                        <div class="team-right">Team G</div>
                    </div>
                    <div class="champion-box">
                        Team A <br> Champion
                    </div>
                </div>
            </div>

            <div class="round right-side">
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team B</div>
                        <div class="team-right">Team C</div>
                    </div>
                    <div class="spacer"></div>
                    <div class="matchup">
                        <div class="team-left">Team E</div>
                        <div class="team-right">Team G</div>
                    </div>
                </div>
            </div>
            <div class="round right-side">
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team A</div>
                        <div class="team-right">Team B</div>
                    </div>
                    <div class="matchup">
                        <div class="team-left">Team C</div>
                        <div class="team-right">Team D</div>
                    </div>
                </div>
                <div class="matchup-group">
                    <div class="matchup">
                        <div class="team-left">Team E</div>
                        <div class="team-right">Team F</div>
                    </div>
                    <div class="matchup">
                        <div class="team-left">Team G</div>
                        <div class="team-right">Team H</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
