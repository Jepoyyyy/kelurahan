<div class="counter-wrapper bg-grey-100 p-4 rounded-lg">
    <div class="grid grid-cols-3 gap-4 m-1 justify-between items-center">
        <div class="counter-card">
            <div class="title-con">
                <x-heroicon-o-document-text class="w-6 h-6 text-gray-500 "/>
                <h2 class="counter-title text-[15px] font-semibold ">Jumlah Surat</h2>
            </div>
           <div class=" flex items-center justify-between pt-3">
                <p class="counter-value font-semibold text-[30px]">120</p>
                <div class="total-counter">
                    <p >Total</p>
                    <p class="text-emerald-500">1200</p>
                </div>
            </div>
        </div>
        <div class="counter-card ">
            <div class="title-con">
                <x-heroicon-o-user class="w-8 h-8 text-gray-500 "/>
                <h2 class="counter-title text-[20px] font-bold">Jumlah Penduduk</h2>
            </div>
            <div class=" flex items-center justify-between">
                <p class="counter-value">0</p>
                <div class="total-counter ">
                    <p>Total</p>
                    <p>0</p>
                </div>
            </div>
        </div>
        <div class="counter-card border-2 rounded p-5">
            <div class="title-con flex flex-row items-center gap-2 ">
                <x-heroicon-o-newspaper class="w-8 h-8 text-gray-500 "/>
                <h2 class="counter-title text-[20px] font-bold">Jumlah Berita</h2>
            </div>
            <div class=" flex items-center justify-between">
                <p class="counter-value">0</p>
                <div class="total-counter ">
                    <p>Total</p>
                    <p>0</p>
                </div>
            </div>
        </div>
    </div>
</div>
