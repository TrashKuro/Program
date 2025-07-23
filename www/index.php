<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My Portfolio Homepage</title>
  <style>
    /* Google Fonts - Poppins & Montserrat */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@300;600&display=swap');

    :root {
      --primary-color: #4f46e5;
      --secondary-color: #6366f1;
      --bg-color: #f0f4ff;
      --text-color: #1f2937;
      --accent-color: #ef4444;
      --border-radius: 10px;
      --max-width: 1200px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      line-height: 1.6;
    }

    header {
      background-color: #fff;
      padding: 1rem 2rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .container {
      max-width: var(--max-width);
      margin: 0 auto;
      padding: 0 1rem;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-color);
      letter-spacing: 2px;
      text-transform: uppercase;
      user-select: none;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 1rem;
      margin: 0;
      padding: 0;
      flex-wrap: wrap;
      justify-content: center;
      white-space: nowrap;

    }
     nav li {
      flex-shrink: 0; /* jangan kecil */
    }

    nav a {
      color: var(--text-color);
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: var(--primary-color);
    }

    main {
      padding: 3rem 1rem 5rem;
      min-height: 80vh;
    }

    .hero {
      text-align: center;
      padding: 3rem 1rem;
      border-radius: var(--border-radius);
      max-width: 900px;
      margin: 2rem auto 4rem;
      box-shadow: 0 10px 30px rgba(79, 70, 229, 0.3);

      /* Background image or GIF from local file */
      background-image: url('himnel.gif');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

      color: white;
      position: relative;
    }

    /* Optional overlay to darken background for text readability */
    .hero::before {
      content: "";
      display: block;
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.4);
      border-radius: var(--border-radius);
      z-index: 0;
    }

    .hero > * {
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      margin: 0 0 0.5rem;
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 3rem;
      letter-spacing: 0.05em;
    }

    .hero p {
      font-size: 1.2rem;
      font-weight: 300;
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.4;
    }

    section {
      max-width: var(--max-width);
      margin: 3rem auto;
      padding: 0 1rem;
    }

    h2.section-title {
      color: var(--primary-color);
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 1.5rem;
      border-bottom: 3px solid var(--primary-color);
      display: inline-block;
      padding-bottom: 0.3rem;
    }

    .about-me {
      font-weight: 400;
      font-size: 1.1rem;
      color: #374151;
      line-height: 1.6;
      text-align: left;
    }

    footer {
      background-color: #1f2937;
      color: #f9fafb;
      text-align: center;
      padding: 1.3rem 1rem;
      font-size: 0.9rem;
    }

    .fadyl-btn {
      display: inline-block;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      background-color: var(--primary-color);
      color: white;
      font-weight: 600;
      font-size: 0.9rem;
      text-decoration: none;
      transition: background-color 0.3s ease;
      margin-top: 1rem;
      box-shadow: 0 5px 15px rgba(79,70,229,0.4);
    }

    .fadyl-btn:hover {
      background-color: var(--secondary-color);
      box-shadow: 0 8px 25px rgba(99,102,241,0.6);
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2rem;
      }
      .hero p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <nav aria-label="Primary navigation">
        <div class="logo">Fadyl</div>
        <ul>
          <li><a href="about-me.html">About Me</a></li>
          <li><a href="tugas.html">tugas</a></li>
          <li><a href="php">Data Siswa</a></li>
          <li><a href="contactme.html">Contact</a></li> <!-- Updated link -->
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero" aria-label="Introduction">
      <h1>Hello, I'm  Fadyl</h1>
      <p>Terimakasih sudah datang ke portofolio saya</p>
    </section>

    <section id="contact" aria-label="Contact me" style="text-align:center; margin-top:4rem;">
      <h2 class="section-title">Get In Touch</h2>
      <p>Silahkan memilih</p>
      <a href="tugas.html" class="fadyl-btn" role="button" >Tugas</a>
      <a href="php" class="fadyl-btn" role="button" >Data siswa</a>
      <a href="about-me.html" class="fadyl-btn" role="button" >About Me</a>
      <a href="contactme.html" class="fadyl-btn" role="button" >Contact Me</a>
    </section>
  </main>

  <footer>
    &copy; fadyl. web designer handal.
  </footer>
</body>
</html>
