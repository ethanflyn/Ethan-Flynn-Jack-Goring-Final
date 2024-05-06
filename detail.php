<?php 
include 'top.php';
?>
    <body>
   
        <main>
            <h1>The History of the Games</h1>
            <section class="grid-container">
            <section class="grid-item">
                <img alt="Olympic Vase" src="images/olympic-old.jpg" class="image">
                <h2>Olympics in Ancient Greece</h2>
                <p>The Olympics games originated nearly 3,000 years ago in Ancient Greece, and was said to be founded by Heracles himself. As a result of this, the games were held every four years during a religious festival honouring Zeus. Originally the only event in the Olympics was a 192-meter footrace called the 'stade', but after 13 Olympiads the 400-meter and 5,000 meter races were introduced.</p>
            </section>

            <section class="grid-item">
                <img alt="Nero" src="images/olympic-nero.jpeg" class="image">
                <h2>The Fall of the Olympics</h2>
                <p>Despite it's prominance in modern culutre, the Olympics had not always been as popular or captivating as it is now. From Emperor Nero declaring himself the winner of a chariot race despite falling off the chariot during the event, to the games being banned by Emperor Theodosius I due to his religious beliefs, the games struggled for many years to find relevance within society.</p>
            </section>

            <section class="grid-item">
                <img alt="Baron" src="images/olympic-baron.png" class="image">
                <h2>The Revival of the Olympics</h2>
                <p>It took another 1,500 years for the Olympics to be revived as a result of Baron Pierre de  Coubertin, who proposed the reival of the games in 1892. Two years later, he got approval to found the International Olympic Committee (IOC). Since then, the Olympics have been held every four years, except for disruptions caused by war or global pandemics.</p>
            </section>

            <section class="grid-item">
                <img alt="Paris 2024 Olympics" src="images/olympic-paris.jpeg" class="image">
                <h2>The Modern Olympics</h2>
                <p>The Olympics have grown from having 241 participants representing 14 nations in 1896, to over 11,300 competitors representing 206 nations in the 2020 Olympics. It is estimated that the average cost to host the games can be as much as US$5.2 billion, emphasizing the massive scope and importnace of the games in our modern day society. </p>
            </section>

            <section class="grid-item" id="grid-table">
                <h2>History Still in the Making</h2>
                <p>It seems that every year the Olympic grows in size and recognition, and with that comes more funding from governments, and more world records broken. Here are just a few of the all time favorites.</p>

                <table>
                    <caption>World Records</caption>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Time</th>
                    </tr>
<?php
$sql = 'SELECT fldName, fldDate, fldEvent, fldTime FROM tblWorldRecords';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record){
    print '<tr>';
    print '<td>' . $record['fldName'] . '</td>';
    print '<td>' . $record['fldDate'] . '</td>';
    print '<td>' . $record['fldEvent'] . '</td>';
    print '<td>' . $record['fldTime'] . '</td>';
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
