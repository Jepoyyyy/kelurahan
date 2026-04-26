import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { Indonesian } from 'flatpickr/dist/l10n/id.js';

document.addEventListener('alpine:init', () => {
    Alpine.data('datepicker', (wireModel) => ({
        init() {
            flatpickr(this.$refs.input, {
                locale: Indonesian,
                dateFormat: 'Y-m-d',
                allowInput: false,
                disableMobile: true,
                onChange: (selectedDates, dateStr) => {
                    this.$dispatch('input', dateStr);
                }
            });
        }
    }));
});
