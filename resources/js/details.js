import Alpine from 'alpinejs'

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
    Alpine.data('innovationDetail', () => ({
        lightboxOpen: false,
        currentImages: [],
        currentIndex: 0,
        currentImage: '',
        currentType: 'image',
        totalImages: 0,

        init() {},

        openLightbox(images, index) {
            this.currentImages = images
            this.currentIndex = index
            this.totalImages = images.length
            this.currentImage = images[index].url
            this.currentType = images[index].type
            this.lightboxOpen = true
            document.body.style.overflow = 'hidden'
        },

        closeLightbox() {
            this.lightboxOpen = false
            this.currentImages = []
            this.currentIndex = 0
            this.totalImages = 0
            this.currentImage = ''
            this.currentType = 'image'
            document.body.style.overflow = ''

            // stop video saat lightbox ditutup
            const video = document.getElementById('lightbox-video')
            if (video) video.pause()
        },

        prevImage() {
            if (this.totalImages === 0) return
            this.currentIndex = (this.currentIndex - 1 + this.totalImages) % this.totalImages
            this.updateCurrent()
        },

        nextImage() {
            if (this.totalImages === 0) return
            this.currentIndex = (this.currentIndex + 1) % this.totalImages
            this.updateCurrent()
        },

        updateCurrent() {
            // pause video sebelum ganti
            const video = document.getElementById('lightbox-video')
            if (video) video.pause()

            this.currentImage = this.currentImages[this.currentIndex].url
            this.currentType = this.currentImages[this.currentIndex].type
        }
    }))
})

Alpine.start()
