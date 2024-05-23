<header>
    <img src="/public_html/img/logo.png" alt="WD4 SHOP">
    <nav>

        <?php if (!isset($_SESSION['user'])) { ?>
            <a href="/resources/views/login/register.php">Registreer</a>
            <a href="/resources/views/login/login.php">Login</a>
        <?php

        }
        else {

        ?>
            <a href="/">Producten</a>
            <a href="/resources/views/login/logout.php">Logout</a>
        <?php

            echo "<span>Welkom</span>";

        }


        ?>
    </nav>

</header>