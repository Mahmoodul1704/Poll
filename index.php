<?php
require_once 'Poll.php';
$pollObject = new Poll();
?>
<html>

<head>
<title>Object-Oriented Poll System using PHP</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

   

    <p>
        <b>Who is your favourite author? </b>
    </p>
    <div class="poll-container"> 
            <?php
            if (empty($_GET["submit"])) {
                $result = $pollObject->getCource();
                ?>
                <form method="GET" action="index.php">
            
                        <?php
                foreach ($result as $k => $v) {
                    ?>
                            <div class='option-row'>
                <input class='radio-input' type='radio' name='vote' id="subjectId"
                    value='<?php echo $result[$k]["id"]; ?>' /><?php echo $result[$k]["name"]; ?>
                    </div>
                    <?php } ?>
                    <input id="btnSubmit" type="submit" name="submit"
                value="Submit" />
                </form>
        <div>
            
        </div>
        <?php
            } else {
                $pollObject->addVote($_GET["vote"]);
                $result = $pollObject->getCourcewithVote();
                foreach ($result as $k => $v) {
                ?>
        <div class='poll'><?php echo $result[$k]["name"]; ?> <b><?php echo $result[$k]["vote_count"]; ?></b>
            votes
        </div>
            
        <?php }
            } ?>
     </div>
</body>
</html>