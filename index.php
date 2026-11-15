
<?php
$conn = mysqli_connect("localhost", "root", "", "mywebsite");

if (!$conn) {
    die("Connection failed");
}

$sql = "SELECT description FROM about";
$result = mysqli_query($conn, $sql);


$sql2 = "SELECT skill_name FROM skills";
$result2 = mysqli_query($conn, $sql2);


?>

<!DOCTYPE html>
<html>
<head>
    <title>My Personal Website</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    
    <h1 onclick="welcome()">Welcome to My Website</h1>


    <div id="navbar">
        <a href="#home">Home</a>
        <a href="#about">About Me</a>
        <a href="#skills">Skills</a>
        <a href="#projects">Projects</a>
        <a href="#contact">Contact</a>
    </div>

    <div id="home">
        <h2>Home</h2>
        <p>Welcome to my personal website.</p>
    </div>

    <div id="about">
        <h2>About Me</h2>
        
        <?php
        $row = mysqli_fetch_assoc($result);
        echo htmlspecialchars($row["description"]);
        ?>

    </div>

    <div id="skills">
        <h2>My Skills</h2>
        
        <?php
        while ($row2 = mysqli_fetch_assoc($result2)) {
        echo htmlspecialchars($row2["skill_name"]);
        echo "<br>";
        }
        ?>
    </div>

    <div id="projects">
        <h2>My Projects</h2>
        <p>my projects.</p>
    </div>
    

    <div id="contact">
    <h2>Contact Me</h2>

        <form id="contactform">

        <label for="fname">Name:</label>
        <input type="text" id="fname" name="name" placeholder="Your name..">

        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email..">

        <br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>

        <br><br>

        <input type="submit" value="Send">

        </form>
    </div>

    
    <script src="script.js"></script>

</body>
</html>
