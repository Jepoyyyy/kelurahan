import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.data('carousel', () => ({
    active: 0,
    total: 0,
    timer: null,
    init() {
        this.total = this.$el.querySelectorAll('[data-slide]').length;
        this.start();
    },
    start() {
        this.timer = setInterval(() => {
            this.active = (this.active + 1) % this.total;
        }, 7000);
    },
    go(index) {
        this.active = index;
        clearInterval(this.timer);
        this.start();
    },
    prev() { this.go((this.active - 1 + this.total) % this.total); },
    next() { this.go((this.active + 1) % this.total); }
}));

Alpine.data('navbarData', () => ({
    menuOpen: false,
    scrolled: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        });

        const setActive = (id) => {
            document.querySelectorAll('.nav-link').forEach(el => {
                const isActive = el.dataset.section === id;
                el.classList.toggle('text-teal-700', isActive);
                el.classList.toggle('font-semibold', isActive);
                el.classList.toggle('text-gray-500', !isActive);
                const underline = el.querySelector('.nav-underline');
                if (underline) underline.classList.toggle('opacity-100', isActive);
            });

            document.querySelectorAll('.mobile-nav-link').forEach(el => {
                const isActive = el.dataset.section === id;
                el.classList.toggle('text-teal-700', isActive);
                el.classList.toggle('bg-teal-50', isActive);
                el.classList.toggle('text-gray-600', !isActive);
                const chevron = el.querySelector('.chevron');
                if (chevron) {
                    chevron.classList.toggle('text-teal-500', isActive);
                    chevron.classList.toggle('text-gray-300', !isActive);
                }
            });
        };

        const raw = document.getElementById('nav-sections');
        const navUrls = raw ? JSON.parse(raw.dataset.sections) : [];

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) setActive(entry.target.id);
            });
        }, { threshold: 0.4 });

        navUrls.forEach(url => {
            const id = url.replace('/#', '');
            const el = document.getElementById(id);
            if (el) observer.observe(el);
        });

        setActive('beranda');
    }
}));

Alpine.start();
