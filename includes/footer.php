</main>

<style>
    footer {
        background: var(--dark);
        color: rgba(255,255,255,0.5);
        text-align: center;
        padding: 2rem;
        font-size: 0.85rem;
        margin-top: auto;
    }

    footer strong {
        color: white;
    }

    .footer-grid {
        max-width: 1100px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .footer-links {
        display: flex;
        gap: 1.5rem;
    }

    .footer-links a {
        color: rgba(255,255,255,0.5);
        text-decoration: none;
        transition: color 0.2s;
    }

    .footer-links a:hover { color: white; }
</style>

<footer>
    <div class="footer-grid">
        <div>
            &copy; <?= date('Y') ?> — <strong><?= SITE_NAME ?></strong> | Version <?= SITE_VERSION ?>
        </div>
        <div class="footer-links">
            <a href="index.php">Accueil</a>
            <a href="contact.php">Contact</a>
        </div>
        <div>
            Réalisé par <strong><?= SITE_AUTHOR ?></strong> · PHP <?= phpversion() ?>
        </div>
    </div>
</footer>

</body>
</html>