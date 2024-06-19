<link rel="stylesheet" href="stylesheets\inschrijven.css">
<?php  
require ('includes/DBconnection.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $naam = $_POST['naam'];
    $klas = $_POST['klas'];
    echo "het werkt";
    // SQL query to insert data into database
    $sql = "INSERT INTO spelers (spelerNaam, spelerKlas) VALUES (:naam, :klas)";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':klas', $klas);

    // Execute the query
    try {
        $stmt->execute();
        echo "Inschrijving succesvol!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
echo "test";
?>
<div class="login-container">
    <div class="image-container">
        <img src="Volley transparent.png" alt="img">
</div class="image-container">
        <h2>Inschrijven</h2>
    <form method="post" action="index.php?PaginaNr=5">
            
        <div class="input-group">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" required>
        </div>

        <div class="input-group">
        <label for="naam">Klas</label>
        <select name="klas">
            <?php
            $klas = array("1A", "1B", "2A", "2B", "3A", "3B", "4A", "4B", "5A", "5B", "6A", "6B", "7A", "7B", "8A", "8B");
            foreach($klas as $klas){
                echo "<option value='$klas'>$klas</option>";
            }
            ?>
        </select>
    </div>
        <button type="submit" name="submit">Inschrijven</button>
    </form>
</div>


</form>