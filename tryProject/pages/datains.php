<?php
require 'db.php';



// INSERT INTO player(fName, lName, email, registrationTime)
// VALUES('Patrick','Saint-Louis', 'sonic12345', now()); 
// INSERT INTO player(fName, lName, email, registrationTime)
// VALUES('Marie','Jourdain', 'asterix2023', now());
// INSERT INTO player(fName, lName, userName, registrationTime)
// VALUES('Jonathan','David', 'pokemon527', now()); 



// CREATE VIEW history AS
// SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
// FROM player p, score s
// WHERE p.registrationOrder = s.registrationOrder;



$query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'success', 4, 1)";

$connection->query($query1);


$query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'failure', 6, 2)";

$connection->query($query1);


$query1 = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'incomplete', 5, 3)";

$connection->query($query1);

echo 'all done';
?>