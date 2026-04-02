import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {

    const genderSelect = document.getElementById('gender');
    const letterTypeSelect = document.getElementById('status');

    // ==============================
    // LOGIC PEMOHON SAJA
    // ==============================
    if (genderSelect && letterTypeSelect) {

        const optionsMap = {
            'Laki-laki': [
                { value: 'Jejaka', text: 'Jejaka' },
                { value: 'Duda', text: 'Duda' },
                { value: 'Beristri', text: 'Beristri' }
            ],
            'Perempuan': [
                { value: 'Janda', text: 'Janda' },
                { value: 'Perawan', text: 'Perawan' }
            ]
        };

        updateLetterTypeOptions();
        genderSelect.addEventListener('change', updateLetterTypeOptions);

        function updateLetterTypeOptions() {
            const selectedGender = genderSelect.value;
            letterTypeSelect.innerHTML = '<option value="">-- Pilih --</option>';

            if (optionsMap[selectedGender]) {
                optionsMap[selectedGender].forEach(opt => {
                    const option = document.createElement('option');
                    option.value = opt.value;
                    option.textContent = opt.text;
                    letterTypeSelect.appendChild(option);
                });
            }
        }

        letterTypeSelect.addEventListener('change', function () {
            const jumlahIstriDiv = document.querySelector('.jumlahistri');
            if (jumlahIstriDiv) {
                this.value === 'Beristri'
                    ? jumlahIstriDiv.classList.remove('hidden')
                    : jumlahIstriDiv.classList.add('hidden');
            }
        });

        letterTypeSelect.addEventListener('change', function () {
            const partnerSebelumnya = document.querySelector('.partnersebelumnya');
            if (partnerSebelumnya) {
                const showStates = ['Jejaka', 'Perawan'];
                showStates.includes(this.value)
                    ? partnerSebelumnya.classList.add('hidden')
                    : partnerSebelumnya.classList.remove('hidden');
            }
        });
    }

});
