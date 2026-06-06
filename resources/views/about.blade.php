YPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>سوق بلدنا — حكايتنا</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Reem+Kufi:wght@400;500;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<style>
:root{
    --clay:#c0622f; --clay-dark:#8B4513; --clay-light:#e8956d;
    --sand:#f3e3cd; --sand-dark:#e8d5bc; --earth:#34241a; --earth-2:#241710;
    --gold:#c89b3c; --gold-light:#e7c577; --cream:#fbf4ea; --sage:#7a8c6e; --ink:#2a1d14;
}
*{box-sizing:border-box; margin:0; padding:0;}
html{scroll-behavior:smooth;}
body{
    font-family:'Tajawal',sans-serif; background:var(--cream); color:var(--ink);
    overflow-x:hidden; line-height:1.7;
}
::selection{background:var(--clay); color:#fff;}
img{max-width:100%;}

/* paper grain */
body::before{
    content:''; position:fixed; inset:0; z-index:9998; pointer-events:none; opacity:.04; mix-blend-mode:multiply;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
}

/* ---------- shared ornaments ---------- */
.rule{display:flex; align-items:center; justify-content:center; gap:14px; margin:0 auto;}
.rule .line{height:1px; width:54px; background:linear-gradient(90deg,transparent,var(--gold));}
.rule .line.r{background:linear-gradient(90deg,var(--gold),transparent);}
.rule .dia{width:9px; height:9px; background:var(--gold); transform:rotate(45deg);}
.kicker{
    font-family:'Reem Kufi',sans-serif; letter-spacing:5px; font-size:.82rem;
    color:var(--clay); text-transform:uppercase; font-weight:600;
}
.reveal{opacity:0; transform:translateY(46px); transition:opacity 1s cubic-bezier(.2,.7,.2,1), transform 1s cubic-bezier(.2,.7,.2,1);}
.reveal.in{opacity:1; transform:none;}

/* ---------- NAV ---------- */
.nav{
    position:fixed; inset:0 0 auto 0; z-index:1000; display:flex; align-items:center; justify-content:space-between;
    padding:24px 52px; transition:all .45s ease;
}
.nav.scrolled{background:rgba(251,244,234,.82); backdrop-filter:blur(16px); padding:14px 52px; box-shadow:0 2px 0 rgba(200,155,60,.25);}
.nav .brand{font-family:'Amiri',serif; font-size:1.7rem; color:#fff; font-weight:700; transition:color .45s;}
.nav.scrolled .brand{color:var(--earth);}
.nav .brand b{color:var(--gold-light);} .nav.scrolled .brand b{color:var(--clay);}
.nav .menu{display:flex; gap:32px; align-items:center;}
.nav .menu a{font-family:'Reem Kufi'; font-size:.95rem; color:rgba(255,255,255,.85); text-decoration:none; position:relative; transition:color .3s;}
.nav.scrolled .menu a{color:var(--ink);}
.nav .menu a::after{content:''; position:absolute; right:0; bottom:-7px; height:2px; width:0; background:var(--gold); transition:width .3s;}
.nav .menu a:hover::after{width:100%;}
.nav .menu a:hover{color:var(--gold);}
@media(max-width:860px){.nav .menu a:not(:last-child){display:none;} .nav{padding:18px 24px;}}

/* ---------- HERO ---------- */
.hero{position:relative; min-height:100vh; display:flex; align-items:center; justify-content:center; text-align:center;
    background:radial-gradient(120% 90% at 50% 0%, #4a3526 0%, var(--earth) 50%, var(--earth-2) 100%); overflow:hidden;}
.hero .geo{position:absolute; inset:0; opacity:.08;
    background-image:url("data:image/svg+xml,%3Csvg width='90' height='52' viewBox='0 0 90 52' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23c89b3c' stroke-width='1'%3E%3Cpath d='M45 0L67.5 13v26L45 52 22.5 39V13z'/%3E%3Cpath d='M0 0L22.5 13v26L0 52M90 0L67.5 13v26L90 52'/%3E%3C/g%3E%3C/svg%3E");}
.hero .vignette{position:absolute; inset:0; background:radial-gradient(60% 60% at 50% 45%, transparent, rgba(0,0,0,.45));}
.hero .motif{position:absolute; font-size:2.4rem; opacity:.16; filter:saturate(.4); pointer-events:none;}
.hero-inner{position:relative; z-index:3; padding:140px 24px 80px; max-width:860px;}
.hero .emblem{width:96px; height:120px; margin:0 auto 30px; position:relative; animation:fadeDown 1s ease both;}
.hero .emblem svg{width:100%; height:100%;}
.hero .emblem .pot{position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:2.6rem; padding-top:18px;}
.hero .eyebrow{display:inline-block; font-family:'Reem Kufi'; letter-spacing:6px; font-size:.85rem; color:var(--gold-light);
    border:1px solid rgba(231,197,119,.35); padding:8px 22px; border-radius:100px; margin-bottom:30px; animation:fadeDown 1s ease .1s both;}
.hero h1{font-family:'Amiri',serif; font-size:clamp(3.4rem,9vw,7rem); color:#fff; line-height:1.02; margin-bottom:8px; animation:fadeUp 1s ease .25s both;}
.hero h1 .accent{color:var(--gold-light); position:relative; display:inline-block;}
.hero .brush{display:block; margin:2px auto 26px; width:min(360px,70%); height:26px; animation:fadeUp 1s ease .4s both;}
.hero .brush path{stroke:var(--clay); stroke-width:7; fill:none; stroke-linecap:round; stroke-dasharray:600; stroke-dashoffset:600; animation:draw 1.6s ease 1s forwards;}
.hero p.lead{font-size:1.3rem; color:rgba(255,255,255,.74); font-weight:300; max-width:620px; margin:0 auto; line-height:2; animation:fadeUp 1s ease .55s both;}
.hero .scroll{position:absolute; bottom:30px; right:50%; transform:translateX(50%); color:rgba(255,255,255,.45);
    font-family:'Reem Kufi'; font-size:.78rem; letter-spacing:3px; z-index:3; animation:bob 2.2s infinite;}
.hero .scroll::after{content:'↓'; display:block; font-size:1.4rem; margin-top:8px;}
@keyframes draw{to{stroke-dashoffset:0;}}
@keyframes bob{0%,100%{transform:translateX(50%) translateY(0);}50%{transform:translateX(50%) translateY(10px);}}
@keyframes fadeUp{from{opacity:0;transform:translateY(34px);}to{opacity:1;transform:none;}}
@keyframes fadeDown{from{opacity:0;transform:translateY(-26px);}to{opacity:1;transform:none;}}

/* ---------- MANIFESTO INTRO ---------- */
.intro{padding:120px 32px; text-align:center; position:relative;}
.intro .rule{margin-bottom:30px;}
.intro .kicker{display:block; margin-bottom:26px;}
.intro p{font-family:'Amiri',serif; font-size:clamp(1.6rem,4vw,2.7rem); line-height:1.75; color:var(--earth); max-width:880px; margin:0 auto; font-weight:400;}
.intro p .hl{color:var(--clay); font-style:italic;}
.intro .sig{margin-top:36px; font-family:'Reem Kufi'; letter-spacing:3px; color:#9b8a7c; font-size:.95rem;}

/* ---------- STORY (dark) ---------- */
.story{background:linear-gradient(180deg,var(--earth),var(--earth-2)); padding:120px 0 130px; position:relative; overflow:hidden;}
.story .geo{position:absolute; inset:0; opacity:.045;
    background-image:url("data:image/svg+xml,%3Csvg width='60' height='60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='none' stroke='%23c89b3c'/%3E%3C/svg%3E");}
.story-wrap{max-width:1120px; margin:0 auto; padding:0 40px; position:relative; z-index:1;}
.story-head{text-align:center; margin-bottom:90px;}
.story-head .kicker{color:var(--gold-light); display:block; margin:18px 0;}
.story-head h2{font-family:'Amiri',serif; font-size:clamp(2.2rem,5vw,3.6rem); color:#fff;}
.chapter{display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; margin-bottom:120px; position:relative;}
.chapter:last-child{margin-bottom:0;}
.chapter:nth-child(even) .ch-visual{order:2;}
.ch-num{font-family:'Amiri',serif; font-size:1rem; color:var(--gold); letter-spacing:2px; margin-bottom:14px; display:flex; align-items:center; gap:12px;}
.ch-num::before{content:''; width:40px; height:1px; background:var(--gold);}
.chapter h3{font-family:'Amiri',serif; font-size:clamp(1.8rem,3.5vw,2.6rem); color:#fff; line-height:1.3; margin-bottom:20px;}
.chapter p{color:rgba(255,255,255,.66); font-size:1.12rem; line-height:2.05; font-weight:300;}
.chapter p strong{color:var(--gold-light); font-weight:500;}
.ch-visual{position:relative; aspect-ratio:4/3; border-radius:20px; display:flex; align-items:center; justify-content:center;
    font-size:7rem; overflow:hidden; box-shadow:0 40px 80px rgba(0,0,0,.4);}
.ch-visual::after{content:''; position:absolute; inset:0; opacity:.12;
    background-image:url("data:image/svg+xml,%3Csvg width='40' height='40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 0l20 20-20 20L0 20z' fill='none' stroke='%23fff'/%3E%3C/svg%3E");}
.ch-tag{position:absolute; bottom:16px; right:16px; background:rgba(0,0,0,.35); backdrop-filter:blur(6px); color:#fff;
    font-family:'Reem Kufi'; font-size:.8rem; letter-spacing:1px; padding:7px 16px; border-radius:100px; z-index:1;}
@media(max-width:840px){.chapter{grid-template-columns:1fr; gap:30px;} .chapter:nth-child(even) .ch-visual{order:0;}}

/* ---------- MAP ---------- */
.map-sec{background:var(--sand); padding:120px 32px; position:relative; overflow:hidden;}
.map-sec .corner{position:absolute; width:120px; height:120px; opacity:.4;}
.map-sec .corner svg{width:100%; height:100%;}
.map-sec .corner.tl{top:24px; right:24px;} .map-sec .corner.br{bottom:24px; left:24px; transform:rotate(180deg);}
.map-head{text-align:center; max-width:680px; margin:0 auto 56px;}
.map-head .kicker{display:block; margin:16px 0;}
.map-head h2{font-family:'Amiri',serif; font-size:clamp(2.2rem,5vw,3.4rem); color:var(--earth); margin-bottom:14px;}
.map-head p{color:#7a6a5e; font-size:1.12rem;}
.map-layout{max-width:1040px; margin:0 auto; display:grid; grid-template-columns:1.3fr .7fr; gap:40px; align-items:center;}
.map-board{position:relative; aspect-ratio:3/4; max-height:540px; margin:0 auto; width:100%;
    background:radial-gradient(circle at 50% 40%, #fff8ee, #f0ddc2); border-radius:24px; border:1px solid rgba(200,155,60,.3);
    box-shadow:inset 0 0 60px rgba(192,98,47,.06), 0 30px 60px rgba(192,98,47,.12);}
.map-board svg.lines{position:absolute; inset:0; width:100%; height:100%;}
.gov{position:absolute; transform:translate(50%,-50%); cursor:pointer; z-index:2; text-align:center;}
.gov .pin{width:16px; height:16px; border-radius:50%; background:var(--clay); margin:0 auto 5px; position:relative; transition:all .3s;
    box-shadow:0 0 0 4px rgba(192,98,47,.18);}
.gov .pin::after{content:''; position:absolute; inset:-9px; border-radius:50%; border:1px solid var(--clay); opacity:0; transition:all .35s;}
.gov .nm{font-family:'Reem Kufi'; font-size:.72rem; color:var(--earth); white-space:nowrap; opacity:.7; transition:all .3s;}
.gov:hover .pin,.gov.active .pin{background:var(--gold); transform:scale(1.5); box-shadow:0 0 0 6px rgba(200,155,60,.3), 0 0 22px var(--gold);}
.gov:hover .pin::after,.gov.active .pin::after{opacity:.6; inset:-13px;}
.gov:hover .nm,.gov.active .nm{opacity:1; font-weight:700; color:var(--clay-dark); transform:scale(1.1);}
.map-info{background:var(--cream); border-radius:22px; padding:38px 32px; border:1px solid rgba(200,155,60,.25); text-align:center; min-height:260px;
    display:flex; flex-direction:column; align-items:center; justify-content:center; box-shadow:0 20px 50px rgba(192,98,47,.1);}
.map-info .ic{font-size:3.4rem; margin-bottom:16px; transition:all .4s; transform:scale(1);}
.map-info h4{font-family:'Amiri',serif; font-size:1.8rem; color:var(--earth); margin-bottom:6px;}
.map-info .craft{font-family:'Reem Kufi'; color:var(--clay); letter-spacing:1px; margin-bottom:14px; font-size:1rem;}
.map-info p{color:#8a7a6c; font-size:.98rem; line-height:1.8;}
.map-info .hint{color:#b3a392; font-style:italic;}
@media(max-width:820px){.map-layout{grid-template-columns:1fr;} .map-board{max-height:460px;} .gov .nm{font-size:.62rem;}}

/* ---------- VALUES ---------- */
.values{padding:120px 32px; background:var(--cream);}
.values-head{text-align:center; max-width:620px; margin:0 auto 64px;}
.values-head .kicker{display:block; margin:16px 0;}
.values-head h2{font-family:'Amiri',serif; font-size:clamp(2.2rem,5vw,3.4rem); color:var(--earth);}
.val-grid{max-width:1080px; margin:0 auto; display:grid; grid-template-columns:repeat(2,1fr); gap:26px;}
.val{position:relative; background:#fff; border-radius:22px; padding:42px 38px; border:1px solid rgba(61,43,31,.07);
    overflow:hidden; transition:all .4s;}
.val::before{content:''; position:absolute; top:0; right:0; width:100%; height:4px; background:linear-gradient(90deg,var(--clay),var(--gold)); transform:scaleX(0); transform-origin:right; transition:transform .45s;}
.val:hover{transform:translateY(-8px); box-shadow:0 28px 60px rgba(192,98,47,.15);}
.val:hover::before{transform:scaleX(1);}
.val .vn{position:absolute; top:30px; left:38px; font-family:'Amiri',serif; font-size:3.4rem; color:rgba(192,98,47,.1); line-height:1;}
.val .vic{width:64px; height:64px; border-radius:16px; background:linear-gradient(135deg,var(--clay),var(--clay-dark));
    display:flex; align-items:center; justify-content:center; font-size:1.9rem; margin-bottom:22px; box-shadow:0 12px 26px rgba(192,98,47,.28); transition:transform .4s;}
.val:hover .vic{transform:rotate(-8deg) scale(1.06);}
.val h4{font-family:'Amiri',serif; font-size:1.55rem; color:var(--earth); margin-bottom:10px;}
.val p{color:#7a6a5e; line-height:1.9;}
@media(max-width:760px){.val-grid{grid-template-columns:1fr;}}

/* ---------- STATS ---------- */
.stats{background:linear-gradient(135deg,var(--clay),var(--clay-dark)); padding:90px 32px; position:relative; overflow:hidden;}
.stats::before{content:''; position:absolute; inset:0; opacity:.07;
    background-image:url("data:image/svg+xml,%3Csvg width='40' height='40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23fff'%3E%3Cpath d='M20 0l20 20-20 20L0 20z'/%3E%3C/g%3E%3C/svg%3E");}
.stat-grid{max-width:1000px; margin:0 auto; display:grid; grid-template-columns:repeat(4,1fr); gap:30px; position:relative; z-index:1; text-align:center;}
.stat .n{font-family:'Amiri',serif; font-size:clamp(2.6rem,5vw,3.8rem); color:#fff; line-height:1; font-weight:700;}
.stat .n .pl{color:var(--gold-light);}
.stat .l{font-family:'Reem Kufi'; color:rgba(255,255,255,.78); margin-top:12px; letter-spacing:1px; font-size:.95rem;}
@media(max-width:680px){.stat-grid{grid-template-columns:1fr 1fr; gap:44px 20px;}}

/* ---------- ARTISANS ---------- */
.artisans{padding:120px 32px; background:var(--sand); position:relative;}
.art-head{text-align:center; max-width:640px; margin:0 auto 60px;}
.art-head .kicker{display:block; margin:16px 0;}
.art-head h2{font-family:'Amiri',serif; font-size:clamp(2.2rem,5vw,3.4rem); color:var(--earth);}
.art-grid{max-width:1080px; margin:0 auto 70px; display:grid; grid-template-columns:repeat(4,1fr); gap:20px;}
.face{background:var(--cream); border-radius:20px; padding:28px 18px; text-align:center; border:1px solid rgba(192,98,47,.08);
    transition:all .4s; cursor:default;}
.face:hover{transform:translateY(-10px) scale(1.03); box-shadow:0 26px 55px rgba(192,98,47,.18); background:#fff;}
.face .av{width:84px; height:84px; border-radius:50%; margin:0 auto 16px; display:flex; align-items:center; justify-content:center;
    font-size:2.6rem; background:linear-gradient(135deg,var(--sand-dark),var(--gold-light)); transition:all .4s;}
.face:hover .av{background:linear-gradient(135deg,var(--clay),var(--gold)); transform:rotate(-6deg);}
.face b{display:block; font-family:'Amiri',serif; font-size:1.2rem; color:var(--earth); margin-bottom:3px;}
.face .role{font-family:'Reem Kufi'; font-size:.78rem; color:var(--clay); letter-spacing:.5px;}
.face .loc{font-size:.82rem; color:#9b8a7c; margin-top:2px;}
@media(max-width:880px){.art-grid{grid-template-columns:1fr 1fr;}}
.art-quote{max-width:820px; margin:0 auto; text-align:center; background:var(--cream); border-radius:24px; padding:54px 44px;
    border:1px solid rgba(200,155,60,.25); position:relative; box-shadow:0 24px 60px rgba(192,98,47,.1);}
.art-quote .qm{font-family:'Amiri',serif; font-size:5rem; color:var(--gold); line-height:.4; display:block; margin-bottom:24px;}
.art-quote p{font-family:'Amiri',serif; font-size:clamp(1.3rem,3vw,1.9rem); color:var(--earth); line-height:1.7; margin-bottom:24px; font-style:italic;}
.art-quote .who{font-family:'Reem Kufi'; color:var(--clay); letter-spacing:2px;}
.art-quote .who span{display:block; color:#9b8a7c; font-size:.85rem; letter-spacing:1px; margin-top:4px;}

/* ---------- MISSION (dark) ---------- */
.mission{background:radial-gradient(120% 100% at 50% 0%, #43301f, var(--earth-2)); padding:140px 32px; text-align:center; position:relative; overflow:hidden;}
.mission::before{content:'🌿'; position:absolute; font-size:26rem; top:-70px; right:-60px; opacity:.04;}
.mission .kicker{color:var(--gold-light); display:block; margin-bottom:30px;}
.mission .manifesto{max-width:900px; margin:0 auto;}
.mission .manifesto span{font-family:'Amiri',serif; font-size:clamp(1.8rem,5vw,3.2rem); color:#fff; line-height:1.65; display:inline;}
.mission .manifesto .g{color:var(--gold-light);}
.mission .word{opacity:0; transform:translateY(14px); display:inline-block; transition:opacity .6s ease, transform .6s ease;}
.mission .word.in{opacity:1; transform:none;}
.mission .flag{margin-top:40px; font-size:1.6rem; opacity:0; transition:opacity 1s ease .2s;}
.mission .flag.in{opacity:.9;}

/* ---------- CONTACT / CTA ---------- */
.contact{padding:120px 32px 90px; background:var(--cream);}
.contact-head{text-align:center; max-width:560px; margin:0 auto 56px;}
.contact-head .kicker{display:block; margin:16px 0;}
.contact-head h2{font-family:'Amiri',serif; font-size:clamp(2.2rem,5vw,3.2rem); color:var(--earth);}
.cgrid{max-width:980px; margin:0 auto 64px; display:grid; grid-template-columns:repeat(3,1fr); gap:24px;}
.ccard{background:#fff; border-radius:22px; padding:40px 28px; text-align:center; border:1px solid rgba(192,98,47,.08); transition:all .4s; position:relative; overflow:hidden;}
.ccard::after{content:''; position:absolute; bottom:0; right:0; left:0; height:3px; background:linear-gradient(90deg,var(--clay),var(--gold)); transform:scaleX(0); transition:transform .4s;}
.ccard:hover{transform:translateY(-6px); box-shadow:0 24px 50px rgba(192,98,47,.13);}
.ccard:hover::after{transform:scaleX(1);}
.ccard .ic{font-size:2.4rem; margin-bottom:14px; display:block;}
.ccard h5{font-family:'Amiri',serif; font-size:1.3rem; color:var(--earth); margin-bottom:6px;}
.ccard p{color:#7a6a5e; direction:ltr; unicode-bidi:plaintext;}
.cta-box{max-width:980px; margin:0 auto; background:linear-gradient(135deg,var(--clay),var(--clay-dark)); border-radius:28px;
    padding:64px 40px; text-align:center; position:relative; overflow:hidden;}
.cta-box::before{content:'🏺'; position:absolute; font-size:18rem; bottom:-70px; left:-50px; opacity:.06;}
.cta-box h3{font-family:'Amiri',serif; font-size:clamp(1.9rem,4.5vw,3rem); color:#fff; margin-bottom:14px; position:relative;}
.cta-box p{color:rgba(255,255,255,.78); font-size:1.15rem; margin-bottom:34px; position:relative;}
.cta-btn{display:inline-flex; align-items:center; gap:10px; background:var(--earth); color:#fff; text-decoration:none;
    padding:17px 46px; border-radius:14px; font-family:'Reem Kufi'; font-weight:600; font-size:1.05rem; letter-spacing:1px;
    position:relative; transition:all .35s; box-shadow:0 14px 34px rgba(0,0,0,.25);}
.cta-btn:hover{transform:translateY(-4px); background:var(--earth-2); box-shadow:0 22px 46px rgba(0,0,0,.35);}
@media(max-width:760px){.cgrid{grid-template-columns:1fr;}}

/* ---------- FOOTER ---------- */
footer{background:var(--earth-2); color:rgba(255,255,255,.6); padding:74px 52px 30px;}
.fgrid{max-width:1180px; margin:0 auto; display:grid; grid-template-columns:1.6fr 1fr 1fr 1fr; gap:40px;}
.fbrand .l{font-family:'Amiri',serif; font-size:1.9rem; color:#fff; margin-bottom:16px;} .fbrand .l b{color:var(--gold-light);}
.fbrand p{line-height:1.9; max-width:300px; font-weight:300;}
.fsoc{display:flex; gap:12px; margin-top:18px;}
.fsoc a{width:42px; height:42px; border-radius:50%; background:rgba(255,255,255,.07); display:flex; align-items:center; justify-content:center; font-size:1.15rem; transition:all .3s; text-decoration:none;}
.fsoc a:hover{background:var(--clay); transform:translateY(-3px);}
.fcol h5{font-family:'Reem Kufi'; color:#fff; margin-bottom:18px; letter-spacing:1px; font-size:1rem;}
.fcol a{display:block; color:rgba(255,255,255,.6); text-decoration:none; margin-bottom:11px; transition:color .3s; font-weight:300;}
.fcol a:hover{color:var(--gold-light);}
.fbot{max-width:1180px; margin:54px auto 0; padding-top:24px; border-top:1px solid rgba(255,255,255,.1); text-align:center; font-size:.88rem; font-family:'Reem Kufi'; letter-spacing:1px;}
.fbot .h{color:var(--clay-light);}
@media(max-width:760px){.fgrid{grid-template-columns:1fr 1fr;} footer{padding:60px 24px 26px;}}
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav" id="nav">
    <a href="{{ route('home') }}" class="brand">🏺 سوق <b>بلدنا</b></a>
    <div class="menu">
        <a href="#story">قصتنا</a>
        <a href="#map">من كل المملكة</a>
        <a href="#values">قيمنا</a>
        <a href="#artisans">حرفيونا</a>
        <a href="#contact">تواصل</a>
    </div>
</nav>

<!-- HERO -->
<header class="hero">
    <div class="geo"></div>
    <span class="motif" style="top:18%;right:12%">🪡</span>
    <span class="motif" style="top:26%;left:14%">🌿</span>
    <span class="motif" style="bottom:22%;right:18%">🫙</span>
    <span class="motif" style="bottom:30%;left:10%">🪔</span>
    <div class="vignette"></div>
    <div class="hero-inner">
        <div class="emblem">
            <svg viewBox="0 0 96 120">
                <path d="M48 4 C70 4 90 22 90 50 L90 116 L6 116 L6 50 C6 22 26 4 48 4 Z"
                      fill="none" stroke="#c89b3c" stroke-width="2"/>
                <path d="M48 16 C64 16 78 30 78 50 L78 104 L18 104 L18 50 C18 30 32 16 48 16 Z"
                      fill="none" stroke="#c89b3c" stroke-width="1" opacity="0.5"/>
            </svg>
            <div class="pot">🏺</div>
        </div>
        <div class="eyebrow">منذ ٢٠٢٤ · صناعة أردنية</div>
        <h1>هاي <span class="accent">حكايتنا</span></h1>
        <svg class="brush" viewBox="0 0 360 26" preserveAspectRatio="none">
            <path d="M6 16 C70 4 130 24 190 14 C250 4 310 22 354 12"/>
        </svg>
        <p class="lead">
            مش مجرد سوق إلكتروني… إحنا جسرٌ بين يدٍ صنعت بحب،
            وقلبٍ يبحث عن الأصالة في كل زاوية من الأردن.
        </p>
    </div>
    <div class="scroll">انزل لتعرف أكثر</div>
</header>

<!-- MANIFESTO INTRO -->
<section class="intro">
    <div class="rule reveal"><span class="line"></span><span class="dia"></span><span class="line r"></span></div>
    <span class="kicker reveal" style="transition-delay:.05s">كلمتنا</span>
    <p class="reveal" style="transition-delay:.1s">
        وُلدنا من فكرة بسيطة: أنّ خلف كل <span class="hl">قطعة يدوية</span> إنساناً وحكاية،
        وأنّ التراث الأردني يستحق أن يصل لكل بيت — لا أن يبقى حبيس الزوايا.
    </p>
    <p class="sig reveal" style="transition-delay:.18s">— فريق سوق بلدنا</p>
</section>

<!-- STORY -->
<section class="story" id="story">
    <div class="geo"></div>
    <div class="story-wrap">
        <div class="story-head reveal">
            <div class="rule"><span class="line"></span><span class="dia" style="background:var(--gold-light)"></span><span class="line r"></span></div>
            <span class="kicker">رحلتنا</span>
            <h2>كيف بدأ كل شيء</h2>
        </div>

        <div class="chapter">
            <div class="ch-visual reveal" style="background:linear-gradient(135deg,#5d4631,#8B4513)">
                💡<span class="ch-tag">الفصل الأول</span>
            </div>
            <div class="ch-text reveal" style="transition-delay:.1s">
                <div class="ch-num">٠١ / البداية</div>
                <h3>من حبّ الأرض<br>وُلدت الفكرة</h3>
                <p>
                    في زوايا المملكة، رأينا نساءً وأجداداً وشباباً موهوبين تنسج أياديهم قصصاً من
                    الخيط والطين والبهارات. كل قطعة تحمل روحاً وتاريخاً، لكنها لم تجد طريقها لمن يستحقها.
                    فكانت <strong>سوق بلدنا</strong> — الجسر بين يد الصانع وبيت المُحب.
                </p>
            </div>
        </div>

        <div class="chapter">
            <div class="ch-visual reveal" style="background:linear-gradient(135deg,#6b5236,#a86a3a)">
                🤲<span class="ch-tag">الفصل الثاني</span>
            </div>
            <div class="ch-text reveal" style="transition-delay:.1s">
                <div class="ch-num">٠٢ / الرسالة</div>
                <h3>أكثر من تجارة…<br>إنها أمانة</h3>
                <p>
                    آمنّا أنّ كل عملية شراء يجب أن تذهب مباشرة لجيب الحرفي، وأنّ الاقتصاد العادل
                    يبدأ من <strong>تمكين المجتمعات</strong>. فلم نبنِ متجراً، بل حركةً لإحياء التراث
                    ودعم من يصنعونه بأيديهم.
                </p>
            </div>
        </div>

        <div class="chapter">
            <div class="ch-visual reveal" style="background:linear-gradient(135deg,#4f5a42,#7a8c6e)">
                🧶<span class="ch-tag">الفصل الثالث</span>
            </div>
            <div class="ch-text reveal" style="transition-delay:.1s">
                <div class="ch-num">٠٣ / اليوم</div>
                <h3>من السلط للعقبة…<br>بصمة أردنية واحدة</h3>
                <p>
                    من سجاد السلط المطرّز، إلى بهارات البادية العطرة، إلى الفخار والنحاس المحفور —
                    اليوم نجمع تحت سقف واحد إبداعَ <strong>أكثر من ١٠٠ حرفي</strong> من كل محافظات الوطن.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- INTERACTIVE MAP -->
<section class="map-sec" id="map">
    <div class="corner tl"><svg viewBox="0 0 100 100"><g fill="none" stroke="#c89b3c" stroke-width="1.5"><path d="M2 40V2h38"/><path d="M10 30V10h20"/><circle cx="10" cy="40" r="2"/></g></svg></div>
    <div class="corner br"><svg viewBox="0 0 100 100"><g fill="none" stroke="#c89b3c" stroke-width="1.5"><path d="M2 40V2h38"/><path d="M10 30V10h20"/><circle cx="10" cy="40" r="2"/></g></svg></div>
    <div class="map-head reveal">
        <div class="rule"><span class="line"></span><span class="dia"></span><span class="line r"></span></div>
        <span class="kicker">جذورنا في كل زاوية</span>
        <h2>من كل المملكة</h2>
        <p>حُط مؤشرك على أي محافظة، واكتشف الحرفة اللي اشتهرت فيها 👇</p>
    </div>
    <div class="map-layout">
        <div class="map-board reveal">
            <svg class="lines" viewBox="0 0 100 100" preserveAspectRatio="none">
                <g stroke="#c89b3c" stroke-width="0.4" stroke-dasharray="2 2" opacity="0.5" fill="none">
                    <path d="M30 8 L22 14 L33 16 L55 10 M22 14 L26 30 M33 16 L38 34 M55 10 L48 26
                             M26 30 L38 34 L48 26 M38 34 L30 42 M30 42 L30 58 L33 70 L50 78 M33 70 L30 92"/>
                </g>
            </svg>
            <!-- governorates -->
            <div class="gov" style="top:8%;left:30%"  data-c="إربد"   data-craft="نسيج وأصواف" data-ic="🧶" data-d="حيث تُغزل أجمل الأصواف والسجاد اليدوي في الشمال."></div>
            <div class="gov" style="top:14%;left:22%" data-c="عجلون"  data-craft="زيت الزيتون" data-ic="🫒" data-d="جبالٌ خضراء وزيتٌ من أنقى زيوت الزيتون الأردني."></div>
            <div class="gov" style="top:16%;left:33%" data-c="جرش"    data-craft="فخّار وآثار" data-ic="🏺" data-d="مدينة الأعمدة، وفخّارٌ يستلهم من حضارة عريقة."></div>
            <div class="gov" style="top:10%;left:55%" data-c="المفرق" data-craft="بهارات البادية" data-ic="🌿" data-d="من قلب البادية تأتي أعطر الزعتر والبهارات."></div>
            <div class="gov" style="top:30%;left:26%" data-c="البلقاء" data-craft="سجاد مطرّز" data-ic="🪡" data-d="السلط وتطريزها الذي تتوارثه الأجيال بحب."></div>
            <div class="gov" style="top:26%;left:48%" data-c="الزرقاء" data-craft="نحاسيات" data-ic="🪔" data-d="فوانيس وأوانٍ نحاسية محفورة بأيادٍ ماهرة."></div>
            <div class="gov" style="top:34%;left:38%" data-c="عمّان"  data-craft="حرف معاصرة" data-ic="🎨" data-d="العاصمة حيث يلتقي التراث بالإبداع الحديث."></div>
            <div class="gov" style="top:42%;left:30%" data-c="مادبا"  data-craft="فسيفساء" data-ic="🎭" data-d="مدينة الفسيفساء وأجمل اللوحات الحجرية."></div>
            <div class="gov" style="top:58%;left:30%" data-c="الكرك"  data-craft="صابون الغار" data-ic="🧼" data-d="صابونٌ طبيعي بزيت الزيتون والغار، على الطريقة القديمة."></div>
            <div class="gov" style="top:70%;left:33%" data-c="الطفيلة" data-craft="عسل وأعشاب" data-ic="🍯" data-d="عسلٌ جبلي وأعشابٌ بريّة من مرتفعات الجنوب."></div>
            <div class="gov" style="top:78%;left:50%" data-c="معان"   data-craft="حليّ بدوية" data-ic="📿" data-d="فضّياتٌ وحليٌّ بدوية تحكي قصص الصحراء."></div>
            <div class="gov" style="top:92%;left:30%" data-c="العقبة" data-craft="صدف ولؤلؤ" data-ic="🐚" data-d="من البحر الأحمر، صدفٌ ولؤلؤٌ وإكسسوارات بحرية."></div>
        </div>
        <div class="map-info" id="mapInfo">
            <div class="ic">🗺️</div>
            <h4>اكتشف الأردن</h4>
            <div class="craft">١٢ محافظة · ١٢ حكاية</div>
            <p class="hint">مرّر على أي نقطة على الخريطة لتظهر حرفتها</p>
        </div>
    </div>
</section>

<!-- VALUES -->
<section class="values" id="values">
    <div class="values-head reveal">
        <div class="rule"><span class="line"></span><span class="dia"></span><span class="line r"></span></div>
        <span class="kicker">ما يميّزنا</span>
        <h2>قيمٌ نؤمن بها</h2>
    </div>
    <div class="val-grid">
        <div class="val reveal">
            <span class="vn">٠١</span>
            <div class="vic">🤲</div>
            <h4>صُنع يدوياً بإتقان</h4>
            <p>كل منتج مصنوع بأيدي حرفيين أردنيين موهوبين — لا مصانع ولا تقليد، فقط إبداعٌ حقيقي يحمل بصمة صاحبه.</p>
        </div>
        <div class="val reveal" style="transition-delay:.08s">
            <span class="vn">٠٢</span>
            <div class="vic">🌿</div>
            <h4>مواد طبيعية أصيلة</h4>
            <p>بهارات من جبال الأردن، أصواف طبيعية، فخارٌ من تراب البلد — كل مادة لها قصة وجذور تمتد عميقاً في الأرض.</p>
        </div>
        <div class="val reveal" style="transition-delay:.16s">
            <span class="vn">٠٣</span>
            <div class="vic">💚</div>
            <h4>دعمٌ مباشر للحرفيين</h4>
            <p>كل عملية شراء تذهب مباشرةً لجيب الحرفي. نؤمن بالاقتصاد العادل وبأنّ تمكين الإنسان هو أساس كل تنمية.</p>
        </div>
        <div class="val reveal" style="transition-delay:.24s">
            <span class="vn">٠٤</span>
            <div class="vic">🚚</div>
            <h4>توصيلٌ لكل الأردن</h4>
            <p>من العقبة لإربد، ومن عمّان للبادية — نوصّلك منتجك الأصيل لباب بيتك بأمانٍ وسرعة وعناية.</p>
        </div>
    </div>
</section>

<!-- STATS -->
<section class="stats">
    <div class="stat-grid">
        <div class="stat reveal"><div class="n"><span data-count="100">0</span><span class="pl">+</span></div><div class="l">حرفي أردني</div></div>
        <div class="stat reveal" style="transition-delay:.08s"><div class="n"><span data-count="500">0</span><span class="pl">+</span></div><div class="l">منتج يدوي</div></div>
        <div class="stat reveal" style="transition-delay:.16s"><div class="n"><span data-count="1200">0</span><span class="pl">+</span></div><div class="l">عميل سعيد</div></div>
        <div class="stat reveal" style="transition-delay:.24s"><div class="n"><span data-count="12">0</span></div><div class="l">محافظة</div></div>
    </div>
</section>

<!-- ARTISANS -->
<section class="artisans" id="artisans">
    <div class="art-head reveal">
        <div class="rule"><span class="line"></span><span class="dia"></span><span class="line r"></span></div>
        <span class="kicker">وجوهٌ خلف الإبداع</span>
        <h2>أبطال الحكاية</h2>
    </div>
    <div class="art-grid">
        <div class="face reveal"><div class="av">👵🏼</div><b>أم محمد</b><div class="role">نسيج وتطريز</div><div class="loc">السلط</div></div>
        <div class="face reveal" style="transition-delay:.06s"><div class="av">👴🏽</div><b>أبو خالد</b><div class="role">فخّار</div><div class="loc">جرش</div></div>
        <div class="face reveal" style="transition-delay:.12s"><div class="av">👨🏻‍🎨</div><b>سامي</b><div class="role">نحاسيات</div><div class="loc">الزرقاء</div></div>
        <div class="face reveal" style="transition-delay:.18s"><div class="av">👩🏽‍🌾</div><b>هند</b><div class="role">بهارات</div><div class="loc">المفرق</div></div>
        <div class="face reveal"><div class="av">🧓🏼</div><b>أبو علي</b><div class="role">صابون الغار</div><div class="loc">الكرك</div></div>
        <div class="face reveal" style="transition-delay:.06s"><div class="av">👩🏻</div><b>رنا</b><div class="role">حليّ بدوية</div><div class="loc">معان</div></div>
        <div class="face reveal" style="transition-delay:.12s"><div class="av">👨🏽‍🦱</div><b>يوسف</b><div class="role">فسيفساء</div><div class="loc">مادبا</div></div>
        <div class="face reveal" style="transition-delay:.18s"><div class="av">👵🏽</div><b>أم سعد</b><div class="role">عسل وأعشاب</div><div class="loc">الطفيلة</div></div>
    </div>
    <div class="art-quote reveal">
        <span class="qm">❝</span>
        <p>بدأت أطرّز السجاد من أمي وجدتي، وكل خيطٍ بحطّه فيه حكاية من بلدنا. سوق بلدنا أعطاني فرصة أوصل شغلي لكل الأردن وأنا ببيتي.</p>
        <div class="who">أم محمد <span>حرفية نسيج · السلط · ١٢ سنة خبرة</span></div>
    </div>
</section>

<!-- MISSION -->
<section class="mission">
    <span class="kicker">رسالتنا</span>
    <div class="manifesto" id="manifesto">
        <span data-words>نؤمن أنّ في كل قطعةٍ روحاً تستحق أن تُرى، </span><span data-words class="g">وفي كل حرفيٍّ موهبةً تستحق أن تُكرَّم. </span><span data-words>نحافظ على الإرث، </span><span data-words class="g">ونبني المستقبل.</span>
    </div>
    <div class="flag" id="missionFlag">🇯🇴 &nbsp; الأردن الحبيب &nbsp; 🇯🇴</div>
</section>

<!-- CONTACT / CTA -->
<section class="contact" id="contact">
    <div class="contact-head reveal">
        <div class="rule"><span class="line"></span><span class="dia"></span><span class="line r"></span></div>
        <span class="kicker">نحب نسمع منك</span>
        <h2>تواصل معنا</h2>
    </div>
    <div class="cgrid">
        <div class="ccard reveal"><span class="ic">📧</span><h5>البريد</h5><p>info@souqbaladna.jo</p></div>
        <div class="ccard reveal" style="transition-delay:.08s"><span class="ic">📍</span><h5>موقعنا</h5><p>عمّان، الأردن 🇯🇴</p></div>
        <div class="ccard reveal" style="transition-delay:.16s"><span class="ic">📱</span><h5>واتساب</h5><p>+962 79 000 0000</p></div>
    </div>
    <div class="cta-box reveal">
        <h3>جاهز تكتشف منتجاتنا الأصيلة؟</h3>
        <p>مئات القطع اليدوية الأردنية بتنتظرك</p>
        <a href="{{ route('products.index') }}" class="cta-btn">🛍️ تصفّح المنتجات</a>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="fgrid">
        <div class="fbrand">
            <div class="l">🏺 سوق <b>بلدنا</b></div>
            <p>منصة أردنية تجمع الحرفيين بالمحبّين للأصالة. نحافظ على الإرث، ونبني المستقبل.</p>
            <div class="fsoc"><a href="#">📘</a><a href="#">📷</a><a href="#">🐦</a><a href="#">📱</a></div>
        </div>
        <div class="fcol"><h5>روابط</h5><a href="#">الرئيسية</a><a href="#story">قصتنا</a><a href="#values">قيمنا</a><a href="#contact">تواصل</a></div>
        <div class="fcol"><h5>التصنيفات</h5><a href="#">فخّار</a><a href="#">نسيج</a><a href="#">بهارات</a><a href="#">نحاس</a></div>
        <div class="fcol"><h5>تواصل</h5><a href="#">info@souqbaladna.jo</a><a href="#">عمّان، الأردن</a><a href="#">+962 79 000 0000</a></div>
    </div>
    <div class="fbot">صُنع بكل <span class="h">♥</span> في الأردن · © ٢٠٢٦ سوق بلدنا — جميع الحقوق محفوظة</div>
</footer>

<script>
// nav
const nav = document.getElementById('nav');
addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 60));

// reveal
const io = new IntersectionObserver((es) => {
    es.forEach(e => { if (e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target);} });
}, { threshold: 0.14 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));

// counters (Arabic numerals)
const cio = new IntersectionObserver((es) => {
    es.forEach(e => {
        if(!e.isIntersecting) return;
        const el = e.target, t = +el.dataset.count; let c = 0;
        const step = Math.max(1, Math.ceil(t/55));
        const iv = setInterval(() => { c += step; if(c>=t){c=t; clearInterval(iv);} el.textContent = c.toLocaleString('ar-EG'); }, 24);
        cio.unobserve(el);
    });
}, { threshold: 0.6 });
document.querySelectorAll('[data-count]').forEach(el => cio.observe(el));

// interactive map
const info = document.getElementById('mapInfo');
const ic = info.querySelector('.ic'), h4 = info.querySelector('h4'), craft = info.querySelector('.craft'), desc = info.querySelector('p');
let activeGov = null;
function showGov(g){
    document.querySelectorAll('.gov').forEach(x => x.classList.remove('active'));
    g.classList.add('active');
    ic.style.transform = 'scale(0.6)';
    setTimeout(() => {
        ic.textContent = g.dataset.ic; h4.textContent = g.dataset.c;
        craft.textContent = g.dataset.craft; desc.className = ''; desc.textContent = g.dataset.d;
        ic.style.transform = 'scale(1)';
    }, 130);
}
document.querySelectorAll('.gov').forEach(g => {
    // label element
    const nm = document.createElement('div'); nm.className='nm'; nm.textContent = g.dataset.c;
    const pin = document.createElement('div'); pin.className='pin';
    g.appendChild(pin); g.appendChild(nm);
    g.addEventListener('mouseenter', () => showGov(g));
    g.addEventListener('click', () => showGov(g));
});

// mission word-by-word reveal
const mf = document.getElementById('missionFlag');
const mio = new IntersectionObserver((es) => {
    es.forEach(e => {
        if(!e.isIntersecting) return;
        const spans = document.querySelectorAll('#manifesto [data-words]');
        let words = [];
        spans.forEach(s => {
            const cls = s.className;
            const parts = s.textContent.split(' ').filter(Boolean);
            s.textContent = '';
            parts.forEach(p => {
                const w = document.createElement('span'); w.className = 'word' + (cls ? ' '+cls : '');
                w.textContent = p + ' '; s.appendChild(w); words.push(w);
            });
        });
        words.forEach((w,i) => setTimeout(() => w.classList.add('in'), i*85));
        setTimeout(() => mf.classList.add('in'), words.length*85 + 200);
        mio.disconnect();
    });
}, { threshold: 0.4 });
mio.observe(document.getElementById('manifesto'));
</script>
</body>
</html>