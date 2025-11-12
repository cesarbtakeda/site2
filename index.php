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
    <title>>_ CesarBTakeda | HACK THE PLANET</title>
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
            --modal-bg: rgba(5, 5, 5, 0.95);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg-dark);
            color: var(--neon-green);
            font-family: 'Roboto Mono', monospace;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        /* CRT Scanlines */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: repeating-linear-gradient(0deg, rgba(0,0,0,0.15), rgba(0,0,0,0.15) 1px, transparent 1px, transparent 2px);
            pointer-events: none;
            z-index: 9998;
            animation: scan 8s linear infinite;
        }
        @keyframes scan { 0% { transform: translateY(0); } 100% { transform: translateY(100vh); } }

        /* Glitch */
        @keyframes glitch {
            0%, 100% { text-shadow: 0.05em 0 0 #00ff00, -0.05em 0 0 #ff00ff; }
            15% { text-shadow: -0.05em 0 0 #00ff00, 0.05em 0 0 #ff00ff; }
            50% { text-shadow: 0.05em 0.05em 0 #00ff00, -0.05em -0.05em 0 #ff00ff; }
        }
        .glitch { animation: glitch 1.5s infinite; display: inline-block; }

        header {
            text-align: center;
            padding: 2rem 1rem;
            border-bottom: 1px solid var(--neon-green);
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.3);
            position: relative;
        }

        #lang-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #009c3b 0%, #009c3b 35%, #ffdf00 35%, #ffdf00 65%, #002776 65%, #002776 100%);
            border: 2px solid var(--neon-green);
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(57, 255, 20, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            text-shadow: 0 0 5px #000;
            transition: all 0.3s;
            z-index: 9997;
        }
        #lang-toggle:hover { transform: scale(1.1); box-shadow: 0 0 25px rgba(57, 255, 20, 0.9); }
        #lang-toggle::after { content: "BR"; font-weight: bold; }
        body.en #lang-toggle::after { content: "EN"; }

        #ascii-art {
            font-family: 'Courier New', monospace;
            color: var(--neon-green);
            text-shadow: var(--text-glow);
            font-size: 0.8rem;
            line-height: 1;
            white-space: pre;
            margin-bottom: 1rem;
            overflow: hidden;
            border-right: 2px solid var(--neon-green);
            width: 0;
            display: inline-block;
            animation: blink 0.7s infinite;
        }
        @keyframes blink { 50% { border-color: transparent; } }

        .header-text h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            text-shadow: var(--text-glow);
            letter-spacing: 4px;
            margin-bottom: 0.5rem;
        }
        .quote {
            font-style: italic;
            color: var(--neon-cyan);
            text-shadow: var(--text-glow-cyan);
            font-size: 1.1rem;
        }

        main { max-width: 1000px; margin: 2rem auto; padding: 0 1rem; }
        section {
            margin-bottom: 3rem;
            padding: 1.5rem;
            background: rgba(10, 10, 10, 0.8);
            border: 1px solid var(--neon-green);
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(57, 255, 20, 0.2);
        }
        h2 {
            font-family: 'Orbitron', sans-serif;
            color: var(--neon-pink);
            text-shadow: 0 0 15px var(--neon-pink);
            font-size: 1.8rem;
            margin-bottom: 1rem;
            position: relative;
        }
        h2::before { content: "> "; color: var(--neon-green); }

        ul { list-style: none; }
        li {
            margin: 0.8rem 0;
            position: relative;
            padding-left: 1.5rem;
        }
        li::before {
            content: "└─";
            color: var(--neon-cyan);
            position: absolute;
            left: 0;
        }

        .clickable {
            color: var(--neon-cyan);
            cursor: pointer;
            text-decoration: underline;
            font-weight: bold;
            transition: all 0.3s;
        }
        .clickable:hover {
            color: var(--neon-pink);
            text-shadow: 0 0 10px var(--neon-pink);
            animation: glitch 0.3s;
        }

        a {
            color: var(--neon-cyan);
            text-decoration: none;
            transition: all 0.3s;
        }
        a:hover {
            color: var(--neon-pink);
            text-shadow: 0 0 10px var(--neon-pink);
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            color: #555;
            font-size: 0.8rem;
            border-top: 1px solid #333;
            text-shadow: 0 0 5px rgba(57, 255, 20, 0.3);
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: var(--modal-bg);
            backdrop-filter: blur(5px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .modal.active { display: flex; animation: fadeIn 0.4s; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        .modal-content {
            background: #000;
            border: 2px solid var(--neon-green);
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            overflow-y: auto;
            padding: 1.5rem;
            box-shadow: 0 0 30px rgba(57, 255, 20, 0.5);
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            border-bottom: 1px dashed var(--neon-green);
            padding-bottom: 0.5rem;
        }
        .modal-title {
            font-family: 'Orbitron', sans-serif;
            color: var(--neon-pink);
            font-size: 1.5rem;
            text-shadow: 0 0 10px var(--neon-pink);
        }
        .close-modal {
            color: var(--neon-cyan);
            font-size: 1.8rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .close-modal:hover {
            color: #ff0000;
            text-shadow: 0 0 10px #ff0000;
        }

        .typing-text {
            color: var(--neon-green);
            white-space: pre-wrap;
            font-family: 'Roboto Mono', monospace;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .header-text h1 { font-size: 2rem; }
            #ascii-art { font-size: 0.6rem; }
            .modal-content { padding: 1rem; }
            #lang-toggle { width: 35px; height: 35px; font-size: 1rem; }
        }
    </style>
</head>
<body>

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
            <p data-en="Passionate about technology and cybersecurity. Skilled in ethical hacking, exploit development, and network intrusion." class="terminal-line">
                Apaixonado por tecnologia e cibersegurança. Habilidoso em hacking ético, desenvolvimento de exploits e intrusão de redes.
            </p>
        </section>

        <section id="skills">
            <h2 data-en="skills --list">skills --list</h2>
            <ul>
                <li><span class="clickable" data-modal="skill1">Bancos de Dados - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill2">Sistemas Operacionais - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill3">Certificações - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill4">Hacking & Pentest - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill5">Linguagens de Programação - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill6">Segurança de Rede - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill7">Tecnologias Web - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill8">Cloud - Clique para ver</span></li>
                <li><span class="clickable" data-modal="skill9">Ferramentas - Clique para ver</span></li>
            </ul>
        </section>

        <section id="hosting-projects">
            <h2 data-en="projects --scan">projects --scan</h2>
            <ul>
                <li><span class="clickable" data-modal="proj1">Tool-Anti-Phishing - Clique para ver</span></li>
                <li><span class="clickable" data-modal="proj2">UPX Gestão de Reclamações - Clique para ver</span></li>
                <li><span class="clickable" data-modal="proj3">H00ks_T0x1na - Clique para ver</span></li>
                <li><span class="clickable" data-modal="proj4">7-Zip CVE-2025-0411 - Clique para ver</span></li>
                <li><span class="clickable" data-modal="proj5">InstaInsane - Clique para ver</span></li>
                <li><span class="clickable" data-modal="proj6">Am3b4_T00ls - Clique para ver</span></li>
            </ul>
        </section>

        <section id="bug-bounty">
            <h2 data-en="bugbounty --report">bugbounty --report</h2>
            <ul>
                <li><span class="clickable" data-modal="bug1">Pichau - Clique para ver</span></li>
                <li><span class="clickable" data-modal="bug2">9altitudes - Clique para ver</span></li>
                <li><span class="clickable" data-modal="bug3">GlasDoor - Clique para ver</span></li>
                <li><span class="clickable" data-modal="bug4">Trip.com - Clique para ver</span></li>
                <li><span class="clickable" data-modal="bug5">CacauShow - Clique para ver</span></li>
                <li><span class="clickable" data-modal="bug6">Playtika - Clique para ver</span></li>
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

    <!-- MODAL -->
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

    <script>
        let typingTimeout = null;

        // Carrega ASCII art diretamente de /static/ascii.txt (SEM FALLBACK)
        function loadAscii() {
            const el = document.getElementById('ascii-art');
            el.textContent = '';
            el.style.width = '0';
            el.style.borderRight = '2px solid var(--neon-green)';

            fetch("/static/ascii.txt")
                .then(response => {
                    if (!response.ok) throw new Error("Arquivo não encontrado: " + response.status);
                    return response.text();
                })
                .then(data => {
                    let i = 0;
                    function type() {
                        if (i < data.length) {
                            el.textContent += data[i];
                            i++;
                            typingTimeout = setTimeout(type, 30);
                        } else {
                            el.style.borderRight = 'none';
                            el.style.width = '100%';
                        }
                    }
                    type();
                })
                .catch(err => {
                    console.error("Erro ao carregar ASCII:", err);
                    el.textContent = "ERROR: ASCII NOT LOADED";
                    el.style.color = "#ff0000";
                    el.style.borderRight = 'none';
                });
        }

        // Inicia carregamento do ASCII
        loadAscii();

        // Dados dos modais
        const modalData = {
            skill1: { title: "Bancos de Dados", content: "> MySQL\n> PostgreSQL\n> MongoDB\n> SQLite\n> Redis\n\n> Proficiência em design e otimização de BD relacionais e NoSQL." },
            skill2: { title: "Sistemas Operacionais", content: "> Debian 12\n> Kali Linux (WSL)\n> Arch Linux\n> BlackArch Linux\n> Windows 11 + WSL\n\n> Experiência em configuração, hardening e troubleshooting." },
            skill3: { title: "Certificações", content: "> ISO-17024 | IC-PEN-1560 [Ver Cert]\n> PT-IC-SOC-380 [Ver Cert]\n> PT-IC-LNX-1180 [Ver Cert]\n> PT-IC-SEC-1780 [Ver Cert]\n> Google Cloud Professional\n\n> Certificações em pentest, SOC e Linux security." },
            skill4: { title: "Hacking & Pentest", content: "> Vulnerability Assessment\n> Exploit Development\n> Web Application Security\n> Network Penetration Testing\n> Reverse Engineering\n\n> Ferramentas: Metasploit, Burp, Nmap." },
            skill5: { title: "Linguagens de Programação", content: "> PHP 8\n> JavaScript (ES6+)\n> Python 3\n> Bash Script\n> SQL\n\n> Desenvolvimento de tools customizadas para security." },
            skill6: { title: "Segurança de Rede", content: "> WAF/IDS/IPS\n> VPNs (OpenVPN, WireGuard)\n> Network Protocols\n> Wireless Security (WPA3, Evil Twin)\n\n> Configuração e auditoria de infra segura." },
            skill7: { title: "Tecnologias Web", content: "> HTML5 / CSS3\n> JavaScript (Vanilla + Frameworks)\n> PHP 8+\n> REST APIs\n\n> Desenvolvimento full-stack com foco em secure coding." },
            skill8: { title: "Cloud Technologies", content: "> AWS (EC2, S3, Lambda)\n> Google Cloud Platform\n> Microsoft Azure\n\n> Deploy e security de aplicações na nuvem." },
            skill9: { title: "Ferramentas de Cybersecurity", content: "> Wireshark\n> Metasploit\n> Nmap\n> Burp Suite\n> sqlmap\n> John the Ripper\n\n> Uso avançado em red team operations." },

            proj1: { title: "Tool-Anti-Phishing", content: "> Ferramenta desenvolvida para interceptar conexões de phishing e encher o cache de log do atacante.\n> Usa rede Tor e proxies para anonimato do usuário.\n> Proteção contra trojans, e-mails phishing e derrubada de VPNs em IPs públicos.\n\n> GitHub: https://github.com/cesarbtakeda/Tool-Anti-Phishing\n> Status: Ativo | Linguagem: Python/Bash" },
            proj2: { title: "UPX_PROJETO_GESTAO_DE_RECLAMACAO", content: "> Projeto desenvolvido na faculdade durante o curso UPX.\n> Sistema para gerenciar reclamações de forma dinâmica e massiva.\n> Gera relatórios diários de qualquer tipo de empresa, cidade ou sindicato.\n\n> GitHub: https://github.com/cesarbtakeda/UPX_PROJETO_GESTAO_DE_RECLAMACAO\n> Status: Concluído | Linguagem: PHP/MySQL" },
            proj3: { title: "H00ks_T0x1na", content: "> Framework de Phishing (Social Engineering) para controle remoto de PC ou mobile via links.\n> Compatível com Windows, Android e iPhone.\n> Escrito em HTML, CSS, PHP, JavaScript, BashScript.\n> Alpha 0.1 com API interna de templates e setup.sh.\n\n> GitHub: https://github.com/cesarbtakeda/H00ks_T0x1na\n> Status: Em Desenvolvimento" },
            proj4: { title: "7-Zip-CVE-2025-0411-POC", content: "> Vulnerabilidade (CVSS 7.0) que permite bypass do Mark-of-the-Web no 7-Zip.\n> Atacante remoto executa código arbitrário via arquivo malicioso.\n> Exploração requer interação do usuário (abrir arquivo).\n> Falha na propagação de MotW para arquivos extraídos.\n\n> GitHub: https://github.com/cesarbtakeda/7-Zip-CVE-2025-0411-POC\n> Status: PoC Liberado" },
            proj5: { title: "InstaInsane 1.1", content: "> Backend Python para ataques de bruteforce em ambientes controlados.\n> Rápido, limpo e com bypass rápido de defesas.\n> Projetado para testes éticos e pesquisa.\n\n> GitHub: https://github.com/cesarbtakeda/instainsane1.1\n> Status: v1.1 Estável" },
            proj6: { title: "Am3b4_t00ls", content: "> Solução própria de bug bounty automation.\n> Ferramentas para recon quando o tempo é curto.\n> Strings customizáveis com as melhores tools pré-definidas.\n\n> GitHub: https://github.com/cesarbtakeda/Am3b4_t00ls\n> Status: Ativo | Uso: Bug Bounty" },

            bug1: { title: "Pichau Bug", content: "> Alvo: Pichau\n> Vulnerabilidade: OpenRedirect | CWE-601\n> Plataforma: OpenBugBounty\n> Data: 26 de Junho, 2025\n> Detalhes: Redirecionamento aberto permitindo phishing.\n> Status: Reportado e Resolvido" },
            bug2: { title: "9altitudes Bug", content: "> Vulnerabilidade: XSS | CWE-79\n> Detalhes: Encontrado na fase de recon analisando subdomínios com footprint. Botão de busca bloqueado por WAF, bypass com div mouseover para executar XSS ao passar o mouse.\n> Plataforma: Intigriti\n> Data: 26 de Junho, 2025\n> Status: Triage" },
            bug3: { title: "GlasDoor Bug", content: "> Vulnerabilidade: CSRF | CWE-532\n> Detalhes: CSRF exposto no reset de senha, token sem limite de expiração, reutilizável e manipulável após primeiro uso!\n> Plataforma: HackerOne\n> Data: 16 de Fevereiro, 2025\n> Status: Duplicado" },
            bug4: { title: "Trip Bug", content: "> Vulnerabilidade: RCE\n> Detalhes: trip.com vulnerável a exploit RCE de servidor DNS vulnerável, permitindo acesso remoto via configuração dnsnameserver. Versão desatualizada de nginx.\n> Plataforma: HackerOne\n> Data: 29 de Setembro, 2024\n> Status: Informado" },
            bug5: { title: "CacauShow Bug", content: "> Vulnerabilidade: XSS | CWE-79\n> Detalhes: XSS Refletido no campo de busca da Cacau Show. Sem sanitização de JavaScript, permitindo escalada para HTMLi e RCE via fixação de sessão. Gravidade: Média-Alta devido à facilidade de escalação.\n> Plataforma: N/A (Disclosure Direto)\n> Data: 9 de Março, 2025\n> Campo vulnerável: Search Field" },
            bug6: { title: "Playtika Bug", content: "> Vulnerabilidade: OpenRedirect | CWE-601\n> Detalhes: Open Redirect e banner grabbing no subdomínio bingoblitz.com da Playtika.\n> Plataforma: HackerOne\n> Data: 19 de Março, 2025\n> Status: Reportado" }
        };

        // Sistema de Modal (cancela digitação anterior)
        const modal = document.getElementById('modal');
        const modalTitle = document.getElementById('modal-title');
        const modalBody = document.getElementById('modal-body');
        const closeBtn = document.querySelector('.close-modal');

        function openModal(id) {
            if (typingTimeout) clearTimeout(typingTimeout);
            modal.classList.remove('active');
            setTimeout(() => {
                const item = modalData[id];
                if (!item) return;
                modalTitle.textContent = item.title;
                modalBody.textContent = '';
                modal.classList.add('active');

                let i = 0;
                const text = item.content;
                function typeWriter() {
                    if (i < text.length && modal.classList.contains('active')) {
                        modalBody.textContent += text.charAt(i);
                        i++;
                        typingTimeout = setTimeout(typeWriter, 20);
                    }
                }
                typingTimeout = setTimeout(typeWriter, 100);
            }, 100);
        }

        document.querySelectorAll('.clickable').forEach(el => {
            el.addEventListener('click', e => {
                e.stopPropagation();
                openModal(el.dataset.modal);
            });
        });

        closeBtn.addEventListener('click', () => {
            if (typingTimeout) clearTimeout(typingTimeout);
            modal.classList.remove('active');
        });
        modal.addEventListener('click', e => {
            if (e.target === modal) {
                if (typingTimeout) clearTimeout(typingTimeout);
                modal.classList.remove('active');
            }
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                if (typingTimeout) clearTimeout(typingTimeout);
                modal.classList.remove('active');
            }
        });

        // Alternar idioma
        const langToggle = document.getElementById('lang-toggle');
        let isEnglish = false;

        langToggle.addEventListener('click', () => {
            isEnglish = !isEnglish;
            document.body.classList.toggle('en', isEnglish);

            document.querySelectorAll('[data-en]').forEach(el => {
                if (isEnglish) {
                    el.dataset.pt = el.textContent;
                    el.textContent = el.dataset.en;
                } else {
                    el.textContent = el.dataset.pt || el.dataset.en;
                }
            });

            document.querySelectorAll('.clickable').forEach(el => {
                const id = el.dataset.modal;
                const item = modalData[id];
                if (item) {
                    const suffix = isEnglish ? ' - Click to view' : ' - Clique para ver';
                    el.textContent = item.title + suffix;
                }
            });
        });
    </script>
</body>
</html>