/* Navigation scroll effect */
const nav = document.querySelector('.nav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('nav--scrolled', window.scrollY > 10);
  });
}

/* Mobile hamburger */
const hamburger = document.querySelector('.nav__hamburger');
const mobileNav = document.querySelector('.nav__mobile');
if (hamburger && mobileNav) {
  hamburger.addEventListener('click', () => {
    const open = mobileNav.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', open);
  });
}

/* Active nav link */
const currentPath = window.location.pathname.split('/').pop() || 'index.html';
document.querySelectorAll('.nav__links a, .nav__mobile a').forEach(a => {
  const href = a.getAttribute('href');
  if (href === currentPath || (currentPath === '' && href === 'index.html')) {
    a.classList.add('active');
  }
});

/* Contact form: interest toggles */
document.querySelectorAll('.interest-option input[type="checkbox"]').forEach(cb => {
  cb.addEventListener('change', () => {
    cb.closest('.interest-option').classList.toggle('checked', cb.checked);
  });
});

/* Form submission feedback (for PHP redirect or AJAX) */
const formAlert = document.querySelector('.form__alert');
if (window.location.search.includes('verzonden=1') && formAlert) {
  formAlert.classList.add('form__alert--success');
  formAlert.textContent = 'Bedankt voor je aanvraag! We nemen binnen 1 werkdag contact met je op.';
  formAlert.style.display = 'block';
}
if (window.location.search.includes('fout=1') && formAlert) {
  formAlert.classList.add('form__alert--error');
  formAlert.textContent = 'Er ging iets mis. Bel ons gerust op 085 744 4832.';
  formAlert.style.display = 'block';
}

/* Smooth reveal on scroll */
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.style.opacity = '1'; e.target.style.transform = 'translateY(0)'; }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.service-card, .usp, .review-card, .process-step').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    observer.observe(el);
  });
}
