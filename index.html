<?php
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin && preg_match('/^https:\/\/cesarbtakeda\.xyz$/', $origin)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$rotas_validas = ['/', '/home', '/sobre', '/contato'];
if (!in_array($request_uri, $rotas_validas)) {
    http_response_code(404);
    include __DIR__ . '/404.html';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>>_ CesarBTakeda | The CyberSecurity</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Roboto+Mono:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --neon-green: #39ff14;
            --neon-cyan: #00f7ff;
            --neon-pink: #ff00ff;
            --bg-dark: #0a0a0a;
            --text-glow: 0 0 10px var(--neon-green), 0 0 20px var(--neon-green), 0 0 40px var(--neon-green);
            --text-glow-cyan: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-cyan);
            --text-glow-pink: 0 0 10px var(--neon-pink), 0 0 20px var(--neon-pink);
            --modal-bg: rgba(5, 5, 5, 0.95);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body {
            background: var(--bg-dark);
            color: var(--neon-green);
            font-family: 'Roboto Mono', monospace;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* SCROLLBAR PERSONALIZADA */
        ::-webkit-scrollbar { width: 14px; }
        ::-webkit-scrollbar-track {
            background: #000;
            border-left: 2px solid var(--neon-green);
            box-shadow: inset 0 0 10px rgba(57, 255, 20, 0.3);
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #00ff00, var(--neon-green));
            border-radius: 7px;
            border: 1px solid #00ff00;
            box-shadow: 0 0 15px var(--neon-green), 0 0 25px rgba(57, 255, 20, 0.6);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00ff00;
            box-shadow: 0 0 25px var(--neon-green), 0 0 40px rgba(57, 255, 20, 0.9);
        }

        /* LOADING SCREEN */
        #loading-screen {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: #000; z-index: 99999; display: flex;
            flex-direction: column; align-items: center; justify-content: center;
            transition: opacity 0.8s ease-out;
        }
        #loading-screen.hidden { opacity: 0; pointer-events: none; }
        .loading-title {
            font-family: 'Orbitron', sans-serif; font-size: 2.5rem; font-weight: 900;
            color: var(--neon-green); text-shadow: var(--text-glow); margin-bottom: 2rem;
            animation: glitch 2s infinite;
        }
        .progress-container {
            width: 60%; max-width: 500px; height: 20px; background: rgba(0,0,0,0.8);
            border: 2px solid var(--neon-green); border-radius: 10px; overflow: hidden;
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.5); margin-bottom: 1rem;
        }
        .progress-bar {
            height: 100%; width: 0%; background: linear-gradient(90deg, var(--neon-green), #00ff00);
            box-shadow: 0 0 15px var(--neon-green); transition: width 0.3s ease;
            position: relative;
        }
        .progress-bar::after {
            content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
            animation: shine 1.5s infinite;
        }
        @keyframes shine { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
        .progress-text {
            font-family: 'Roboto Mono', monospace; color: var(--neon-cyan);
            font-size: 1.2rem; text-shadow: 0 0 10px var(--neon-cyan); margin-top: 0.5rem;
        }

        /* SCANLINES */
        #loading-screen::before, body::before {
            content: ""; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: repeating-linear-gradient(0deg, rgba(0,0,0,0.15), rgba(0,0,0,0.15) 1px, transparent 1px, transparent 2px);
            pointer-events: none; z-index: 9998; animation: scan 8s linear infinite;
        }
        #loading-screen::before { z-index: 1; animation-duration: 6s; }
        @keyframes scan { 0% { transform: translateY(0); } 100% { transform: translateY(100vh); } }

        @keyframes glitch {
            0%, 100% { text-shadow: 0.05em 0 0 #00ff00, -0.05em 0 0 #ff00ff; }
            15% { text-shadow: -0.05em 0 0 #00ff00, 0.05em 0 0 #ff00ff; }
            50% { text-shadow: 0.05em 0.05em 0 #00ff00, -0.05em -0.05em 0 #ff00ff; }
        }

        /* SITE */
        #main-content { opacity: 0; transition: opacity 1s ease-in; }
        #main-content.loaded { opacity: 1; }
        header, main, footer { display: none; }
        #main-content.loaded header, #main-content.loaded main, #main-content.loaded footer { display: block; }

        header {
            text-align: center; padding: 2rem 1rem; border-bottom: 1px solid var(--neon-green);
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.3); position: relative;
        }
        #lang-toggle {
            position: absolute; top: 1rem; right: 1rem; width: 40px; height: 40px;
            background: linear-gradient(135deg, #009c3b 0%, #009c3b 35%, #ffdf00 35%, #ffdf00 65%, #002776 65%, #002776 100%);
            border: 2px solid var(--neon-green); border-radius: 50%; cursor: pointer;
            box-shadow: 0 0 15px rgba(57, 255, 20, 0.6); display: flex; align-items: center;
            justify-content: center; font-size: 1.2rem; color: white; text-shadow: 0 0 5px #000;
            transition: all 0.3s; z-index: 9997;
        }
        #lang-toggle:hover { transform: scale(1.1); box-shadow: 0 0 25px rgba(57, 255, 20, 0.9); }
        #lang-toggle::after { content: "BR"; font-weight: bold; }
        body.en #lang-toggle::after { content: "EN"; }
        #ascii-art {
            font-family: 'Courier New', monospace; color: var(--neon-green); text-shadow: var(--text-glow);
            font-size: 0.8rem; line-height: 1; white-space: pre; margin-bottom: 1rem;
            overflow: hidden; border-right: 2px solid var(--neon-green); width: 0;
            display: inline-block; animation: blink 0.7s infinite;
        }
        @keyframes blink { 50% { border-color: transparent; } }
        .header-text h1 {
            font-family: 'Orbitron', sans-serif; font-size: 3rem; font-weight: 900;
            text-shadow: var(--text-glow); letter-spacing: 4px; margin-bottom: 0.5rem;
        }
        .glitch { animation: glitch 1.5s infinite; display: inline-block; }
        .quote { font-style: italic; color: var(--neon-cyan); text-shadow: var(--text-glow-cyan); font-size: 1.1rem; }
        main { max-width: 1000px; margin: 2rem auto; padding: 0 1rem; }
        section {
            margin-bottom: 3rem; padding: 1.5rem; background: rgba(10, 10, 10, 0.8);
            border: 1px solid var(--neon-green); border-radius: 8px; box-shadow: 0 0 15px rgba(57, 255, 20, 0.2);
        }
        h2 {
            font-family: 'Orbitron', sans-serif; color: var(--neon-pink); text-shadow: 0 0 15px var(--neon-pink);
            font-size: 1.8rem; margin-bottom: 1rem; position: relative;
        }
        h2::before { content: "> "; color: var(--neon-green); }
        ul { list-style: none; }
        li { margin: 0.8rem 0; position: relative; padding-left: 1.5rem; }
        li::before { content: "└─"; color: var(--neon-cyan); position: absolute; left: 0; }
        .clickable {
            color: var(--neon-cyan); cursor: pointer; text-decoration: underline;
            font-weight: bold; transition: all 0.3s;
        }
        .clickable:hover { color: var(--neon-pink); text-shadow: 0 0 10px var(--neon-pink); animation: glitch 0.3s; }
        a { color: var(--neon-cyan); text-decoration: none; transition: all 0.3s; }
        a:hover { color: var(--neon-pink); text-shadow: 0 0 10px var(--neon-pink); }
        footer {
            text-align: center; padding: 1.5rem; color: #555; font-size: 0.8rem;
            border-top: 1px solid #333; text-shadow: 0 0 5px rgba(57, 255, 20, 0.3);
        }

        /* MODAL */
        .modal {
            display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: var(--modal-bg); backdrop-filter: blur(5px); z-index: 9999;
            align-items: center; justify-content: center; padding: 1rem; overflow-y: auto;
        }
        .modal.active { display: flex; animation: fadeIn 0.4s; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .modal-content {
            background: #000; border: 2px solid var(--neon-green); border-radius: 10px;
            width: 90%; max-width: 800px; max-height: 85vh; overflow-y: auto;
            padding: 1.5rem; box-shadow: 0 0 30px rgba(57, 255, 20, 0.5);
        }
        .modal-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 1rem; border-bottom: 1px dashed var(--neon-green); padding-bottom: 0.5rem;
        }
        .modal-title {
            font-family: 'Orbitron', sans-serif; color: var(--neon-pink);
            font-size: 1.5rem; text-shadow: var(--text-glow-pink);
        }
        .close-modal { color: var(--neon-cyan); font-size: 1.8rem; cursor: pointer; transition: 0.3s; }
        .close-modal:hover { color: #ff0000; text-shadow: 0 0 10px #ff0000; }
        .typing-text { color: var(--neon-green); white-space: pre-wrap; font-family: 'Roboto Mono', monospace; line-height: 1.6; }

        /* LINKS NEON */
        .cert-link, .project-link {
            color: var(--neon-pink) !important; font-weight: bold; text-decoration: none !important;
            cursor: pointer; transition: all 0.3s; text-shadow: 0 0 8px var(--neon-pink);
        }
        .cert-link:hover, .project-link:hover {
            text-shadow: 0 0 15px var(--neon-pink), 0 0 25px var(--neon-pink); animation: glitch 0.3s;
        }

        @media (max-width: 768px) {
            .header-text h1 { font-size: 2rem; }
            #ascii-art { font-size: 0.6rem; }
            .modal-content { padding: 1rem; }
            #lang-toggle { width: 35px; height: 35px; font-size: 1rem; }
            .loading-title { font-size: 1.8rem; }
        }
    </style>
</head>
<body>

    <!-- LOADING -->
    <div id="loading-screen">
        <div class="loading-title glitch">SYSTEM BOOT</div>
        <div class="progress-container">
            <div id="progress-bar" class="progress-bar"></div>
        </div>
        <div id="progress-text" class="progress-text">0%</div>
    </div>

    <!-- CONTEÚDO -->
    <div id="main-content">
        <header>
            <div id="lang-toggle" title="Alternar idioma"></div>
            <div id="ascii-art" class="ascii-art">Loading system...</div>
            <div class="header-text">
                <h1 class="glitch">CesarBTakeda</h1>
                <p class="quote">"Talk is cheap. Show me the code." - Linus Torvalds</p>
            </div>
        </header>

        <main>
            <section id="about">
                <h2 data-en="root@cesar:~$ whoami">root@cesar:~$ whoami</h2>
                <p class="terminal-line" data-en="Passionate about technology and cybersecurity. Skilled in ethical hacking, exploit development, and network intrusion. I currently work at LIGA (GAMES AND APPS INNOVATION LABORATORY) located at FACENS, as a cybersecurity intern with the Purple Team.">
                   Apaixonado por tecnologia e cibersegurança. Habilidoso em hacking ético, desenvolvimento de exploits e intrusão de redes. Atualmente trabalho no LIGA (LABORATÓRIO DE INOVAÇÃO DE GAMES E APPS) que fica na Facens, como estagiário de cybersecurity no Purple Team.
                </p>
            </section>

            <section id="skills">
                <h2 data-en="skills --list">skills --list</h2>
                <ul>
                    <li><span class="clickable" data-modal="skill1" data-en="Databases - Click to view">Bancos de Dados - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill2" data-en="Operating Systems - Click to view">Sistemas Operacionais - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill3" data-en="Certifications - Click to view">Certificações - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill4" data-en="Hacking & Pentest - Click to view">Hacking & Pentest - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill5" data-en="Programming Languages - Click to view">Linguagens de Programação - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill6" data-en="Network Security - Click to view">Segurança de Rede - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill7" data-en="Web Technologies - Click to view">Tecnologias Web - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill8" data-en="Cloud - Click to view">Cloud - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="skill9" data-en="Tools - Click to view">Ferramentas - Clique para ver</span></li>
                </ul>
            </section>

            <section id="hosting-projects">
                <h2 data-en="projects --scan">projects --scan</h2>
                <ul>
                    <li><span class="clickable" data-modal="proj1" data-en="Tool-Anti-Phishing - Click to view">Tool-Anti-Phishing - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="proj2" data-en="UPX Complaint Management - Click to view">UPX Gestão de Reclamações - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="proj3" data-en="H00ks_T0x1na - Click to view">H00ks_T0x1na - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="proj4" data-en="7-Zip CVE-2025-0411 - Click to view">7-Zip CVE-2025-0411 - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="proj5" data-en="InstaInsane - Click to view">InstaInsane - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="proj6" data-en="Am3b4_T00ls - Click to view">Am3b4_T00ls - Clique para ver</span></li>
                </ul>
            </section>

            <!-- 10 BUGS BOUNTY -->
            <section id="bug-bounty">
                <h2 data-en="bugbounty --report">bugbounty --report</h2>
                <ul>
                    <li><span class="clickable" data-modal="bug1" data-en="Pichau - Click to view">Pichau - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug2" data-en="9altitudes - Click to view">9altitudes - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug3" data-en="GlasDoor - Click to view">GlasDoor - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug4" data-en="Trip.com - Click to view">Trip.com - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug5" data-en="CacauShow - Click to view">CacauShow - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug6" data-en="Playtika - Click to view">Playtika - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug7" data-en="Facens - Click to view">Facens - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug8" data-en="Facens - Click to view">Facens - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug9" data-en="FarmaPonte - Click to view">FarmaPonte - Clique para ver</span></li>
                    <li><span class="clickable" data-modal="bug10" data-en="Edebe - Click to view">Edebe - Clique para ver</span></li>
                </ul>
            </section>

            <section id="contact">
                <h2 data-en="contact --init">contact --init</h2>
                <ul>
                    <li><a href="https://www.linkedin.com/in/cesarbtakeda" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    <li><a href="https://github.com/cesarbtakeda" target="_blank"><i class="fab fa-github"></i> GitHub</a></li>
                    <li><a href="mailto:cesaraugustobardelotti@gmail.com"><i class="fas fa-envelope"></i> Email</a></li>
                </ul>
            </section>
        </main>

        <div id="modal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="modal-title">Carregando...</div>
                    <span class="close-modal">×</span>
                </div>
                <div id="modal-body" class="typing-text"></div>
            </div>
        </div>

        <footer>
            <p>© 2025 CesarBTakeda | <span style="color:var(--neon-green);">root@cesar:~#</span></p>
        </footer>
    </div>

    <script>
        // === LOADING ===
        const loadingScreen = document.getElementById('loading-screen');
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const mainContent = document.getElementById('main-content');
        let progress = 0;
        const duration = 3000;
        const interval = 30;
        const steps = duration / interval;
        const increment = 100 / steps;
        const loadingInterval = setInterval(() => {
            progress += increment;
            if (progress >= 100) {
                progress = 100;
                clearInterval(loadingInterval);
                setTimeout(() => {
                    loadingScreen.classList.add('hidden');
                    mainContent.classList.add('loaded');
                    setTimeout(initSite, 300);
                }, 500);
            }
            progressBar.style.width = progress + '%';
            progressText.textContent = Math.round(progress) + '%';
        }, interval);

        function initSite() {
            loadAscii();
        }

        // === ASCII (INDEPENDENTE) ===
        let asciiTypingTimeout = null;
        function loadAscii() {
            const el = document.getElementById('ascii-art');
            el.textContent = '';
            el.style.width = '0';
            el.style.borderRight = '2px solid var(--neon-green)';
            fetch("/static/ascii.txt")
                .then(r => r.ok ? r.text() : Promise.reject())
                .then(data => {
                    let i = 0;
                    const type = () => {
                        if (i < data.length) {
                            el.textContent += data[i++];
                            asciiTypingTimeout = setTimeout(type, 30);
                        } else {
                            el.style.borderRight = 'none';
                            el.style.width = '100%';
                        }
                    };
                    type();
                })
                .catch(() => {
                    el.textContent = "ERROR: ASCII NOT LOADED";
                    el.style.color = "#ff0000";
                    el.style.borderRight = 'none';
                });
        }

        // === MODAL DATA (100% COMPLETO) ===
        const modalData = {
            skill1: { title: "Bancos de Dados", content: "> MySQL\n> PostgreSQL\n> MongoDB\n> SQLite\n> Redis\n\n> Proficiência em design e otimização de BD relacionais e NoSQL.", en: { title: "Databases", content: "> MySQL\n> PostgreSQL\n> MongoDB\n> SQLite\n> Redis\n\n> Proficiency in relational and NoSQL database design and optimization." } },
            skill2: { title: "Sistemas Operacionais", content: "> Debian 12\n> Kali Linux (WSL)\n> Arch Linux\n> BlackArch Linux\n> Windows 11 + WSL\n\n> Experiência em configuração, hardening e troubleshooting.", en: { title: "Operating Systems", content: "> Debian 12\n> Kali Linux (WSL)\n> Arch Linux\n> BlackArch Linux\n> Windows 11 + WSL\n\n> Experience in configuration, hardening, and troubleshooting." } },
            skill3: {
                title: "Certificações",
                content: [
                    { text: "> ISO-17024 | IC-PEN-1560 ", link: "https://certs.ibsec.com.br/?cert_hash=97493760d2db8082" },
                    { text: "> PT-IC-SOC-380 ", link: "https://certs.ibsec.com.br/?cert_hash=c3976b818f132049" },
                    { text: "> PT-IC-LNX-1180 ", link: "https://certs.ibsec.com.br/?cert_hash=12f35310bd31b76b" },
                    { text: "> PT-IC-SEC-1780 ", link: "https://certs.ibsec.com.br/?cert_hash=721dac00d4467aaf" },
                    { text: "> GCP ", link: "https://www.cloudskillsboost.google/public_profiles/52f87000-1206-45d7-9426-4cc9612d4b00" },
                    { text: "\n\n> Certificações em pentest, SOC e Linux security.", link: null }
                ],
                en: {
                    title: "Certifications",
                    content: [
                        { text: "> ISO-17024 | IC-PEN-1560 ", link: "https://certs.ibsec.com.br/?cert_hash=97493760d2db8082" },
                        { text: "> PT-IC-SOC-380 ", link: "https://certs.ibsec.com.br/?cert_hash=c3976b818f132049" },
                        { text: "> PT-IC-LNX-1180 ", link: "https://certs.ibsec.com.br/?cert_hash=12f35310bd31b76b" },
                        { text: "> PT-IC-SEC-1780 ", link: "https://certs.ibsec.com.br/?cert_hash=721dac00d4467aaf" },
                        { text: "> GCP ", link: "https://www.cloudskillsboost.google/public_profiles/52f87000-1206-45d7-9426-4cc9612d4b00" },
                        { text: "\n\n> Certifications in pentest, SOC, and Linux security.", link: null }
                    ]
                }
            },
            skill4: { title: "Hacking & Pentest", content: "> Vulnerability Assessment\n> Exploit Development\n> Web Application Security\n> Network Penetration Testing\n> Reverse Engineering\n\n> Ferramentas: Metasploit, Burp, Nmap.", en: { title: "Hacking & Pentest", content: "> Vulnerability Assessment\n> Exploit Development\n> Web Application Security\n> Network Penetration Testing\n> Reverse Engineering\n\n> Tools: Metasploit, Burp, Nmap." } },
            skill5: { title: "Linguagens de Programação", content: "> PHP 8\n> JavaScript (ES6+)\n> Python 3\n> Bash Script\n> SQL\n\n> Desenvolvimento de tools customizadas para security.", en: { title: "Programming Languages", content: "> PHP 8\n> JavaScript (ES6+)\n> Python 3\n> Bash Script\n> SQL\n\n> Development of custom security tools." } },
            skill6: { title: "Segurança de Rede", content: "> WAF/IDS/IPS\n> VPNs (OpenVPN, WireGuard)\n> Network Protocols\n> Wireless Security (WPA3, Evil Twin)\n\n> Configuração e auditoria de infra segura.", en: { title: "Network Security", content: "> WAF/IDS/IPS\n> VPNs (OpenVPN, WireGuard)\n> Network Protocols\n> Wireless Security (WPA3, Evil Twin)\n\n> Secure infrastructure setup and auditing." } },
            skill7: { title: "Tecnologias Web", content: "> HTML5 / CSS3\n> JavaScript (Vanilla + Frameworks)\n> PHP 8+\n> REST APIs\n\n> Desenvolvimento full-stack com foco em secure coding.", en: { title: "Web Technologies", content: "> HTML5 / CSS3\n> JavaScript (Vanilla + Frameworks)\n> PHP 8+\n> REST APIs\n\n> Full-stack development with focus on secure coding." } },
            skill8: { title: "Cloud", content: "> AWS (EC2, S3, Lambda)\n> Google Cloud Platform\n> Microsoft Azure\n\n> Deploy e security de aplicações na nuvem.", en: { title: "Cloud", content: "> AWS (EC2, S3, Lambda)\n> Google Cloud Platform\n> Microsoft Azure\n\n> Cloud application deployment and security." } },
            skill9: { title: "Ferramentas", content: "> Wireshark\n> Metasploit\n> Nmap\n> Burp Suite\n> sqlmap\n> John the Ripper\n\n> Uso avançado em red team operations.", en: { title: "Tools", content: "> Wireshark\n> Metasploit\n> Nmap\n> Burp Suite\n> sqlmap\n> John the Ripper\n\n> Advanced use in red team operations." } },
            proj1: { title: "Tool-Anti-Phishing", content: "> Ferramenta desenvolvida para interceptar conexões de phishing e encher o cache de log do atacante.\n> Usa rede Tor e proxies para anonimato do usuário.\n> Proteção contra trojans, e-mails phishing e derrubada de VPNs em IPs públicos.\n\n> Status: Ativo | Linguagem: Python/Bash", link: "https://github.com/cesarbtakeda/Tool-Anti-Phishing", en: { title: "Tool-Anti-Phishing", content: "> Tool developed to intercept phishing connections and flood attacker logs.\n> Uses Tor and proxies for user anonymity.\n> Protection against trojans, phishing emails, and VPN drops on public IPs.\n\n> Status: Active | Language: Python/Bash", link: "https://github.com/cesarbtakeda/Tool-Anti-Phishing" } },
            proj2: { title: "UPX Gestão de Reclamações", content: "> Projeto desenvolvido na faculdade durante o curso UPX.\n> Sistema para gerenciar reclamações de forma dinâmica e massiva.\n> Gera relatórios diários de qualquer tipo de empresa, cidade ou sindicato.\n\n> Status: Concluído | Linguagem: PHP/MySQL", link: "https://github.com/cesarbtakeda/UPX_PROJETO_GESTAO_DE_RECLAMACAO", en: { title: "UPX Complaint Management", content: "> Project developed during UPX course.\n> Dynamic and massive complaint management system.\n> Generates daily reports for any company, city, or union.\n\n> Status: Completed | Language: PHP/MySQL", link: "https://github.com/cesarbtakeda/UPX_PROJETO_GESTAO_DE_RECLAMACAO" } },
            proj3: { title: "H00ks_T0x1na", content: "> Framework de Phishing (Social Engineering) para controle remoto de PC ou mobile via links.\n> Compatível com Windows, Android e iPhone.\n> Escrito em HTML, CSS, PHP, JavaScript, BashScript.\n> Alpha 0.1 com API interna de templates e setup.sh.\n\n> Status: Em Desenvolvimento", link: "https://github.com/cesarbtakeda/H00ks_T0x1na", en: { title: "H00ks_T0x1na", content: "> Phishing Framework (Social Engineering) for remote control via links.\n> Compatible with Windows, Android, and iPhone.\n> Written in HTML, CSS, PHP, JavaScript, BashScript.\n> Alpha 0.1 with internal template API and setup.sh.\n\n> Status: In Development", link: "https://github.com/cesarbtakeda/H00ks_T0x1na" } },
            proj4: { title: "7-Zip CVE-2025-0411", content: "> Vulnerabilidade (CVSS 7.0) que permite bypass do Mark-of-the-Web no 7-Zip.\n> Atacante remoto executa código arbitrário via arquivo malicioso.\n> Exploração requer interação do usuário (abrir arquivo).\n> Falha na propagação de MotW para arquivos extraídos.\n\n> Status: PoC Liberado", link: "https://github.com/cesarbtakeda/7-Zip-CVE-2025-0411-POC", en: { title: "7-Zip CVE-2025-0411", content: "> Vulnerability (CVSS 7.0) allowing Mark-of-the-Web bypass in 7-Zip.\n> Remote attacker executes arbitrary code via malicious file.\n> Requires user interaction (open file).\n> Failure in MotW propagation to extracted files.\n\n> Status: PoC Released", link: "https://github.com/cesarbtakeda/7-Zip-CVE-2025-0411-POC" } },
            proj5: { title: "InstaInsane 1.1", content: "> Backend Python para ataques de bruteforce em ambientes controlados.\n> Rápido, limpo e com bypass rápido de defesas.\n> Projetado para testes éticos e pesquisa.\n\n> Status: v1.1 Estável", link: "https://github.com/cesarbtakeda/instainsane1.1", en: { title: "InstaInsane 1.1", content: "> Python backend for brute-force attacks in controlled environments.\n> Fast, clean, and quick defense bypass.\n> Designed for ethical testing and research.\n\n> Status: v1.1 Stable", link: "https://github.com/cesarbtakeda/instainsane1.1" } },
            proj6: { title: "Am3b4_t00ls", content: "> Solução própria de bug bounty automation.\n> Ferramentas para recon quando o tempo é curto.\n> Strings customizáveis com as melhores tools pré-definidas.\n\n> Status: Ativo | Uso: Bug Bounty", link: "https://github.com/cesarbtakeda/Am3b4_t00ls", en: { title: "Am3b4_t00ls", content: "> Custom bug bounty automation solution.\n> Recon tools when time is short.\n> Customizable strings with pre-defined best tools.\n\n> Status: Active | Use: Bug Bounty", link: "https://github.com/cesarbtakeda/Am3b4_t00ls" } },
            bug1: { title: "Pichau Bug", content: "> Alvo: Pichau\n> Vulnerabilidade: OpenRedirect | CWE-601\n> Plataforma: OpenBugBounty\n> Data: 26 de Junho, 2025\n> Detalhes: Redirecionamento aberto permitindo phishing.\n> Status: Reportado e Resolvido", en: { title: "Pichau Bug", content: "> Target: Pichau\n> Vulnerability: OpenRedirect | CWE-601\n> Platform: OpenBugBounty\n> Date: June 26, 2025\n> Details: Open redirect enabling phishing.\n> Status: Reported and Resolved" } },
            bug2: { title: "9altitudes Bug", content: "> Vulnerabilidade: XSS | CWE-79\n> Detalhes: Encontrado na fase de recon analisando subdomínios com footprint. Botão de busca bloqueado por WAF, bypass com div mouseover para executar XSS ao passar o mouse.\n> Plataforma: Intigriti\n> Data: 26 de Junho, 2025\n> Status: Triage", en: { title: "9altitudes Bug", content: "> Vulnerability: XSS | CWE-79\n> Details: Found during recon scanning subdomains with footprint. Search button blocked by WAF, bypassed with div mouseover to execute XSS on hover.\n> Platform: Intigriti\n> Date: June 26, 2025\n> Status: Triage" } },
            bug3: { title: "GlasDoor Bug", content: "> Vulnerabilidade: CSRF | CWE-532\n> Detalhes: CSRF exposto no reset de senha, token sem limite de expiração, reutilizável e manipulável após primeiro uso!\n> Plataforma: HackerOne\n> Data: 16 de Fevereiro, 2025\n> Status: Duplicado", en: { title: "GlasDoor Bug", content: "> Vulnerability: CSRF | CWE-532\n> Details: Exposed CSRF in password reset, token with no expiration, reusable and manipulable after first use!\n> Platform: HackerOne\n> Date: February 16, 2025\n> Status: Duplicate" } },
            bug4: { title: "Trip.com Bug", content: "> Vulnerabilidade: RCE\n> Detalhes: trip.com vulnerável a exploit RCE de servidor DNS vulnerável, permitindo acesso remoto via configuração dnsnameserver. Versão desatualizada de nginx.\n> Plataforma: HackerOne\n> Data: 29 de Setembro, 2024\n> Status: Informado", en: { title: "Trip.com Bug", content: "> Vulnerability: RCE\n> Details: trip.com vulnerable to DNS server RCE exploit, allowing remote access via dnsnameserver config. Outdated nginx version.\n> Platform: HackerOne\n> Date: September 29, 2024\n> Status: Informed" } },
            bug5: { title: "CacauShow Bug", content: "> Vulnerabilidade: XSS | CWE-79\n> Detalhes: XSS Refletido no campo de busca da Cacau Show. Sem sanitização de JavaScript, permitindo escalada para HTMLi e RCE via fixação de sessão. Gravidade: Média-Alta devido à facilidade de escalação.\n> Plataforma: N/A (Disclosure Direto)\n> Data: 9 de Março, 2025\n> Campo vulnerável: Search Field", en: { title: "CacauShow Bug", content: "> Vulnerability: XSS | CWE-79\n> Details: Reflected XSS in Cacau Show search field. No JavaScript sanitization, allowing escalation to HTMLi and RCE via session fixation. Severity: Medium-High due to ease of escalation.\n> Platform: N/A (Direct Disclosure)\n> Date: March 9, 2025\n> Vulnerable Field: Search Field" } },
            bug6: { title: "Playtika Bug", content: "> Vulnerabilidade: OpenRedirect | CWE-601\n> Detalhes: Open Redirect e banner grabbing no subdomínio bingoblitz.com da Playtika.\n> Plataforma: HackerOne\n> Data: 19 de Março, 2025\n> Status: Reportado", en: { title: "Playtika Bug", content: "> Vulnerability: OpenRedirect | CWE-601\n> Details: Open Redirect and banner grabbing on Playtika's bingoblitz.com subdomain.\n> Platform: HackerOne\n> Date: March 19, 2025\n> Status: Reported" } },
            bug7: { 
                title: "Facens Bug", 
                content: "> Alvo: Facens\n> Vulnerabilidade: IDOR | CWE-639\n> Plataforma: Facens (Interno)\n> Data: Julho de 2025\n> Detalhes: IDOR na API de boleto permitia manipular IDs de pagamento, zerando valores de mensalidade.\n> Impacto: Acesso gratuito a serviços pagos.\n> Status: Reportado e Corrigido", 
                en: { 
                    title: "Facens Bug", 
                    content: "> Target: Facens\n> Vulnerability: IDOR | CWE-639\n> Platform: Facens (Internal)\n> Date: July 2025\n> Details: IDOR in billing API allowed manipulation of payment IDs, zeroing tuition fees.\n> Impact: Free access to paid services.\n> Status: Reported and Fixed" 
                } 
            },
            bug8: { 
                title: "Facens Bug", 
                content: "> Alvo: Facens Carreiras\n> Vulnerabilidade: Security Misconfiguration | CWE-611\n> Plataforma: WordPress (Facens)\n> Data: Agosto de 2025\n> Detalhes: Banco de dados completo (backup.zip) exposto publicamente em /wp-content/uploads/.\n> Impacto: Vazamento de dados sensíveis de alunos e professores.\n> Status: Reportado e Removido", 
                en: { 
                    title: "Facens Bug", 
                    content: "> Target: Facens Careers\n> Vulnerability: Security Misconfiguration | CWE-611\n> Platform: WordPress (Facens)\n> Date: August 2025\n> Details: Full database backup (backup.zip) publicly exposed in /wp-content/uploads/.\n> Impact: Leak of sensitive student and faculty data.\n> Status: Reported and Removed" 
                } 
            },
            bug9: { 
                title: "FarmaPonte Bug", 
                content: "> Alvo: FarmaPonte\n> Vulnerabilidade: Email Spoofing | CWE-924\n> Plataforma: Email\n> Data: Agosto de 2025\n> Detalhes: API de envio de e-mails permitia spoofing completo do remetente via header injection.\n> Impacto: Envio de e-mails falsos em nome da empresa.\n> Status: Reportado e Corrigido", 
                en: { 
                    title: "FarmaPonte Bug", 
                    content: "> Target: FarmaPonte\n> Vulnerability: Email Spoofing | CWE-924\n> Platform: Email\n> Date: August 2025\n> Details: Email sending API allowed full sender spoofing via header injection.\n> Impact: Sending fake emails on behalf of the company.\n> Status: Reported and Fixed" 
                } 
            },
            bug10: { 
                title: "Edebe Bug", 
                content: "> Alvo: Edebe\n> Vulnerabilidade: Stored XSS | CWE-79\n> Plataforma: Estagio (Liga)\n> Data: Novembro de 2025\n> Detalhes: Upload de arquivos XML maliciosos no bucket S3 permitia execução de XSS persistente.\n> Impacto: Scripts armazenados permanentemente e compartilháveis via spam.\n> Status: Reportado e Corrigido", 
                en: { 
                    title: "Edebe Bug", 
                    content: "> Target: Edebe\n> Vulnerability: Stored XSS | CWE-79\n> Platform: Estagio (Liga)\n> Date: November 2025\n> Details: Upload of malicious XML files to S3 bucket allowed persistent XSS execution.\n> Impact: Scripts permanently stored and shareable via spam.\n> Status: Reported and Fixed" 
                } 
            }
        };

        // === MODAL SYSTEM (INDEPENDENTE) ===
        const modal = document.getElementById('modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        const closeBtn = document.querySelector('.close-modal');
        let modalTypingTimeout = null;

        function openModal(id) {
            if (modalTypingTimeout) clearTimeout(modalTypingTimeout);
            modal.classList.remove('active');
            setTimeout(() => {
                const item = modalData[id];
                if (!item) return;
                const isEn = document.body.classList.contains('en');
                const data = isEn ? (item.en || item) : item;
                modalTitle.textContent = data.title;
                modalBody.innerHTML = '';
                modal.classList.add('active');
                if (id === 'skill3') typeCertifications(data.content, isEn);
                else if (id.startsWith('proj')) typeProject(data.content, data.link, isEn);
                else typeText(data.content);
            }, 100);
        }

        function typeText(text) {
            let i = 0;
            function type() {
                if (i < text.length && modal.classList.contains('active')) {
                    modalBody.insertAdjacentText('beforeend', text[i++]);
                    modalTypingTimeout = setTimeout(type, 20);
                }
            }
            modalTypingTimeout = setTimeout(type, 100);
        }

        function typeCertifications(lines, isEn) {
            let lineIndex = 0, charIndex = 0;
            function typeNext() {
                if (lineIndex >= lines.length || !modal.classList.contains('active')) return;
                const line = lines[lineIndex];
                if (charIndex < line.text.length) {
                    modalBody.insertAdjacentText('beforeend', line.text[charIndex++]);
                    modalTypingTimeout = setTimeout(typeNext, 20);
                } else {
                    if (line.link) {
                        const text = isEn ? '[view cert]' : '[ver cert]';
                        modalBody.insertAdjacentHTML('beforeend', ` <a href="${line.link}" target="_blank" class="cert-link">${text}</a>`);
                    }
                    modalBody.insertAdjacentText('beforeend', '\n');
                    lineIndex++; charIndex = 0;
                    modalTypingTimeout = setTimeout(typeNext, 20);
                }
            }
            modalTypingTimeout = setTimeout(typeNext, 100);
        }

        function typeProject(text, link, isEn) {
            let i = 0;
            function type() {
                if (i < text.length && modal.classList.contains('active')) {
                    modalBody.insertAdjacentText('beforeend', text[i++]);
                    modalTypingTimeout = setTimeout(type, 20);
                } else if (modal.classList.contains('active') && link) {
                    const text = isEn ? '[project link]' : '[link do projeto]';
                    modalBody.insertAdjacentHTML('beforeend', `\n\n> <a href="${link}" target="_blank" class="project-link">${text}</a>`);
                }
            }
            modalTypingTimeout = setTimeout(type, 100);
        }

        document.querySelectorAll('.clickable').forEach(el => {
            el.addEventListener('click', e => { e.stopPropagation(); openModal(el.dataset.modal); });
        });

        closeBtn.addEventListener('click', () => { 
            if (modalTypingTimeout) clearTimeout(modalTypingTimeout); 
            modal.classList.remove('active'); 
        });
        modal.addEventListener('click', e => { 
            if (e.target === modal) { 
                if (modalTypingTimeout) clearTimeout(modalTypingTimeout); 
                modal.classList.remove('active'); 
            } 
        });
        document.addEventListener('keydown', e => { 
            if (e.key === 'Escape') { 
                if (modalTypingTimeout) clearTimeout(modalTypingTimeout); 
                modal.classList.remove('active'); 
            } 
        });

        // === LANGUAGE TOGGLE ===
        const langToggle = document.getElementById('lang-toggle');
        let isEnglish = false;
        langToggle.addEventListener('click', () => {
            isEnglish = !isEnglish;
            document.body.classList.toggle('en', isEnglish);
            document.querySelectorAll('[data-en]').forEach(el => {
                if (isEnglish) { el.dataset.pt = el.textContent; el.textContent = el.dataset.en; }
                else { el.textContent = el.dataset.pt || el.dataset.en; }
            });
            document.querySelectorAll('.clickable').forEach(el => {
                const item = modalData[el.dataset.modal];
                if (item) {
                    const data = isEnglish ? (item.en || item) : item;
                    el.textContent = data.title + (isEnglish ? ' - Click to view' : ' - Clique para ver');
                }
            });
        });
    </script>
</body>
</html>
