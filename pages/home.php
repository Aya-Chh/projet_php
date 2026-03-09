<style>
    .hero {
        background: linear-gradient(135deg, #6C63FF 0%, #FF6584 100%);
        border-radius: var(--radius);
        padding: 3.5rem 3rem;
        color: white;
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '</>';
        position: absolute;
        right: 2rem;
        top: 50%;
        transform: translateY(-50%);
        font-family: 'Syne', sans-serif;
        font-size: 8rem;
        opacity: 0.12;
        font-weight: 800;
    }

    .hero h1 {
        font-family: 'Syne', sans-serif;
        font-size: 2.8rem;
        margin-bottom: 1rem;
        line-height: 1.1;
    }

    .hero p {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 550px;
        line-height: 1.6;
    }

    .hero-meta {
        margin-top: 1.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .chip {
        background: rgba(255,255,255,0.2);
        border: 1px solid rgba(255,255,255,0.35);
        color: white;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        backdrop-filter: blur(5px);
    }

    /* Cards */
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }

    .card {
        background: var(--card);
        border-radius: var(--radius);
        padding: 1.8rem;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(108,99,255,0.18);
    }

    .card-icon {
        font-size: 2.2rem;
        margin-bottom: 1rem;
    }

    .card h3 {
        font-family: 'Syne', sans-serif;
        font-size: 1.1rem;
        margin-bottom: 0.6rem;
        color: var(--dark);
    }

    .card p {
        color: var(--muted);
        font-size: 0.9rem;
        line-height: 1.6;
    }

    /* Code block */
    .code-section {
        background: var(--dark);
        border-radius: var(--radius);
        padding: 2rem;
        margin-bottom: 2.5rem;
    }

    .code-section h2 {
        color: white;
        font-family: 'Syne', sans-serif;
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .code-block {
        background: #0d0d1a;
        border-radius: 10px;
        padding: 1.2rem 1.5rem;
        font-family: 'Courier New', monospace;
        font-size: 0.88rem;
        line-height: 1.8;
        overflow-x: auto;
    }

    .c-kw  { color: #c792ea; }
    .c-fn  { color: #82aaff; }
    .c-str { color: #c3e88d; }
    .c-cm  { color: #546e7a; font-style: italic; }
    .c-var { color: #f78c6c; }

    /* Info table */
    .info-table {
        background: var(--card);
        border-radius: var(--radius);
        padding: 2rem;
        box-shadow: var(--shadow);
    }

    .info-table h2 {
        font-family: 'Syne', sans-serif;
        margin-bottom: 1.2rem;
        font-size: 1.2rem;
    }

    table { width: 100%; border-collapse: collapse; }

    th {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 10px 16px;
        text-align: left;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }

    th:first-child { border-radius: 8px 0 0 0; }
    th:last-child  { border-radius: 0 8px 0 0; }

    td {
        padding: 10px 16px;
        font-size: 0.88rem;
        border-bottom: 1px solid #f0f0f7;
    }

    tr:last-child td { border-bottom: none; }
    tr:hover td { background: #f8f8ff; }

    .tag-include { color: #6C63FF; font-weight: 700; }
    .tag-require { color: #FF6584; font-weight: 700; }
    .ok  { color: #22c55e; font-weight: 600; }
    .err { color: #ef4444; font-weight: 600; }
</style>

<!-- HERO -->
<section class="hero">
    <h1>Bienvenue sur<br>Mon Projet PHP 🚀</h1>
    <p>Mini-projet guidé sur les includes PHP — structure modulaire, header/footer réutilisables, et configuration centralisée.</p>
    <div class="hero-meta">
        <span class="chip">📅 <?= date('d/m/Y') ?></span>
        <span class="chip">⏰ <?= date('H:i') ?></span>
        <span class="chip">🐘 PHP <?= phpversion() ?></span>
        <span class="chip">📁 tp_include_v2</span>
    </div>
</section>

<!-- CARDS -->
<div class="cards">
    <div class="card">
        <div class="card-icon">📦</div>
        <h3>Modularité</h3>
        <p>Le code est découpé en modules réutilisables : header, footer, config. Un seul endroit à modifier pour tout changer.</p>
    </div>
    <div class="card">
        <div class="card-icon">⚙️</div>
        <h3>Configuration</h3>
        <p>Les constantes globales (nom du site, couleurs, BDD) sont définies dans <code>config.php</code> avec <code>define()</code>.</p>
    </div>
    <div class="card">
        <div class="card-icon">🔐</div>
        <h3>Require vs Include</h3>
        <p><code>require</code> stoppe le script en cas d'erreur. <code>include</code> affiche un warning et continue l'exécution.</p>
    </div>
</div>

<!-- CODE EXAMPLE -->
<div class="code-section">
    <h2>💻 Exemple — index.php</h2>
    <div class="code-block">
        <span class="c-cm">&lt;?php // index.php</span><br>
        <span class="c-kw">require</span> <span class="c-str">'includes/config.php'</span>; <span class="c-cm">// Erreur fatale si absent</span><br>
        <span class="c-kw">include</span> <span class="c-str">'includes/header.php'</span>; <span class="c-cm">// Warning si absent</span><br>
        <span class="c-kw">include</span> <span class="c-str">'pages/home.php'</span>;<br>
        <span class="c-kw">include</span> <span class="c-str">'includes/footer.php'</span>;<br>
        <span class="c-cm">?&gt;</span>
    </div>
</div>

<!-- TABLE -->
<div class="info-table">
    <h2>📊 include vs require — Tableau comparatif</h2>
    <table>
        <tr>
            <th>Instruction</th>
            <th>Fichier absent</th>
            <th>Suite du script</th>
            <th>Usage recommandé</th>
        </tr>
        <tr>
            <td><span class="tag-include">include</span></td>
            <td class="err">⚠️ Warning</td>
            <td class="ok">✅ Continue</td>
            <td>Éléments optionnels (sidebar…)</td>
        </tr>
        <tr>
            <td><span class="tag-require">require</span></td>
            <td class="err">❌ Erreur fatale</td>
            <td class="err">❌ Stoppe</td>
            <td>Fichiers critiques (config, BDD)</td>
        </tr>
        <tr>
            <td><span class="tag-include">include_once</span></td>
            <td class="err">⚠️ Warning</td>
            <td class="ok">✅ Continue</td>
            <td>Évite les doubles inclusions</td>
        </tr>
        <tr>
            <td><span class="tag-require">require_once</span></td>
            <td class="err">❌ Erreur fatale</td>
            <td class="err">❌ Stoppe</td>
            <td>Config critique, une seule fois</td>
        </tr>
    </table>
</div>