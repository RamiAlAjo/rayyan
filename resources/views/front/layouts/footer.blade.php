  <style>
    .footer-top {
      background-color: #355043;
      padding: 20px 0;
    }

    .footer-icons i {
      font-size: 30px;
      margin: 0 8px;
      color: white;
      padding: 8px;
      border-radius: 6px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .footer-icons i:hover,
    .footer-icons i:focus {
      transform: scale(1.2);
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
      outline: none;
    }

    .footer-icons .facebook  { background-color: #3b5998; }
    .footer-icons .twitter   { background-color: #1da1f2; }
    .footer-icons .youtube   { background-color: #ff0000; }
    .footer-icons .linkedin  { background-color: #0077b5; }
    .footer-icons .instagram {
      background: radial-gradient(circle at 30% 30%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285aeb 90%);
    }

    .footer-bottom {
      background-color: #157347;
      padding: 15px 0;
      color: white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 1.25rem; /* Responsive font size */
      text-align: center;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
      .footer-icons i {
        font-size: 24px;
        margin: 0 5px;
        padding: 6px;
      }

      .footer-bottom {
        font-size: 1rem;
        padding: 10px 0;
      }
    }
  </style>
</head>
<body>

    <!-- Footer -->
<footer class="footer mt-5" role="contentinfo" aria-label="Footer">
  <div class="footer-top text-center">
    <div class="footer-icons d-inline-block" role="list">
      <a href="{{ $settings->facebook ?? '#' }}" aria-label="Facebook" role="listitem" tabindex="0">
        <i class="fab fa-facebook facebook"></i>
      </a>
      <a href="{{ $settings->twitter ?? '#' }}" aria-label="Twitter" role="listitem" tabindex="0">
        <i class="fab fa-twitter twitter"></i>
      </a>
      <a href="{{ $settings->youtube ?? '#' }}" aria-label="YouTube" role="listitem" tabindex="0">
        <i class="fab fa-youtube youtube"></i>
      </a>
      <a href="{{ $settings->instagram ?? '#' }}" aria-label="Instagram" role="listitem" tabindex="0">
        <i class="fab fa-instagram instagram"></i>
      </a>
    </div>
  </div>
  <div class="footer-bottom">
    Web Design & Development by Jordancode © 2025
  </div>
</footer>


