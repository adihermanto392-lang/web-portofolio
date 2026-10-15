<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portofolio Muhammad Aldi Hermanto - Pengembang Web & UI/UX Enthusiast">
  <title>Portofolio - Muhammad Aldi Hermanto</title>
  
  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    /* --- RESET & VARIABLES --- */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    :root {
      --primary: #6366f1;
      --secondary: #ec4899;
      --bg: #020617;
      --bg-light: #0f172a;
      --text: #f8fafc;
      --text-muted: #94a3b8;
      --card-bg: rgba(30, 41, 59, 0.4);
      --card-border: rgba(255, 255, 255, 0.08);
      --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
    }
    
    html { scroll-behavior: smooth; }
    body {
      background-color: var(--bg);
      color: var(--text);
      font-family: 'Plus Jakarta Sans', sans-serif;
      line-height: 1.7;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* --- CUSTOM SCROLLBAR --- */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: linear-gradient(180deg, var(--primary), var(--secondary)); border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--primary); }

    /* --- ANIMATED BACKGROUND --- */
    body::before {
      content: ""; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none; z-index: 9998; opacity: 0.5;
    }
    
    body::after {
      content: ""; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
      background-size: 50px 50px;
      pointer-events: none; z-index: -1; mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
    }

    .bg-glow {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      pointer-events: none; z-index: -2; overflow: hidden;
    }
    .glow-orb {
      position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.15;
      animation: floatOrb 25s infinite ease-in-out alternate;
    }
    .glow-orb-1 { width: 700px; height: 700px; background: var(--primary); top: -20%; left: -10%; }
    .glow-orb-2 { width: 600px; height: 600px; background: var(--secondary); bottom: -10%; right: -10%; animation-delay: -12s; }
    @keyframes floatOrb {
      0% { transform: translate(0, 0) scale(1); }
      100% { transform: translate(80px, -80px) scale(1.15); }
    }

    /* --- SCROLL PROGRESS --- */
    .scroll-progress {
      position: fixed; top: 0; left: 0; height: 3px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      width: 0%; z-index: 1001; transition: width 0.1s linear;
      box-shadow: 0 0 15px var(--primary);
    }

    /* --- NAVBAR --- */
    nav {
      position: fixed; top: 0; width: 100%; padding: 1.2rem 5%;
      background: rgba(2, 6, 23, 0.7); backdrop-filter: blur(20px) saturate(180%);
      display: flex; justify-content: space-between; align-items: center;
      z-index: 1000; border-bottom: 1px solid var(--card-border);
      transition: padding 0.3s ease, background 0.3s ease;
    }
    nav.scrolled { padding: 0.8rem 5%; background: rgba(2, 6, 23, 0.95); }
    .logo {
      font-size: 1.6rem; font-weight: 800; letter-spacing: -1px;
      background: linear-gradient(135deg, #fff 0%, var(--primary) 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      transition: opacity 0.3s;
    }
    .logo:active { opacity: 0.7; }
    .nav-links { display: flex; gap: 2.5rem; list-style: none; }
    .nav-links a {
      color: var(--text-muted); text-decoration: none; font-weight: 500; font-size: 0.95rem;
      transition: color 0.3s ease; position: relative; padding: 0.5rem 0;
    }
    .nav-links a:hover, .nav-links a.active { color: #fff; }
    .nav-links a::after {
      content: ''; position: absolute; bottom: 0; left: 0; width: 0; height: 2px;
      background: linear-gradient(90deg, var(--primary), var(--secondary)); 
      transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .nav-links a:hover::after, .nav-links a.active::after { width: 100%; }
    .menu-toggle { display: none; font-size: 1.5rem; cursor: pointer; background: none; border: none; color: var(--text); transition: transform 0.3s; }
    .menu-toggle:active { transform: scale(0.9); }

    /* --- HERO SECTION --- */
    .hero {
      min-height: 100vh; display: flex; align-items: center; justify-content: center;
      padding: 0 5%; position: relative;
    }
    .hero-content { max-width: 900px; text-align: center; z-index: 1; }
    .hero-badge {
      display: inline-flex; align-items: center; gap: 0.5rem;
      padding: 0.5rem 1.2rem; border-radius: 50px;
      background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.3);
      color: var(--primary); font-size: 0.85rem; font-weight: 600; margin-bottom: 2rem;
      letter-spacing: 0.5px; text-transform: uppercase;
      backdrop-filter: blur(10px);
    }
    
    .hero-title {
      font-size: clamp(3rem, 7vw, 5.5rem); 
      font-weight: 800; letter-spacing: -2px; margin-bottom: 1.5rem; line-height: 1.1;
      animation: levitate 6s ease-in-out infinite;
    }
    .name-line {
      display: block; opacity: 0; transform: translateY(40px);
      animation: revealUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }
    .name-line:nth-child(2) { animation-delay: 0.2s; }

    .name-line.highlight {
      background: linear-gradient(90deg, var(--primary), var(--secondary), #ffffff, var(--primary));
      background-size: 300% 100%;
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      animation: revealUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) 0.2s forwards, shimmer 4s linear infinite;
      filter: drop-shadow(0 0 30px rgba(99, 102, 241, 0.4));
    }

    @keyframes revealUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes shimmer { 0% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
    @keyframes levitate { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

    .hero .subtitle {
      font-size: clamp(1.1rem, 2.5vw, 1.4rem);
      color: var(--text-muted); margin-bottom: 3rem; font-weight: 400;
      opacity: 0; animation: revealUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) 0.5s forwards;
    }
    .cursor-blink { animation: blink 1s infinite; color: var(--primary); font-weight: 300; }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

    .btn-group { 
      display: flex; gap: 1.2rem; justify-content: center; flex-wrap: wrap; 
      opacity: 0; animation: revealUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) 0.7s forwards;
    }
    .btn {
      padding: 1rem 2.5rem; border-radius: 14px; text-decoration: none;
      font-weight: 600; font-size: 1rem; 
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      display: inline-flex; align-items: center; gap: 0.7rem; position: relative; overflow: hidden;
    }
    .btn:active { transform: scale(0.97) !important; }
    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white; border: 1px solid transparent;
      box-shadow: 0 10px 30px -10px rgba(99, 102, 241, 0.6);
    }
    .btn-primary:hover { transform: translateY(-4px); box-shadow: 0 20px 40px -10px rgba(99, 102, 241, 0.8); }
    .btn-outline {
      background: rgba(255,255,255,0.03); border: 1px solid var(--card-border); color: var(--text);
      backdrop-filter: blur(10px);
    }
    .btn-outline:hover { background: rgba(255,255,255,0.08); border-color: var(--primary); transform: translateY(-4px); }

    /* --- SECTION GENERAL --- */
    section { padding: 8rem 5%; }
    .section-title { text-align: center; font-size: clamp(2.2rem, 5vw, 3.2rem); font-weight: 800; margin-bottom: 1rem; letter-spacing: -1.5px; }
    .section-title span {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }
    .section-subtitle { text-align: center; color: var(--text-muted); margin-bottom: 4rem; font-size: 1.1rem; max-width: 600px; margin-left: auto; margin-right: auto; }

    /* --- TENTANG --- */
    .about-grid {
      display: grid; grid-template-columns: 1fr 1.5fr; gap: 5rem;
      max-width: 1100px; margin: 0 auto; align-items: center;
    }
    .about-img-wrapper {
      position: relative; padding: 3px; border-radius: 28px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.3);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .about-img-wrapper:hover { transform: translateY(-8px) rotate(-2deg); box-shadow: 0 35px 60px -15px rgba(99, 102, 241, 0.5); }
    .about-img { width: 100%; aspect-ratio: 1; border-radius: 26px; overflow: hidden; background: var(--bg-light); border: 4px solid var(--bg); }
    .about-img img { width: 100%; height: 100%; object-fit: cover; object-position: center 20%; transition: transform 0.6s ease; }
    .about-img-wrapper:hover .about-img img { transform: scale(1.08); }
    
    .about-text p { color: var(--text-muted); margin-bottom: 1.5rem; font-size: 1.1rem; line-height: 1.8; }
    .about-info { 
      display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-top: 2.5rem;
      background: var(--card-bg); padding: 2rem; border-radius: 20px;
      border: 1px solid var(--card-border); backdrop-filter: blur(16px);
      box-shadow: var(--glass-shadow);
    }
    .about-info div { display: flex; flex-direction: column; gap: 0.4rem; }
    .about-info div span.label { font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600; }
    .about-info div strong { color: #fff; font-size: 1.05rem; font-weight: 600; }

    /* --- KEAHLIAN --- */
    .skills-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem; max-width: 1100px; margin: 0 auto;
    }
    .skill-card {
      background: var(--card-bg); padding: 2.5rem 2rem; border-radius: 24px;
      border: 1px solid var(--card-border); position: relative; overflow: hidden;
      opacity: 0; transform: translateY(40px);
      transition: opacity 0.6s ease, transform 0.4s ease, border-color 0.3s ease;
      backdrop-filter: blur(16px); box-shadow: var(--glass-shadow);
    }
    .skill-card:active { transform: translateY(-4px) scale(0.98) !important; }
    .skill-card::before {
      content: ""; position: absolute; inset: 0; border-radius: 24px; padding: 1px;
      background: radial-gradient(600px circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(255,255,255,0.15), transparent 40%);
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor; mask-composite: exclude;
      opacity: 0; transition: opacity 0.5s; pointer-events: none;
    }
    .skill-card:hover::before { opacity: 1; }
    .skill-card.visible { opacity: 1; transform: translateY(0); }
    .skill-card:hover { border-color: rgba(99, 102, 241, 0.4); transform: translateY(-8px); }
    
    .skill-card i {
      font-size: 3rem; margin-bottom: 1.5rem;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      filter: drop-shadow(0 0 15px rgba(99, 102, 241, 0.3));
    }
    .skill-card h3 { margin-bottom: 0.8rem; font-size: 1.4rem; font-weight: 700; }
    .skill-card p { color: var(--text-muted); font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.6; }
    
    .skill-progress { width: 100%; height: 8px; background: rgba(255,255,255,0.05); border-radius: 10px; overflow: hidden; position: relative; }
    .skill-bar {
      height: 100%; background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 10px; width: 0%; transition: width 1.5s cubic-bezier(0.22, 1, 0.36, 1);
      box-shadow: 0 0 15px var(--primary); position: relative;
    }
    .skill-bar::after {
      content: ''; position: absolute; right: 0; top: 50%; transform: translateY(-50%);
      width: 12px; height: 12px; background: #fff; border-radius: 50%;
      box-shadow: 0 0 10px #fff, 0 0 20px var(--primary);
    }
    .skill-card.visible .skill-bar { width: var(--level); }

    /* --- SERTIFIKAT --- */
    .certificates-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
      gap: 2.5rem; max-width: 1100px; margin: 0 auto;
    }
    .certificate-card {
      background: var(--card-bg); border-radius: 24px; overflow: hidden;
      border: 1px solid var(--card-border); position: relative;
      display: flex; flex-direction: column;
      opacity: 0; transform: translateY(40px);
      transition: opacity 0.6s ease, transform 0.4s ease, border-color 0.3s ease;
      backdrop-filter: blur(16px); box-shadow: var(--glass-shadow);
    }
    .certificate-card:active { transform: translateY(-5px) scale(0.98) !important; }
    .certificate-card::before {
      content: ""; position: absolute; inset: 0; border-radius: 24px; padding: 1px;
      background: radial-gradient(600px circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(255,255,255,0.15), transparent 40%);
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor; mask-composite: exclude;
      opacity: 0; transition: opacity 0.5s; pointer-events: none; z-index: 2;
    }
    .certificate-card:hover::before { opacity: 1; }
    .certificate-card.visible { opacity: 1; transform: translateY(0); }
    .certificate-card:hover { border-color: rgba(99, 102, 241, 0.4); transform: translateY(-10px) scale(1.02); }

    .certificate-img { width: 100%; height: 200px; overflow: hidden; background: #0f172a; border-bottom: 1px solid var(--card-border); position: relative; }
    .certificate-img img { width: 100%; height: 100%; object-fit: cover; object-position: top center; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
    .certificate-card:hover .certificate-img img { transform: scale(1.1); }
    .certificate-img::after {
      content: ''; position: absolute; inset: 0;
      background: linear-gradient(to top, var(--bg-light), transparent);
    }
    
    .certificate-body { padding: 2rem; display: flex; flex-direction: column; flex-grow: 1; position: relative; z-index: 1; }
    .certificate-tag { 
      font-size: 0.7rem; font-weight: 700; color: var(--primary); text-transform: uppercase; 
      letter-spacing: 1.5px; margin-bottom: 1rem; display: inline-block;
      background: rgba(99, 102, 241, 0.1); padding: 0.4rem 1rem; border-radius: 8px; width: fit-content;
      border: 1px solid rgba(99, 102, 241, 0.2);
    }
    .certificate-title { font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem; color: #fff; line-height: 1.4; }
    .certificate-meta { font-size: 0.9rem; color: var(--text-muted); margin-bottom: 2rem; }
    .certificate-meta div { margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.6rem; }
    
    .certificate-btn {
      margin-top: auto; align-self: flex-start; padding: 0.8rem 1.8rem; font-size: 0.9rem; font-weight: 600;
      border-radius: 12px; border: 1px solid var(--card-border); color: var(--text);
      text-decoration: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); display: inline-flex; align-items: center; gap: 0.6rem;
      background: rgba(255,255,255,0.03);
    }
    .certificate-btn:active { transform: scale(0.97) !important; }
    .certificate-btn:hover {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white; border-color: transparent; box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
      transform: translateX(5px);
    }

    /* --- KONTAK & FORMULIR --- */
    .contact-wrapper {
      max-width: 900px; margin: 0 auto;
      display: grid; grid-template-columns: 1fr 1.2fr; gap: 3rem; align-items: start;
    }
    .contact-info {
      background: var(--card-bg); border: 1px solid var(--card-border);
      border-radius: 24px; padding: 2.5rem;
      backdrop-filter: blur(20px); box-shadow: var(--glass-shadow);
    }
    .contact-info h3 { font-size: 1.5rem; margin-bottom: 1rem; color: #fff; }
    .contact-info p { color: var(--text-muted); margin-bottom: 2rem; line-height: 1.7; }
    
    .contact-form {
      background: var(--card-bg); border: 1px solid var(--card-border);
      border-radius: 24px; padding: 2.5rem;
      backdrop-filter: blur(20px); box-shadow: var(--glass-shadow);
    }
    .form-group { margin-bottom: 1.5rem; position: relative; }
    .form-group label {
      display: block; font-size: 0.85rem; font-weight: 600; color: var(--text-muted);
      margin-bottom: 0.5rem; transition: color 0.3s;
    }
    .form-group input, .form-group textarea {
      width: 100%; padding: 1rem 1.2rem; background: rgba(255,255,255,0.03);
      border: 1px solid var(--card-border); border-radius: 12px; color: #fff;
      font-family: inherit; font-size: 1rem; outline: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .form-group input:focus, .form-group textarea:focus {
      border-color: var(--primary); background: rgba(99, 102, 241, 0.05);
      box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }
    .form-group input:focus + label, .form-group textarea:focus + label { color: var(--primary); }
    .form-group textarea { min-height: 140px; resize: vertical; }
    
    .submit-btn {
      width: 100%; padding: 1rem; border: none; border-radius: 12px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white; font-weight: 700; font-size: 1rem; cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 10px 30px -10px rgba(99, 102, 241, 0.6);
    }
    .submit-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 35px -10px rgba(99, 102, 241, 0.8); }
    .submit-btn:active { transform: scale(0.98) !important; }

    .social-links { display: flex; gap: 1rem; margin-top: 2rem; }
    .social-links a {
      width: 50px; height: 50px; border-radius: 14px; background: rgba(255,255,255,0.03);
      display: flex; align-items: center; justify-content: center; color: var(--text);
      font-size: 1.3rem; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); text-decoration: none;
      border: 1px solid var(--card-border);
    }
    .social-links a:active { transform: scale(0.9) !important; }
    .social-links a:hover {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      transform: translateY(-5px); border-color: transparent;
      box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
    }

    /* --- FOOTER --- */
    footer { 
      text-align: center; padding: 3rem 2rem; background: rgba(15, 23, 42, 0.3); 
      color: var(--text-muted); border-top: 1px solid var(--card-border);
      backdrop-filter: blur(10px); font-size: 0.95rem;
    }

    /* --- ANIMASI REVEAL --- */
    .reveal-blur {
      opacity: 0; transform: translateY(40px); filter: blur(10px);
      transition: opacity 0.8s ease, transform 0.8s ease, filter 0.8s ease;
    }
    .reveal-blur.visible { opacity: 1; transform: translateY(0); filter: blur(0); }

    /* --- THEME SWITCHER & SCROLL TOP --- */
    .theme-toggle, .scroll-top {
      position: fixed; right: 30px; width: 55px; height: 55px;
      border-radius: 18px; border: 1px solid var(--card-border); cursor: pointer; font-size: 1.3rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3); z-index: 999;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      display: flex; align-items: center; justify-content: center;
      background: var(--card-bg); backdrop-filter: blur(16px); color: var(--text);
    }
    .theme-toggle:active, .scroll-top:active { transform: scale(0.9) !important; }
    .theme-toggle { bottom: 30px; background: linear-gradient(135deg, var(--primary), var(--secondary)); border: none; color: white; }
    .theme-toggle:hover { transform: scale(1.1) rotate(15deg); box-shadow: 0 15px 40px rgba(99, 102, 241, 0.5); }
    
    .scroll-top { bottom: 100px; opacity: 0; transform: translateY(20px); pointer-events: none; }
    .scroll-top.visible { opacity: 1; transform: translateY(0); pointer-events: auto; }
    .scroll-top:hover { background: var(--primary); color: white; border-color: transparent; }

    .theme-panel {
      position: fixed; bottom: 100px; right: 30px;
      background: rgba(15, 23, 42, 0.9); border: 1px solid var(--card-border);
      border-radius: 24px; padding: 1.5rem;
      box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); z-index: 998;
      opacity: 0; transform: translateY(20px) scale(0.95);
      pointer-events: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); min-width: 260px;
      backdrop-filter: blur(20px);
    }
    .theme-panel.active { opacity: 1; transform: translateY(0) scale(1); pointer-events: auto; }
    .theme-panel h4 { margin-bottom: 1.2rem; font-size: 1rem; color: #fff; display: flex; align-items: center; gap: 0.6rem; font-weight: 600; }
    .theme-options { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
    .theme-option {
      width: 60px; height: 60px; border-radius: 16px; cursor: pointer;
      border: 2px solid transparent; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;
    }
    .theme-option:active { transform: scale(0.9) !important; }
    .theme-option:hover { transform: scale(1.1); }
    .theme-option.active { border-color: #fff; box-shadow: 0 0 20px rgba(255,255,255,0.2); }
    .theme-option::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 50%; background: var(--color1); }
    .theme-option::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 50%; background: var(--color2); }

    /* --- RESPONSIF --- */
    @media (max-width: 900px) {
      .about-grid { grid-template-columns: 1fr; text-align: center; gap: 3rem; }
      .about-img-wrapper { max-width: 320px; margin: 0 auto; }
      .about-info { text-align: left; }
      .contact-wrapper { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
      .menu-toggle { display: block; }
      .nav-links {
        position: fixed; top: 70px; right: -100%; flex-direction: column;
        background: rgba(2, 6, 23, 0.98); backdrop-filter: blur(24px);
        width: 100%; height: calc(100vh - 70px); padding: 3rem 2rem; 
        transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
        border-top: 1px solid var(--card-border); gap: 2rem; opacity: 0;
      }
      .nav-links.active { right: 0; opacity: 1; }
      .nav-links a { font-size: 1.2rem; }
      
      .theme-toggle { width: 50px; height: 50px; font-size: 1.2rem; bottom: 20px; right: 20px; }
      .theme-panel { bottom: 80px; right: 20px; min-width: 220px; }
      .scroll-top { bottom: 20px; left: 20px; right: auto; width: 50px; height: 50px; }
      
      .contact-info, .contact-form { padding: 2rem 1.5rem; }
    }
  </style>
</head>
<body>

  <div class="scroll-progress" id="scrollProgress"></div>

  <div class="bg-glow">
    <div class="glow-orb glow-orb-1"></div>
    <div class="glow-orb glow-orb-2"></div>
  </div>

  <nav id="navbar">
    <a href="#beranda" class="logo">Aldi.</a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#beranda" class="nav-link">Beranda</a></li>
      <li><a href="#tentang" class="nav-link">Tentang</a></li>
      <li><a href="#keahlian" class="nav-link">Keahlian</a></li>
      <li><a href="#sertifikat" class="nav-link">Sertifikat</a></li>
      <li><a href="#kontak" class="nav-link">Kontak</a></li>
    </ul>
    <button class="menu-toggle" onclick="toggleMenu()" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>
  </nav>

  <!-- BERANDA -->
  <section class="hero" id="beranda">
    <div class="hero-content">
      <div class="hero-badge reveal-blur">
        <i class="fas fa-sparkles"></i> Selamat Datang di Portofolio Saya
      </div>
      
      <h1 class="hero-title">
        <span class="name-line">Muhammad Aldi</span>
        <span class="name-line highlight">Hermanto</span>
      </h1>
      
      <p class="subtitle">Seorang <span id="typing-text" style="color: #fff; font-weight: 600;"></span><span class="cursor-blink">|</span><br>yang bersemangat menciptakan pengalaman digital premium.</p>
      <div class="btn-group">
        <a href="#tentang" class="btn btn-primary"><i class="fas fa-user"></i> Tentang Saya</a>
        <a href="#kontak" class="btn btn-outline"><i class="fas fa-paper-plane"></i> Hubungi Saya</a>
      </div>
    </div>
  </section>

  <!-- TENTANG -->
  <section id="tentang" class="reveal-blur">
    <h2 class="section-title">Tentang <span>Saya</span></h2>
    <p class="section-subtitle">Kenali saya lebih dekat dan apa yang saya lakukan</p>
    <div class="about-grid">
      <div class="about-img-wrapper">
        <div class="about-img">
          <img src="fotopp.jpeg" alt="Foto Muhammad Aldi Hermanto" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name=Muhammad+Aldi+Hermanto&size=400&background=6366f1&color=fff&bold=true';">
        </div>
      </div>
      <div class="about-text">
        <p>Halo! Saya <strong style="color: #fff;">Muhammad Aldi Hermanto</strong>, seorang pengembang yang berfokus pada pembangunan situs web modern, responsif, dan berkinerja tinggi. Saya percaya bahwa kode yang baik adalah seni yang memecahkan masalah.</p>
        <p>Dengan dedikasi pada detail dan pengalaman pengguna, saya selalu berusaha menghadirkan solusi digital yang tidak hanya berfungsi sempurna, tetapi juga memanjakan mata dan memberikan kesan mendalam.</p>
        <div class="about-info">
          <div><span class="label">Nama Lengkap</span><strong>Muhammad Aldi Hermanto</strong></div>
          <div><span class="label">Email</span><strong>adihermanto392@gmail.com</strong></div>
          <div><span class="label">Lokasi</span><strong>Jember, Jawa Timur</strong></div>
          <div><span class="label">Status</span><strong style="color: #10b981; display: flex; align-items: center; gap: 0.5rem;"><span style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; display: inline-block; box-shadow: 0 0 10px #10b981;"></span> Siap Magang</strong></div>
        </div>
      </div>
    </div>
  </section>

  <!-- KEAHLIAN -->
  <section id="keahlian" class="reveal-blur">
    <h2 class="section-title">Keahlian <span>Teknis</span></h2>
    <p class="section-subtitle">Teknologi dan alat yang saya kuasai untuk membangun produk digital berkualitas</p>
    <div class="skills-grid" id="skillsGrid">
      <div class="skill-card" style="--level: 90%">
        <i class="fab fa-html5"></i>
        <h3>HTML5 & CSS3</h3>
        <p>Struktur semantik, layout modern (Flexbox/Grid), dan animasi halus yang responsif.</p>
        <div class="skill-progress"><div class="skill-bar"></div></div>
      </div>
      <div class="skill-card" style="--level: 85%">
        <i class="fab fa-js"></i>
        <h3>JavaScript</h3>
        <p>Logika interaktif, manipulasi DOM, ES6+, dan integrasi API yang efisien.</p>
        <div class="skill-progress"><div class="skill-bar"></div></div>
      </div>
      <div class="skill-card" style="--level: 80%">
        <i class="fas fa-paint-brush"></i>
        <h3>UI/UX Design</h3>
        <p>Prototyping, wireframing, dan prinsip desain berpusat pada pengguna (User-Centered).</p>
        <div class="skill-progress"><div class="skill-bar"></div></div>
      </div>
    </div>
  </section>

  <!-- SERTIFIKAT -->
  <section id="sertifikat" class="reveal-blur">
    <h2 class="section-title">Sertifikat <span>Resmi</span></h2>
    <p class="section-subtitle">Bukti kompetensi dan komitmen saya terhadap pembelajaran berkelanjutan</p>
    <div class="certificates-grid" id="certGrid">
      <div class="certificate-card">
        <div class="certificate-img">
          <img src="program.jpg" alt="Sertifikat Front End Web" loading="lazy" onerror="this.onerror=null;this.src='https://via.placeholder.com/600x400/0f172a/ffffff?text=Front+End+Web+Bootstrap';">
        </div>
        <div class="certificate-body">
          <div class="certificate-tag">Getskill.id</div>
          <h3 class="certificate-title">Pemrograman Front End Web dengan Bootstrap</h3>
          <div class="certificate-meta">
            <div><i class="fas fa-fingerprint" style="color: var(--primary);"></i> No. 12202605170977</div>
          </div>
          <a href="https://getskill.id/certificate/12202605170977" target="_blank" rel="noopener noreferrer" class="certificate-btn">
            Verifikasi Sertifikat <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="certificate-card">
        <div class="certificate-img">
          <img src="java.jpg" alt="Sertifikat Java Fundamental" loading="lazy" onerror="this.onerror=null;this.src='https://via.placeholder.com/600x400/0f172a/ffffff?text=Java+Fundamental';">
        </div>
        <div class="certificate-body">
          <div class="certificate-tag">Getskill.id</div>
          <h3 class="certificate-title">Java Fundamental Programming</h3>
          <div class="certificate-meta">
            <div><i class="fas fa-fingerprint" style="color: var(--primary);"></i> No. 12202512250396</div>
          </div>
          <a href="https://getskill.id/certificate/12202512250396" target="_blank" rel="noopener noreferrer" class="certificate-btn">
            Verifikasi Sertifikat <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- KONTAK (FORMULIR FUNGSIONAL) -->
  <section id="kontak" class="reveal-blur">
    <h2 class="section-title">Mari <span>Berkolaborasi</span></h2>
    <p class="section-subtitle">Punya ide proyek atau ingin berdiskusi tentang teknologi?</p>
    
    <div class="contact-wrapper">
      <!-- Info Kontak -->
      <div class="contact-info">
        <h3>Hubungi Saya</h3>
        <p>Saya selalu terbuka untuk peluang magang, proyek freelance, atau sekadar berdiskusi. Isi formulir di samping, atau hubungi saya langsung melalui media sosial di bawah ini.</p>
        
        <div class="social-links">
          <a href="https://instagram.com/aldi_.908" target="_blank" rel="noopener noreferrer" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="mailto:adihermanto392@gmail.com" title="Kirim Email Langsung"><i class="fas fa-envelope"></i></a>
        </div>
      </div>

      <!-- Formulir Fungsional (FormSubmit.co - TANPA DAFTAR) -->
      <form action="https://formsubmit.co/adihermanto392@gmail.com" method="POST" class="contact-form">
        <!-- Konfigurasi agar email rapi dan tanpa captcha -->
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_subject" value="Pesan Baru dari Portofolio Aldi!">
        <input type="hidden" name="_template" value="table">
        
        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input type="text" id="name" name="name" placeholder="Contoh: Budi Santoso" required>
        </div>
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="email" id="email" name="email" placeholder="Contoh: budi@email.com" autocomplete="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Nomor Kontak / WhatsApp</label>
          <input type="tel" id="phone" name="phone" placeholder="Contoh: 081234567890" autocomplete="tel" required>
        </div>
        <div class="form-group">
          <label for="message">Pesan Anda</label>
          <textarea id="message" name="message" placeholder="Tuliskan detail proyek atau pertanyaan Anda di sini..." required></textarea>
        </div>
        <button type="submit" class="submit-btn">
          <i class="fas fa-paper-plane"></i> Kirim Pesan
        </button>
      </form>
    </div>
  </section>

  <footer>
    <p>&copy; 2026 Muhammad Aldi Hermanto. Dirancang & Dibangun dengan ❤️ dan presisi.</p>
  </footer>

  <button class="scroll-top" id="scrollTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Kembali ke Atas" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
  </button>

  <button class="theme-toggle" onclick="toggleThemePanel()" title="Ganti Warna Tema" aria-label="Toggle theme panel">
    <i class="fas fa-palette"></i>
  </button>

  <div class="theme-panel" id="themePanel">
    <h4><i class="fas fa-swatchbook"></i> Pilih Warna Tema</h4>
    <div class="theme-options">
      <div class="theme-option active" style="--color1:#6366f1; --color2:#ec4899;" onclick="changeTheme('#6366f1','#ec4899', this)" title="Indigo Pink"></div>
      <div class="theme-option" style="--color1:#0ea5e9; --color2:#06b6d4;" onclick="changeTheme('#0ea5e9','#06b6d4', this)" title="Ocean Blue"></div>
      <div class="theme-option" style="--color1:#10b981; --color2:#84cc16;" onclick="changeTheme('#10b981','#84cc16', this)" title="Emerald Green"></div>
      <div class="theme-option" style="--color1:#f97316; --color2:#ef4444;" onclick="changeTheme('#f97316','#ef4444', this)" title="Sunset Orange"></div>
      <div class="theme-option" style="--color1:#eab308; --color2:#a855f7;" onclick="changeTheme('#eab308','#a855f7', this)" title="Gold Purple"></div>
      <div class="theme-option" style="--color1:#f43f5e; --color2:#8b5cf6;" onclick="changeTheme('#f43f5e','#8b5cf6', this)" title="Rose Violet"></div>
    </div>
  </div>

  <script>
    // 1. TYPING EFFECT
    const typingElement = document.getElementById('typing-text');
    const texts = ["Pengembang Web", "UI/UX Enthusiast", "Problem Solver"];
    let textIndex = 0, charIndex = 0, isDeleting = false;

    function typeEffect() {
      const currentText = texts[textIndex];
      typingElement.textContent = isDeleting 
        ? currentText.substring(0, charIndex - 1) 
        : currentText.substring(0, charIndex + 1);
      
      charIndex += isDeleting ? -1 : 1;
      let typeSpeed = isDeleting ? 40 : 80;

      if (!isDeleting && charIndex === currentText.length) {
        typeSpeed = 2000; isDeleting = true;
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false; textIndex = (textIndex + 1) % texts.length; typeSpeed = 400;
      }
      setTimeout(typeEffect, typeSpeed);
    }
    document.addEventListener('DOMContentLoaded', typeEffect);

    // 2. SCROLL PROGRESS, NAVBAR SHRINK & SCROLL SPY
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
      const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      document.getElementById('scrollProgress').style.width = (winScroll / height) * 100 + "%";
      
      const scrollTopBtn = document.getElementById('scrollTop');
      scrollTopBtn.classList.toggle('visible', winScroll > 400);

      const navbar = document.getElementById('navbar');
      navbar.classList.toggle('scrolled', winScroll > 50);

      let current = '';
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        if (winScroll >= (sectionTop - 200)) {
          current = section.getAttribute('id');
        }
      });

      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
          link.classList.add('active');
        }
      });
    });

    // 3. HD REVEAL ANIMATION
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });

    document.querySelectorAll('.reveal-blur, .skill-card, .certificate-card').forEach((el, index) => {
      if (el.classList.contains('skill-card') || el.classList.contains('certificate-card')) {
        el.style.transitionDelay = `${(index % 3) * 150}ms`;
      }
      observer.observe(el);
    });

    // 4. OPTIMIZED SPOTLIGHT EFFECT
    const skillsGrid = document.getElementById('skillsGrid');
    const certGrid = document.getElementById('certGrid');
    
    function handleSpotlight(e, container) {
      const cards = container.querySelectorAll('.skill-card, .certificate-card');
      cards.forEach(card => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
      });
    }

    if(skillsGrid) skillsGrid.addEventListener('mousemove', (e) => handleSpotlight(e, skillsGrid));
    if(certGrid) certGrid.addEventListener('mousemove', (e) => handleSpotlight(e, certGrid));

    // 5. MOBILE MENU
    function toggleMenu() {
      const nav = document.getElementById('navLinks');
      const icon = document.querySelector('.menu-toggle i');
      nav.classList.toggle('active');
      if (nav.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
      } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    }
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        document.getElementById('navLinks').classList.remove('active');
        document.querySelector('.menu-toggle i').classList.remove('fa-times');
        document.querySelector('.menu-toggle i').classList.add('fa-bars');
      });
    });

    // 6. THEME SWITCHER
    function toggleThemePanel() {
      document.getElementById('themePanel').classList.toggle('active');
    }
    document.addEventListener('click', (e) => {
      const panel = document.getElementById('themePanel');
      const toggle = document.querySelector('.theme-toggle');
      if (!panel.contains(e.target) && !toggle.contains(e.target)) {
        panel.classList.remove('active');
      }
    });

    function changeTheme(color1, color2, element) {
      document.documentElement.style.setProperty('--primary', color1);
      document.documentElement.style.setProperty('--secondary', color2);
      document.querySelectorAll('.theme-option').forEach(opt => opt.classList.remove('active'));
      element.classList.add('active');
      localStorage.setItem('theme-color1', color1);
      localStorage.setItem('theme-color2', color2);
    }

    window.addEventListener('load', () => {
      const savedColor1 = localStorage.getItem('theme-color1') || '#6366f1';
      const savedColor2 = localStorage.getItem('theme-color2') || '#ec4899';
      document.documentElement.style.setProperty('--primary', savedColor1);
      document.documentElement.style.setProperty('--secondary', savedColor2);
      
      document.querySelectorAll('.theme-option').forEach(opt => {
        const c1 = opt.style.getPropertyValue('--color1').trim();
        const c2 = opt.style.getPropertyValue('--color2').trim();
        if (c1 === savedColor1 && c2 === savedColor2) opt.classList.add('active');
      });
    });
  </script>
</body>
</html>