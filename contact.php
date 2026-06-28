<?php
// ── Form handler ────────────────────────────────────────────────────────────
$success = false;
$error   = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam      = htmlspecialchars(trim($_POST['naam']      ?? ''));
    $telefoon  = htmlspecialchars(trim($_POST['telefoon']  ?? ''));
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $woonplaats= htmlspecialchars(trim($_POST['woonplaats'] ?? ''));
    $interesses= isset($_POST['interesse']) ? (array)$_POST['interesse'] : [];
    $opmerking = htmlspecialchars(trim($_POST['opmerking'] ?? ''));

    if ($naam && $telefoon && $email && $woonplaats) {
        $to      = 'info@voltvink.com';
        $subject = "Nieuwe aanvraag van $naam";
        $body    = "Naam:        $naam\r\n"
                 . "Telefoon:    $telefoon\r\n"
                 . "E-mail:      $email\r\n"
                 . "Woonplaats:  $woonplaats\r\n"
                 . "Interesse:   " . implode(', ', $interesses) . "\r\n"
                 . "Opmerking:   $opmerking\r\n";
        $headers = "From: website@voltvink.com\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact – Volt Vink | Gratis advies aanvragen</title>
  <meta name="description" content="Vraag gratis en vrijblijvend advies aan bij Volt Vink. Wij nemen binnen 1 werkdag contact met u op. Bel ons op 085 744 4832.">
  <link rel="canonical" href="https://voltvink.com/contact.php">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<nav class="nav" aria-label="Hoofdnavigatie">
  <div class="container">
    <div class="nav__inner">
      <a href="index.html" class="nav__logo"><img src="images/logo.png" alt="Volt Vink" height="36"></a>
      <div class="nav__links">
        <a href="thuisbatterij.html">Thuisbatterij</a>
        <a href="zonnepanelen.html">Zonnepanelen</a>
        <a href="laadpaal.html">Laadpaal</a>
        <a href="projecten.html">Projecten</a>
        <a href="contact.php" class="active">Contact</a>
      </div>
      <div class="nav__right">
        <a href="tel:+31085744482" class="nav__phone">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          085 744 4832
        </a>
        <a href="contact.php" class="btn btn--primary">Gratis advies</a>
      </div>
      <button class="nav__hamburger" aria-label="Menu openen" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
    <div class="nav__mobile" role="menu">
      <a href="thuisbatterij.html">Thuisbatterij</a>
      <a href="zonnepanelen.html">Zonnepanelen</a>
      <a href="laadpaal.html">Laadpaal</a>
      <a href="projecten.html">Projecten</a>
      <a href="contact.php">Contact</a>
      <a href="tel:+31085744482" style="color:var(--amber);border-bottom:none;">085 744 4832</a>
    </div>
  </div>
</nav>

<section class="page-hero">
  <div class="container">
    <div class="page-hero__label">
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
      Reactie binnen 1 werkdag
    </div>
    <h1>Vraag gratis advies aan</h1>
    <p>Vul het formulier in en we nemen snel contact op. Geen verplichtingen, geen verkooppraatjes — gewoon eerlijk advies.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-grid">

      <!-- Contact info -->
      <div class="contact-info">
        <h2>Direct contact</h2>
        <p>Liever meteen bellen of mailen? Wij staan voor u klaar op werkdagen van 08:00 tot 18:00 uur.</p>
        <div class="contact-info__items">
          <div class="contact-info__item">
            <div class="contact-info__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div class="contact-info__text">
              <strong>Telefoon</strong>
              <a href="tel:+31085744482">085 744 4832</a>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div class="contact-info__text">
              <strong>E-mail</strong>
              <a href="mailto:info@voltvink.com">info@voltvink.com</a>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="contact-info__text">
              <strong>Adres</strong>
              <span>Spoorlaan Noord 176D<br>6042 AZ Roermond</span>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div class="contact-info__text">
              <strong>Openingstijden</strong>
              <span>Ma – Vr: 08:00 – 18:00</span>
            </div>
          </div>
        </div>
        <div class="contact-certs">
          <div class="cert-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            NEN gecertificeerd
          </div>
          <div class="cert-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            VCA geregistreerd
          </div>
          <div class="cert-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            Warmtefonds partner
          </div>
        </div>
      </div>

      <!-- Formulier -->
      <div class="form">
        <?php if ($success): ?>
        <div style="text-align:center;padding:48px 0;">
          <div style="width:64px;height:64px;background:var(--amber-light);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;color:var(--amber-dark);">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <h3 style="margin-bottom:10px;">Aanvraag ontvangen!</h3>
          <p>Bedankt <?= htmlspecialchars($naam) ?>. We nemen binnen 1 werkdag contact met u op.</p>
          <a href="index.html" class="btn btn--primary" style="margin-top:24px;">Terug naar home</a>
        </div>
        <?php else: ?>
        <div class="form__header">
          <h3>Ontvang uw gratis offerte</h3>
          <p>Wij nemen binnen 1 werkdag contact met u op — volledig vrijblijvend.</p>
        </div>

        <?php if ($error): ?>
        <div class="form__alert form__alert--error" style="display:block;margin-bottom:20px;">
          Er ging iets mis. Bel ons op <a href="tel:+31085744482" style="color:inherit;font-weight:700;">085 744 4832</a> of probeer het opnieuw.
        </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" novalidate>
          <div class="form__row">
            <div class="form__group">
              <label for="naam">Naam *</label>
              <input type="text" id="naam" name="naam" placeholder="Jan de Vries" required value="<?= htmlspecialchars($_POST['naam'] ?? '') ?>">
            </div>
            <div class="form__group">
              <label for="telefoon">Telefoonnummer *</label>
              <input type="tel" id="telefoon" name="telefoon" placeholder="06 12 34 56 78" required value="<?= htmlspecialchars($_POST['telefoon'] ?? '') ?>">
            </div>
          </div>
          <div class="form__row">
            <div class="form__group">
              <label for="email">E-mailadres *</label>
              <input type="email" id="email" name="email" placeholder="jan@voorbeeld.nl" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>
            <div class="form__group">
              <label for="woonplaats">Woonplaats *</label>
              <input type="text" id="woonplaats" name="woonplaats" placeholder="Roermond" required value="<?= htmlspecialchars($_POST['woonplaats'] ?? '') ?>">
            </div>
          </div>

          <div class="form__group">
            <label>Ik heb interesse in</label>
            <div class="interest-grid">
              <div class="interest-option">
                <input type="checkbox" id="int-batterij" name="interesse[]" value="Thuisbatterij" <?= in_array('Thuisbatterij', $_POST['interesse'] ?? []) ? 'checked' : '' ?>>
                <label for="int-batterij">
                  <svg class="interest-option__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="18" height="12" rx="2"/><line x1="23" y1="13" x2="23" y2="11"/></svg>
                  Thuisbatterij
                </label>
              </div>
              <div class="interest-option">
                <input type="checkbox" id="int-zon" name="interesse[]" value="Zonnepanelen" <?= in_array('Zonnepanelen', $_POST['interesse'] ?? []) ? 'checked' : '' ?>>
                <label for="int-zon">
                  <svg class="interest-option__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                  Zonnepanelen
                </label>
              </div>
              <div class="interest-option">
                <input type="checkbox" id="int-laad" name="interesse[]" value="Laadpaal" <?= in_array('Laadpaal', $_POST['interesse'] ?? []) ? 'checked' : '' ?>>
                <label for="int-laad">
                  <svg class="interest-option__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                  Laadpaal
                </label>
              </div>
              <div class="interest-option">
                <input type="checkbox" id="int-offerte" name="interesse[]" value="Offerte/adviesgesprek" <?= in_array('Offerte/adviesgesprek', $_POST['interesse'] ?? []) ? 'checked' : '' ?>>
                <label for="int-offerte">
                  <svg class="interest-option__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  Offerte / adviesgesprek
                </label>
              </div>
            </div>
          </div>

          <div class="form__group">
            <label for="opmerking">Opmerking (optioneel)</label>
            <textarea id="opmerking" name="opmerking" placeholder="Bijv. type woning, huidig energieverbruik, vragen..."><?= htmlspecialchars($_POST['opmerking'] ?? '') ?></textarea>
          </div>

          <label class="form__privacy">
            <input type="checkbox" required>
            Ik ga akkoord met de verwerking van mijn gegevens voor het beantwoorden van mijn aanvraag.
          </label>

          <button type="submit" class="btn btn--primary btn--full btn--lg">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            Vraag gratis advies aan
          </button>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand">
        <div class="footer__logo"><img src="images/logo.png" alt="Volt Vink" height="40" style="filter:brightness(0) invert(1);opacity:0.9;"></div>
        <p class="footer__tagline">De installateur voor uw duurzame energiesystemen. Eerlijk advies, vakwerk en duurzame energie voor particulieren en bedrijven.</p>
        <div class="footer__social">
          <a href="#" aria-label="Facebook"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
          <a href="#" aria-label="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Diensten</h4>
        <ul>
          <li><a href="thuisbatterij.html">Thuisbatterij</a></li>
          <li><a href="zonnepanelen.html">Zonnepanelen</a></li>
          <li><a href="laadpaal.html">Laadpaal</a></li>
          <li><a href="projecten.html">Projecten</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Bedrijf</h4>
        <ul>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="contact.php">Offerte aanvragen</a></li>
          <li><a href="#">Privacybeleid</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <div class="footer__contact-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg><a href="tel:+31085744482" style="color:rgba(255,255,255,0.6)">085 744 4832</a></div>
        <div class="footer__contact-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg><a href="mailto:info@voltvink.com" style="color:rgba(255,255,255,0.6)">info@voltvink.com</a></div>
        <div class="footer__contact-item"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span style="color:rgba(255,255,255,0.6)">Roermond, Limburg</span></div>
      </div>
    </div>
    <div class="footer__bottom">
      <span>&copy; 2025 Volt Vink. Alle rechten voorbehouden.</span>
      <div class="footer__certs"><span>NEN</span><span>VCA</span><span>Warmtefonds</span></div>
    </div>
  </div>
</footer>

<script src="js/main.js"></script>
</body>
</html>
