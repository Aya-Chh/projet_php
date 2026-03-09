<?php
// Sécurité : vérifier que config.php a bien été chargé
if (!defined('SITE_AUTHOR')) {
    die('Erreur : config.php non chargé. Passez par index.php');
}

$success = false;
$nom_val = $email_val = $message_val = '';
?>

<style>
    .page-title {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .page-subtitle { color: var(--muted); margin-bottom: 2rem; }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    @media (max-width: 700px) { .contact-grid { grid-template-columns: 1fr; } }

    .contact-form {
        background: var(--card);
        border-radius: var(--radius);
        padding: 2rem;
        box-shadow: var(--shadow);
    }
    .contact-form h2 { font-family: 'Syne', sans-serif; margin-bottom: 1.5rem; font-size: 1.2rem; }

    .form-group { margin-bottom: 1.2rem; }

    label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; color: var(--text); }

    input, textarea {
        width: 100%;
        padding: 10px 14px;
        border: 2px solid #e8e8f0;
        border-radius: 10px;
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.9rem;
        color: var(--text);
        transition: border-color 0.2s, box-shadow 0.2s;
        outline: none;
        background: #fafafa;
    }
    input:focus, textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(108,99,255,0.1);
        background: white;
    }
    textarea { resize: vertical; min-height: 120px; }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 28px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        border-radius: 50px;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.2s;
        width: 100%;
        margin-top: 0.5rem;
    }
    .btn:hover { opacity: 0.9; transform: translateY(-2px); }
    .btn:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

    .contact-info { display: flex; flex-direction: column; gap: 1rem; }

    .info-card {
        background: var(--card);
        border-radius: var(--radius);
        padding: 1.5rem;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 1rem;
        border-left: 4px solid var(--primary);
    }
    .info-card-icon { font-size: 1.8rem; flex-shrink: 0; }
    .info-card h4 { font-size: 0.8rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 3px; }
    .info-card p { font-weight: 600; color: var(--dark); }

    /* Alerts */
    .alert {
        border-radius: 10px;
        padding: 12px 16px;
        font-weight: 600;
        margin-bottom: 1.2rem;
        font-size: 0.9rem;
        display: none;
        align-items: center;
        gap: 8px;
    }
    .alert.show { display: flex; }
    .alert-success { background: #d1fae5; border: 2px solid #22c55e; color: #166534; }
    .alert-error   { background: #fee2e2; border: 2px solid #ef4444; color: #991b1b; }

    /* Spinner */
    .spinner {
        width: 16px; height: 16px;
        border: 2px solid rgba(255,255,255,0.4);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.7s linear infinite;
        display: none;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
</style>

<!-- EmailJS SDK -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script>
    // ══════════════════════════════════════════════
    //  CONFIGURATION EMAILJS
    //  1. Créer un compte sur https://www.emailjs.com
    //  2. Créer un Service (Gmail, Outlook…)
    //  3. Créer un Template avec les variables :
    //     {{from_name}}, {{from_email}}, {{message}}
    //  4. Remplacer les 3 valeurs ci-dessous
    // ══════════════════════════════════════════════
    const EMAILJS_PUBLIC_KEY  = 'VHhKsEP48oiqFZbUV';   // Account > API Keys
    const EMAILJS_SERVICE_ID  = 'service_01e8az5';   // Email Services
    const EMAILJS_TEMPLATE_ID = 'template_8ruj6yg';  // Email Templates

    emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
</script>

<h1 class="page-title">✉️ Contact</h1>
<p class="page-subtitle">Une question sur le TP ? Envoyez un message — livré directement par email !</p>

<div class="contact-grid">

    <!-- FORMULAIRE -->
    <div class="contact-form">
        <h2>📨 Formulaire de contact</h2>

        <div id="alert-success" class="alert alert-success">
            ✅ <span id="success-text">Message envoyé avec succès !</span>
        </div>
        <div id="alert-error" class="alert alert-error">
            ❌ <span id="error-text">Une erreur est survenue. Réessayez.</span>
        </div>

        <div class="form-group">
            <label for="nom">👤 Nom complet</label>
            <input type="text" id="nom" placeholder="Ex : Aya Chraibi" required>
        </div>
        <div class="form-group">
            <label for="email">📧 Adresse email</label>
            <input type="email" id="email" placeholder="Aya@email.com" required>
        </div>
        <div class="form-group">
            <label for="message">💬 Message</label>
            <textarea id="message" placeholder="Votre message ici..." required></textarea>
        </div>

        <button class="btn" id="send-btn" onclick="sendEmail()">
            <div class="spinner" id="spinner"></div>
            <span id="btn-text">🚀 Envoyer le message</span>
        </button>
    </div>

    <!-- INFOS -->
    <div class="contact-info">
        <div class="info-card">
            <div class="info-card-icon">🏫</div>
            <div>
                <h4>Formation</h4>
                <p>IRISI — Module PHP Backend</p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">👨‍💻</div>
            <div>
                <h4>Auteur</h4>
                <p><?= SITE_AUTHOR ?></p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">📅</div>
            <div>
                <h4>Date du TP</h4>
                <p><?= date('d F Y') ?></p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">🐘</div>
            <div>
                <h4>Version PHP</h4>
                <p><?= phpversion() ?></p>
            </div>
        </div>
        <div class="info-card">
            <div class="info-card-icon">🌐</div>
            <div>
                <h4>URL locale</h4>
                <p><?= BASE_URL ?></p>
            </div>
        </div>
    </div>
</div>

<script>
function sendEmail() {
    const nom     = document.getElementById('nom').value.trim();
    const email   = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    // Reset alerts
    document.getElementById('alert-success').classList.remove('show');
    document.getElementById('alert-error').classList.remove('show');

    // Validation basique
    if (!nom || !email || !message) {
        showError('Veuillez remplir tous les champs.');
        return;
    }
    if (!email.includes('@')) {
        showError('Adresse email invalide.');
        return;
    }

    // UI — chargement
    setLoading(true);

    const templateParams = {
        from_name  : nom,
        from_email : email,
        message    : message,
        reply_to   : email
    };

    emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, templateParams)
        .then(() => {
            setLoading(false);
            document.getElementById('success-text').textContent =
                `✅ Message envoyé avec succès, ${nom} ! Vérifiez votre boîte mail.`;
            document.getElementById('alert-success').classList.add('show');
            // Vider le formulaire
            document.getElementById('nom').value     = '';
            document.getElementById('email').value   = '';
            document.getElementById('message').value = '';
        })
        .catch((err) => {
            setLoading(false);
            showError('Erreur EmailJS : ' + (err.text || JSON.stringify(err)));
            console.error('EmailJS error:', err);
        });
}

function setLoading(state) {
    const btn     = document.getElementById('send-btn');
    const spinner = document.getElementById('spinner');
    const text    = document.getElementById('btn-text');
    btn.disabled        = state;
    spinner.style.display = state ? 'block' : 'none';
    text.textContent    = state ? 'Envoi en cours...' : '🚀 Envoyer le message';
}

function showError(msg) {
    document.getElementById('error-text').textContent = msg;
    document.getElementById('alert-error').classList.add('show');
}
</script>
