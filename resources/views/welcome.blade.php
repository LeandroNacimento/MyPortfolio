<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Leandro Nacimento — Backend Developer. PHP, Laravel, MySQL, Docker, CI/CD, Azure.">
    <title>Leandro Nacimento — Backend Developer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- ── Navbar ─────────────────────────────────────────── --}}
    <nav class="nav" aria-label="Navegación principal">
        <a href="#overview" class="nav__brand">Leandro Nacimento</a>

        <ul class="nav__links" id="nav-links">
            <li><a href="#overview" class="nav__link is-active" data-section="overview">/overview</a></li>
            <li><a href="#projects" class="nav__link" data-section="projects">/projects</a></li>
            <li><a href="#stack"    class="nav__link" data-section="stack">/stack</a></li>
            <li><a href="#now"      class="nav__link" data-section="now">/now</a></li>
            <li><a href="#contact"  class="nav__link" data-section="contact">/contact</a></li>
        </ul>

        <button class="nav__toggle" id="nav-toggle" aria-label="Abrir menú" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    {{-- ── Mobile menu ─────────────────────────────────────── --}}
    <div class="nav__mobile" id="nav-mobile" role="dialog" aria-modal="true" aria-label="Menú de navegación">
        <a href="#overview" class="nav__mobile-link">/overview</a>
        <a href="#projects" class="nav__mobile-link">/projects</a>
        <a href="#stack"    class="nav__mobile-link">/stack</a>
        <a href="#now"      class="nav__mobile-link">/now</a>
        <a href="#contact"  class="nav__mobile-link">/contact</a>
    </div>

    {{-- ── Main content ────────────────────────────────────── --}}
    <main>

        {{-- ── #overview ──────────────────────────────────── --}}
        <section id="overview" class="section" aria-labelledby="overview-heading">
            <div class="page">
                <div class="overview">

                    {{-- Left: identity --}}
                    <div class="overview__left">
                        <h1 class="overview__name" id="overview-heading">
                            LEANDRO<br>NACIMENTO
                        </h1>
                        <p class="overview__title">Backend Developer</p>
                        <div class="overview__stack-lines">
                            <span class="overview__stack-line">PHP · Laravel · MySQL</span>
                            <span class="overview__stack-line">Docker · CI/CD · Azure</span>
                        </div>
                        <div class="overview__status">
                            <span class="overview__status-dot" aria-hidden="true"></span>
                            <span class="overview__status-text">Sistema operativo</span>
                        </div>
                        <a href="#projects" class="overview__cta">
                            Ver proyectos
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" aria-hidden="true">
                                <path d="M5 1L5 9M1 5L5 9L9 5" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>

                    {{-- Right: topology --}}
                    <div class="overview__right" aria-label="Stack tecnológico conceptual">
                        <div class="topology">

                            {{-- Group 1: CODE --}}
                            <div class="topology__group">
                                <span class="topology__group-label">CODE</span>
                                <div class="topology__box">
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Laravel</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">PHP 8.5</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">MySQL</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Wire --}}
                            <div class="topology__connector" aria-hidden="true">
                                <div class="topology__wire"></div>
                            </div>

                            {{-- Group 2: INFRA --}}
                            <div class="topology__group">
                                <span class="topology__group-label">INFRA</span>
                                <div class="topology__box">
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Docker</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Nginx</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Linux</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Wire --}}
                            <div class="topology__connector" aria-hidden="true">
                                <div class="topology__wire"></div>
                            </div>

                            {{-- Group 3: CLOUD --}}
                            <div class="topology__group">
                                <span class="topology__group-label">CLOUD</span>
                                <div class="topology__box">
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Azure</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">GH Actions</span>
                                    </div>
                                    <div class="topology__node">
                                        <span class="topology__node-dot" aria-hidden="true"></span>
                                        <span class="topology__node-name">Git</span>
                                    </div>
                                </div>
                            </div>

                        </div>{{-- /.topology --}}
                    </div>{{-- /.overview__right --}}

                </div>{{-- /.overview --}}
            </div>{{-- /.page --}}
        </section>

        {{-- ── #projects ────────────────────────────────────── --}}
        <section id="projects" class="section" aria-labelledby="projects-heading">
            <div class="page">
                <span class="section__label" id="projects-heading">PROJECTS</span>
                <div class="projects__grid">

                    {{-- Ivonne Showroom --}}
                    <article class="project-card">
                        <h2 class="project-card__name">Ivonne Showroom</h2>
                        <p class="project-card__description">Sistema de gestión para showroom con catálogo de productos y administración comercial.</p>
                        <div class="project-card__badges" aria-label="Tecnologías">
                            <span class="badge">Laravel</span>
                            <span class="badge">PHP</span>
                            <span class="badge">MySQL</span>
                        </div>
                        <div class="project-card__links">
                            <a href="https://github.com/LeandroNacimento" target="_blank" rel="noopener noreferrer" class="project-card__link" aria-label="Ver código en GitHub">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                                GitHub
                            </a>
                            <a href="#" class="project-card__link" aria-label="Ver proyecto en producción">
                                <svg width="11" height="11" viewBox="0 0 10 10" fill="none" aria-hidden="true"><path d="M7.5 2.5H2.5M7.5 2.5V7.5M7.5 2.5L2 8" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Live
                            </a>
                        </div>
                    </article>

                    {{-- Proyecto Privado --}}
                    <article class="project-card">
                        <h2 class="project-card__name">Proyecto Privado</h2>
                        <p class="project-card__description">Aplicación web actualmente en desarrollo.</p>
                        <div class="project-card__badges" aria-label="Tecnologías">
                            <span class="badge">Laravel</span>
                            <span class="badge">Docker</span>
                            <span class="badge">MySQL</span>
                        </div>
                        <div class="project-card__links">
                            <span class="project-card__link" style="opacity: 0.35; cursor: default;" aria-label="Repositorio privado">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                                Privado
                            </span>
                            <span class="project-card__link" style="opacity: 0.35; cursor: default;" aria-label="En desarrollo">
                                <svg width="11" height="11" viewBox="0 0 10 10" fill="none" aria-hidden="true"><path d="M7.5 2.5H2.5M7.5 2.5V7.5M7.5 2.5L2 8" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                En desarrollo
                            </span>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        {{-- ── #stack ───────────────────────────────────────── --}}
        <section id="stack" class="section" aria-labelledby="stack-heading">
            <div class="page">
                <span class="section__label" id="stack-heading">STACK</span>
                <div class="stack-table" role="table" aria-label="Inventario técnico">

                    {{-- Backend --}}
                    <div class="stack-group" role="rowgroup">
                        <div class="stack-group__header" role="columnheader">BACKEND</div>
                        <div class="stack-divider" aria-hidden="true"></div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">PHP 8.5</span>
                            <span class="stack-row__role" role="cell">Runtime</span>
                            <span class="stack-row__status status--principal" role="cell">
                                <span class="status-symbol" aria-hidden="true">●</span> Principal
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Laravel 13</span>
                            <span class="stack-row__role" role="cell">Framework</span>
                            <span class="stack-row__status status--principal" role="cell">
                                <span class="status-symbol" aria-hidden="true">●</span> Principal
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">MySQL 8</span>
                            <span class="stack-row__role" role="cell">Database</span>
                            <span class="stack-row__status status--principal" role="cell">
                                <span class="status-symbol" aria-hidden="true">●</span> Principal
                            </span>
                        </div>
                    </div>

                    {{-- Infraestructura --}}
                    <div class="stack-group" role="rowgroup">
                        <div class="stack-group__header" role="columnheader">INFRAESTRUCTURA</div>
                        <div class="stack-divider" aria-hidden="true"></div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Docker</span>
                            <span class="stack-row__role" role="cell">Containers</span>
                            <span class="stack-row__status status--active" role="cell">
                                <span class="status-symbol" aria-hidden="true">○</span> Activo
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Nginx</span>
                            <span class="stack-row__role" role="cell">Proxy / Web Server</span>
                            <span class="stack-row__status status--active" role="cell">
                                <span class="status-symbol" aria-hidden="true">○</span> Activo
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Linux</span>
                            <span class="stack-row__role" role="cell">Sistema operativo</span>
                            <span class="stack-row__status status--active" role="cell">
                                <span class="status-symbol" aria-hidden="true">○</span> Activo
                            </span>
                        </div>
                    </div>

                    {{-- CI/CD & Cloud --}}
                    <div class="stack-group" role="rowgroup">
                        <div class="stack-group__header" role="columnheader">CI/CD & CLOUD</div>
                        <div class="stack-divider" aria-hidden="true"></div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">GitHub Actions</span>
                            <span class="stack-row__role" role="cell">Pipelines</span>
                            <span class="stack-row__status status--adopting" role="cell">
                                <span class="status-symbol" aria-hidden="true">◈</span> En adopción
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Azure</span>
                            <span class="stack-row__role" role="cell">Cloud</span>
                            <span class="stack-row__status status--adopting" role="cell">
                                <span class="status-symbol" aria-hidden="true">◈</span> En adopción
                            </span>
                        </div>
                        <div class="stack-row" role="row">
                            <span class="stack-row__name" role="cell">Git</span>
                            <span class="stack-row__role" role="cell">Versioning</span>
                            <span class="stack-row__status status--active" role="cell">
                                <span class="status-symbol" aria-hidden="true">○</span> Activo
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- ── #now ─────────────────────────────────────────── --}}
        <section id="now" class="section" aria-labelledby="now-heading">
            <div class="page">
                <span class="section__label" id="now-heading">NOW</span>
                <div class="now__rows">
                    <div class="now__row">
                        <span class="now__label">CONSTRUYENDO</span>
                        <p class="now__value">Portfolio profesional y nuevos proyectos personales.</p>
                    </div>
                    <div class="now__row">
                        <span class="now__label">APRENDIENDO</span>
                        <p class="now__value">Docker, GitHub Actions y despliegues en Azure.</p>
                    </div>
                    <div class="now__row">
                        <span class="now__label">EXPLORANDO</span>
                        <p class="now__value">Arquitectura de aplicaciones Laravel, automatización y buenas prácticas de infraestructura.</p>
                    </div>
                </div>
                <p class="now__updated">Actualizado: junio 2026</p>
            </div>
        </section>

        {{-- ── #contact ─────────────────────────────────────── --}}
        <section id="contact" class="section" aria-labelledby="contact-heading">
            <div class="page">
                <span class="section__label" id="contact-heading">CONTACT</span>
                <div class="contact__inner">
                    <h2 class="contact__heading">¿Tenés un proyecto<br>o una oportunidad?</h2>
                    <a href="mailto:leandronacimento04@gmail.com" class="contact__email">
                        leandronacimento04@gmail.com
                    </a>
                    <div class="contact__links">
                        <a href="https://github.com/LeandroNacimento" target="_blank" rel="noopener noreferrer" class="contact__link" aria-label="GitHub de Leandro Nacimento">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                            GitHub
                        </a>
                        <a href="https://www.linkedin.com/in/nacimento-leandro/" target="_blank" rel="noopener noreferrer" class="contact__link" aria-label="LinkedIn de Leandro Nacimento">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </a>
                    </div>
                    <p class="contact__availability">
                        Disponible para proyectos freelance y oportunidades laborales.
                    </p>
                </div>
            </div>
        </section>

    </main>

    {{-- ── Status Bar ──────────────────────────────────────── --}}
    <aside class="statusbar" aria-label="Estado del sistema">
        <span class="statusbar__left" id="statusbar-text">
            <span class="statusbar__dot" aria-hidden="true"></span>
            <span id="statusbar-content">operativo &nbsp;&nbsp; PHP 8.5 · Laravel 13 · MySQL 8</span>
        </span>
        <span class="statusbar__right" id="statusbar-clock" aria-live="off"></span>
    </aside>

</body>
</html>
