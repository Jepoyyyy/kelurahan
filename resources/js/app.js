// import './bootstrap';
// // Dropown Script untuk gender
// document.addEventListener("DOMContentLoaded", function () {
//     const genderSelect = document.getElementById('gender');
//     const letterTypeSelect = document.getElementById('letter_type');

//     if (!genderSelect || !letterTypeSelect) {
//         console.warn('Gender tidak ditemukan');
//         return;
//     }

//     const optionsMap = {
//         L: [
//             { value: 'Jejaka', text: 'Jejaka' },
//             { value: 'Duda', text: 'Duda' },
//             { value: 'Beristri', text: 'Beristri' }
//         ],
//         P: [
//             { value: 'Janda', text: 'Janda' },
//             { value: 'Perawan', text: 'Perawan' }
//         ]
//     };

//     // Trigger on page load untuk handle pre-selected values
//     updateLetterTypeOptions();

//     genderSelect.addEventListener('change', updateLetterTypeOptions);

//     function updateLetterTypeOptions() {
//         const selectedGender = genderSelect.value;
//         letterTypeSelect.innerHTML = '<option value="">-- Pilih --</option>';

//         if (optionsMap[selectedGender]) {
//             optionsMap[selectedGender].forEach(opt => {
//                 const option = document.createElement('option');
//                 option.value = opt.value;
//                 option.textContent = opt.text;
//                 letterTypeSelect.appendChild(option);
//             });
//         }
//     }

//     // Show/hide jumlah istri berdasarkan pilihan beristri
//     letterTypeSelect.addEventListener('change', function () {
//         const jumlahIstriDiv = document.querySelector('.jumlahistri');
//         if (this.value === 'Beristri') {
//             jumlahIstriDiv.classList.remove('hidden');
//         } else {
//             jumlahIstriDiv.classList.add('hidden');
//         }
//     });

//    // Show/hide nama pasangan sebelumnya berdasarkan pilihan janda
//    letterTypeSelect.addEventListener('change', function () {
//         const partnerSebelumnya = document.querySelector('.partnersebelumnya');
//         const showStates = ['Jejaka', 'Perawan'];
//             if (showStates.includes(this.value)) {
//                 partnerSebelumnya.classList.add('hidden');
//             } else {
//                 partnerSebelumnya.classList.remove('hidden');
//             }

//                 });
// });
import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {

    const genderSelect = document.getElementById('gender');
    const letterTypeSelect = document.getElementById('letter_type');

    // ==============================
    // LOGIC PEMOHON SAJA
    // ==============================
    if (genderSelect && letterTypeSelect) {

        const optionsMap = {
            L: [
                { value: 'Jejaka', text: 'Jejaka' },
                { value: 'Duda', text: 'Duda' },
                { value: 'Beristri', text: 'Beristri' }
            ],
            P: [
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
