<?php 
include 'top.php';
?>
    <body>
   
        <main>
            <h1>The History of the Games</h1>
            <section class="grid-container">
            <section class="grid-item">
                <img alt="Kaioa Orio" src="images/orio.jpeg" class="image">
                <h2>Olympics in Ancient Greece</h2>
                <p>The Olympics games originated nearly 3,000 years ago in Ancient Greece, and was said to be founded by Heracles himself. As a result of this, the games were held every four years during a religious festival honouring Zeus. Originally the only event in the Olympics was a 192-meter footrace called the 'stade', but after 13 Olympiads the 400-meter and 5,000 meter races were introduced.</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Zarautz" src="images/zarautz.png" class="image">
                <h2>The Fall of the Olympics</h2>
                <p>Despite it's prominance in modern culutre, the Olympics had not always been as popular or captivating as it is now. From Emperor Nero declaring himself the winner of a chariot race despite falling off the chariot during the event, to the games being banned by Emperor Theodosius I due to his religious beliefs, the games struggled for many years to find relevance within society.</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Zumaia" src="images/zumaia.jpeg" class="image">
                <h2>The Revival of the Olympics</h2>
                <p>It took another 1,500 years for the Olympics to be revived as a result of Baron Pierre de  Coubertin, who proposed the reival of the games in 1892. Two years later, he got approval to found the International Olympic Committee (IOC). Since then, the Olympics have been held every four years, except for disruptions caused by war or global pandemics.</p>
            </section>

            <section class="grid-item">
                <img alt="Kaioa Azpeitia" src="images/azpeitia.jpeg" class="image">
                <h2>The Modern Olympics</h2>
                <p>The Olympics have grown from having 241 participants representing 14 nations in 1896, to over 11,300 competitors representing 206 nations in the 2020 Olympics. It is estimated that the average cost to host the games can be as much as US$5.2 billion, emphasizing the massive scope and importnace of the games in our modern day society. </p>
            </section>

            <section class="grid-item" id="grid-table">
                <h2>Contact Us</h2>
                <p>If you have any queries please don't hesitate to contact our various stores.</p>

                <table>
                    <caption>Contact Information</caption>
                    <tr>
                        <th>Store</th>
                        <th>Manager</th>
                        <th>Location</th>
                        <th>Phone</th>
                    </tr>
<?php
$sql = 'SELECT fldStore, fldManager, fldLocation, fldPhone FROM tblContact';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record){
    print '<tr>';
    print '<td>' . $record['fldStore'] . '</td>';
    print '<td>' . $record['fldManager'] . '</td>';
    print '<td>' . $record['fldLocation'] . '</td>';
    print '<td>' . $record['fldPhone'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>

                    <tr>
                        <td colspan="4"><cite>@kaioa_denda</cite></td>
                    </tr>
                </table>
            
            </section>
</section>
            
           
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>