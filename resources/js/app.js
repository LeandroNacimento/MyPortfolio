/**
 * Portfolio — Leandro Nacimento
 * JS: active nav tracking, live clock, mobile menu, status bar, smooth scroll
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

/* ── Active Nav & Status Bar Sync ──────────────────────────── */
const sections = document.querySelectorAll('main section[id]');
const navLinks = document.querySelectorAll('.nav__link[data-section]');

const activeSectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const id = entry.target.id;
            
            navLinks.forEach((link) => {
                const isActive = link.dataset.section === id;
                link.classList.toggle('is-active', isActive);
            });

            setStatusBarContent(id);
        }
    });
}, {
    root: null,
    rootMargin: '-52px 0px -40% 0px',
    threshold: 0
});

sections.forEach((section) => activeSectionObserver.observe(section));

/* ── Section Entrance Animations (SPA Block) ───────────────── */
const entranceSections = document.querySelectorAll('.section-transition');

const entranceObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('has-entered');
            // Dejar de observar para que la animación ocurra una sola vez
            observer.unobserve(entry.target);
        }
    });
}, {
    root: null,
    rootMargin: '0px 0px -10% 0px',
    threshold: 0
});

// En modo desarrollo de Vite, el CSS se inyecta asíncronamente.
// Esperamos a que la ventana esté cargada y damos un respiro para garantizar
// el estado inicial (opacity: 0) antes de aplicar .has-entered.
window.addEventListener('load', () => {
    entranceSections.forEach((section) => {
        entranceObserver.observe(section);
    });
});
/* ── Mobile navigation ─────────────────────────────────────── */
const navToggle = document.getElementById('nav-toggle');
const navMobile = document.getElementById('nav-mobile');

function openMobileNav() {
    if (!navMobile || !navToggle) return;

    navMobile.classList.add('is-open');
    navToggle.setAttribute('aria-expanded', 'true');
}

function closeMobileNav() {
    if (!navMobile || !navToggle) return;

    navMobile.classList.remove('is-open');
    navToggle.setAttribute('aria-expanded', 'false');
}

navToggle?.addEventListener('click', () => {
    const isOpen = navMobile.classList.contains('is-open');
    isOpen ? closeMobileNav() : openMobileNav();
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && navMobile.classList.contains('is-open')) {
        closeMobileNav();
    }
});

/* ── Custom Smooth Scroll (SPA Feel) ───────────────────────── */
function smoothScrollTo(href) {
    const targetElement = document.querySelector(href);
    if (!targetElement) return;

    // Calculamos la posición destino considerando el navbar
    const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - 76;
    const startPosition = window.scrollY;
    const distance = targetPosition - startPosition;
    const duration = 1200; // 1200ms de viaje
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const progress = Math.min(timeElapsed / duration, 1);
        
        // Easing: easeInOutQuart
        const ease = progress < 0.5 
            ? 8 * progress * progress * progress * progress 
            : 1 - Math.pow(-2 * progress + 2, 4) / 2;

        window.scrollTo(0, startPosition + distance * ease);

        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        } else {
            history.pushState(null, null, href);
        }
    }

    requestAnimationFrame(animation);
}

document.querySelectorAll('a[href^="#"]').forEach((link) => {
    const validSections = [...sections].map(section => `#${section.id}`);
    if (validSections.includes(link.getAttribute('href'))) {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            if (link.classList.contains('nav__mobile-link') || link.closest('.nav__mobile')) {
                closeMobileNav();
            }
            smoothScrollTo(link.getAttribute('href'));
        });
    }
});
