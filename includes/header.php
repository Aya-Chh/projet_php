<?php
// Détecter la page active
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> — v<?= SITE_VERSION ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --primary: <?= COLOR_PRIMARY ?>;
            --secondary: <?= COLOR_SECONDARY ?>;
            --dark: <?= COLOR_DARK ?>;
            --bg: #f0f0f7;
            --card: #ffffff;
            --text: #2d2d3a;
            --muted: #888;
            --radius: 16px;
            --shadow: 0 8px 32px rgba(108,99,255,0.10);
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAV ── */
        header {
            background: var(--dark);
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        nav {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        .logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo span {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 0.5rem;
        }

        .nav-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            letter-spacing: 0.3px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .badge {
            background: var(--primary);
            color: white;
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* ── MAIN ── */
        main {
            flex: 1;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
            padding: 2.5rem 2rem;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="index.php" class="logo">
            &lt;<span>PHP</span>&gt;
            <span class="badge">TP v2</span>
        </a>
        <ul class="nav-links">
            <li><a href="index.php" <?= ($current_page == 'index.php') ? 'class="active"' : '' ?>>🏠 Accueil</a></li>
            <li><a href="contact.php" <?= ($current_page == 'contact.php') ? 'class="active"' : '' ?>>✉️ Contact</a></li>
        </ul>
    </nav>
</header>

<main>