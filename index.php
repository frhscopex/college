<?php
require "dbcon.php";
if (!empty($_SESSION['username']))
{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Project</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
  <meta name="p:domain_verify" content="b0548e2bf7cf3b764b3b71cfccb63bf5"/>
  <style>
    /* Project Cards Styles */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        padding: 40px 20px;
    }

    .project-card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        text-align: center;
        padding: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        transition: transform 0.3s, box-shadow 0.3s;
        height: 400px; /* Fixed card height */
    }

    .project-card img {
        width: 100%;
        height: 200px; /* Image height */
        object-fit: cover; /* Properly scale without cutting */
        border-radius: 15px;
        margin-bottom: 15px;
        flex-shrink: 0;
    }

    .project-card h3 {
        margin: 5px 0;
        font-size: 20px;
        font-weight: 700;
        color: #fff;
    }

    .project-card p {
        margin: 5px 0;
        font-size: 14px;
        color: #ddd;
        flex-grow: 1; /* Keeps spacing consistent */
    }

    .project-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.45);
    }
  </style>
</head>
<body>

  <nav>
    <div class="logo">AIEMP</div>
    <ul>
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#projects">Projects</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <section class="hero hero-image-bg" id="home">
    <h1>Welcome to AIEMP Student Buddy</h1>
    <p>A dark-themed glassmorphism homepage with smooth animations, designed to impress and inspire.</p>
  </section>

  <section id="projects">
    <div class="projects-grid">
      <a href="resource.php" class="glass project-card">
        <img src="img/notes.jpg" alt="Project 1">
        <h3>Notes and Resources</h3>
        <p>A comprehensive collection of study notes, previous year question papers (PYQs), and other academic resources designed to help students revise efficiently and prepare for exams</p>
      </a>
      <a href="olx.php" class="glass project-card">
        <img src="img/olx.jpg" alt="Project 2">
        <h3>Project 2</h3>
        <p>Short description of Project 2.</p>
      </a>
    </div>
  </section>

  <section id="about">
    <div class="glass about-card">
      <div class="about-content">
        <div class="about-image">
          <img src="img/about.jpg" alt="About Us">
        </div>
        <div class="about-text">
          <h2>About Us</h2>
          <p>Our college project is more than just a website — it’s a demonstration of creativity, teamwork, and technical skills. Inspired by <strong>glassmorphism</strong>, smooth animations, and responsive layouts.</p>
          <p>The goal is to showcase design & development working together to create engaging user experiences. This reflects the dedication and collaboration of students building impactful digital experiences.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="glass contact-card">
      <div class="contact-content">
        <div class="contact-image">
          <img src="img/contact.jpg" alt="Contact Us">
        </div>
        <div class="contact-text">
          <h2>Contact Us</h2>
          <p>We’d love to hear from you! Whether it’s feedback, collaborations, or academic discussions:</p>
          <p>
            📧 <a href="mailto:collegeproject@example.com">collegeproject@example.com</a><br>
            📞 +91 98765 43210<br>
            📍 XYZ College, Computer Science Department
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Updated Footer -->
  <footer>
    <div class="footer-content">
      <p>&copy; 2025 College Project. Built with ❤️ and creativity.</p>
      <ul class="footer-links">
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="index.js"></script>
</body>
</html>
