<?php
    session_start();
    require 'config.php';
    include_once 'header.php';

    $query = $bdd->prepare("SELECT * FROM friend_request WHERE pseudo_1 = :pseudo_1 OR pseudo_2 = :pseudo_2");
    $query->execute([
        "pseudo_1" => $_SESSION['pseudo'],
        "pseudo_2" => $_SESSION['pseudo']
    ]);

    $data = $query->fetchAll();

    if($_POST['pseudo'])
    {
        $user_check[] = $_SESSION['pseudo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?></h1>

<h3>Tout les users :</h3>
<?php
    $query = $bdd->query("SELECT * FROM usertest");
    $data = $query->fetchAll();

    for($i = 0; $i < sizeof($data); $i++)
    {
        if(!in_array($data[$i]['pseudo'], $user_check))
        {
            echo $data[$i]['pseudo']." "."<a href='actionswipe.php?action=add&pseudo=". $data[$i]['pseudo']. "'> Ajouter </a><br />";
        }
    }
?>
</body>
</html>