<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
</head>
    <body>
        <div id="wrapper">
            <div id="banner">
            </div>

            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Coffee.php">Coffee</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="Contacts.php">Contacts</a></li>
                </ul>
            </nav>

            <div id="content_area">
                <?php echo $content; ?>
            </div>

            <div id="sidebar">
            </div>

        </div>
    </body>
</html>
