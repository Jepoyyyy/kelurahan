import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import idLocale from '@fullcalendar/core/locales/id';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    if (!calendarEl) return;

    let selectedDate = null;

    // ─── Render event list di sidebar kiri ───────────────────────────────────
    function renderEventList(filterDate = null) {
        const list  = document.getElementById('event-list');
        const title = document.getElementById('event-list-title');
        if (!list || !title) return;

        const today    = new Date();
        today.setHours(0, 0, 0, 0);
        const nextWeek = new Date(today);
        nextWeek.setDate(today.getDate() + 7);

        let filtered;

        if (filterDate) {
            const dateStr = filterDate.toISOString().split('T')[0];
            filtered = (window.calendarEvents ?? []).filter(e => e.start === dateStr);
            title.innerText = filterDate.toLocaleDateString('id-ID', {
                day: 'numeric', month: 'long', year: 'numeric'
            });
        } else {
            filtered = (window.calendarEvents ?? []).filter(e => {
                const d = new Date(e.start);
                d.setHours(0, 0, 0, 0);
                return d >= today && d <= nextWeek;
            });
            title.innerText = 'Event 7 Hari Kedepan';
        }

        if (filtered.length === 0) {
            list.innerHTML = '<p class="no-event-msg">Tidak ada event.</p>';
            return;
        }

        list.innerHTML = filtered.map(e => `
            <div class="event-item">
                <span class="event-dot" style="background-color:${e.color ?? '#6B7280'}"></span>
                <div class="event-item-info">
                    <p class="event-item-title">${e.title}</p>
                    <p class="event-item-date">${new Date(e.start).toLocaleDateString('id-ID', {
                        day: 'numeric', month: 'long', year: 'numeric'
                    })}</p>
                </div>
            </div>
        `).join('');
    }

    // ─── Init FullCalendar ────────────────────────────────────────────────────
    const calendar = new Calendar(calendarEl, {
        plugins:  [dayGridPlugin, interactionPlugin],
        locale:   idLocale,
        initialView: 'dayGridMonth',

        headerToolbar: {
            left:   'prev',
            center: 'title',
            right:  'next',
        },


        dayMaxEvents: 2,
        events:       window.calendarEvents ?? [],

        eventContent: function(arg) {
            return {
                html: `
                    <div style="
                        width: 8px;
                        height: 8px;
                        border-radius: 50%;
                        background-color: ${arg.event.backgroundColor};
                        margin: 4px auto;
                    "></div>
                `
            };
        },
        eventDidMount: function(arg) {
    // Cek apakah elemen ini ada di dalam popover
    if (arg.el.closest('.fc-popover')) {
        // Ganti konten titik dengan titik + title
        arg.el.innerHTML = `
            <div style="display:flex; align-items:center; gap:6px; padding:2px 4px;">
                <span style="width:8px;height:8px;border-radius:50%;background:${arg.event.backgroundColor};flex-shrink:0;display:inline-block;"></span>
                <span style="font-size:0.82rem;color:#374151;">${arg.event.title}</span>
            </div>
        `;
    }
},

        // ── Klik tanggal ──────────────────────────────────────────────────────
        dateClick: function (info) {
            const clicked = info.date;

            // Toggle: klik tanggal yang sama = batalkan
            if (selectedDate && selectedDate.toISOString() === clicked.toISOString()) {
                selectedDate = null;
                document.querySelectorAll('.fc-day-selected')
                    .forEach(el => el.classList.remove('fc-day-selected'));
                renderEventList();
            } else {
                selectedDate = clicked;
                document.querySelectorAll('.fc-day-selected')
                    .forEach(el => el.classList.remove('fc-day-selected'));
                info.dayEl.classList.add('fc-day-selected');
                renderEventList(clicked);
            }
        },

        // ── Klik event pill ───────────────────────────────────────────────────
        eventClick: function (info) {
            const card = document.getElementById('event-detail-card');
            if (!card) return;

            document.getElementById('detail-title').innerText       = info.event.title;
            document.getElementById('detail-date').innerText        = new Date(info.event.startStr)
                .toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
            document.getElementById('detail-desc').innerText        = info.event.extendedProps.description ?? '-';
            document.getElementById('detail-category').innerText    = info.event.extendedProps.category ?? '';
            document.getElementById('detail-category').style.backgroundColor = info.event.backgroundColor;

            card.classList.remove('hidden');
        },
    });

    calendar.render();

    // Default load
    renderEventList();

    // Tutup detail card
    const closeBtn = document.getElementById('close-detail-card');
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            document.getElementById('event-detail-card').classList.add('hidden');
        });
    }
});
