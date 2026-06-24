/**
 * Portfolio — Leandro Nacimento
 * JS: active nav tracking, live clock, mobile menu, status bar
 */

/* ── Live clock in status bar ───────────────────────────────── */
function updateClock() {
    const el = document.getElementById('statusbar-clock');
    if (!el) return;

    const now  = new Date();
    const hh   = String(now.getUTCHours()).padStart(2, '0');
    const mm   = String(now.getUTCMinutes()).padStart(2, '0');
    el.textContent = `${hh}:${mm} UTC`;
}

updateClock();
setInterval(updateClock, 30_000);

/* ── Status bar context per section ────────────────────────── */
const statusMessages = {
    overview: 'operativo \u00a0\u00a0 PHP 8.5 · Laravel 13 · MySQL 8',
    projects: '2 proyectos \u00a0\u00a0 Ivonne Showroom · Proyecto Privado',
    stack:    'stack activo \u00a0\u00a0 Docker · Azure · GitHub Actions',
    now:      'actualizado: junio 2026',
    contact:  'disponible para proyectos y oportunidades laborales',
};

function setStatusBarContent(sectionId) {
    const el = document.getElementById('statusbar-content');
    if (!el) return;
    const msg = statusMessages[sectionId] ?? statusMessages.overview;
    el.textContent = msg;
}

/* ── IntersectionObserver — active nav + status bar ─────────── */
const sections = document.querySelectorAll('main section[id]');
const navLinks  = document.querySelectorAll('.nav__link[data-section]');

const observerOptions = {
    root:       null,
    rootMargin: `-${52}px 0px -40% 0px`,
    threshold:  0,
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const id = entry.target.id;

        navLinks.forEach((link) => {
            const isActive = link.dataset.section === id;
            link.classList.toggle('is-active', isActive);
        });

        setStatusBarContent(id);
    });
}, observerOptions);

sections.forEach((section) => observer.observe(section));

/* ── Mobile navigation ─────────────────────────────────────── */
const navToggle = document.getElementById('nav-toggle');
const navMobile = document.getElementById('nav-mobile');
const mobileLinks = document.querySelectorAll('.nav__mobile-link');

function openMobileNav() {
    navMobile.classList.add('is-open');
    navToggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
}

function closeMobileNav() {
    navMobile.classList.remove('is-open');
    navToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
}

navToggle?.addEventListener('click', () => {
    const isOpen = navMobile.classList.contains('is-open');
    isOpen ? closeMobileNav() : openMobileNav();
});

mobileLinks.forEach((link) => {
    link.addEventListener('click', closeMobileNav);
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && navMobile.classList.contains('is-open')) {
        closeMobileNav();
    }
});
