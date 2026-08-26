/**
 * Global Image Cropper Helper for MI Darun Najah Admin
 * Integrates Cropper.js dynamically to allow cropping, zooming, and rotating images on upload.
 */
(function() {
    // 1. Load CSS
    if (!document.getElementById('cropper-css')) {
        const link = document.createElement('link');
        link.id = 'cropper-css';
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css';
        document.head.appendChild(link);
    }

    // 2. Load JS dynamically
    let cropperScriptPromise = new Promise((resolve) => {
        if (typeof Cropper !== 'undefined') {
            resolve();
            return;
        }
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js';
        script.onload = () => resolve();
        document.head.appendChild(script);
    });

    // 3. Setup Modal HTML Structure
    function getOrCreateModal() {
        let modal = document.getElementById('global-cropper-modal');
        if (modal) return modal;

        modal = document.createElement('div');
        modal.id = 'global-cropper-modal';
        modal.className = 'hidden fixed inset-0 z-[200] flex items-center justify-center px-4';
        modal.innerHTML = `
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>
            <div class="relative bg-[#f8f9fa] w-full max-w-lg p-6 rounded-2xl shadow-2xl border border-[#bec9c8] flex flex-col max-h-[90vh] animate-in fade-in zoom-in duration-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-semibold text-lg text-[#004c4c]">Sesuaikan & Potong Gambar</h3>
                    <button type="button" id="cropper-close-btn" class="p-1.5 hover:bg-gray-200 rounded-full text-gray-500">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                </div>
                <div class="flex-1 min-h-[300px] max-h-[50vh] bg-black rounded-lg overflow-hidden flex items-center justify-center">
                    <img id="cropper-target-image" class="max-w-full max-h-full block">
                </div>
                <!-- Control Buttons -->
                <div class="flex justify-center gap-4 my-4">
                    <button type="button" id="cropper-zoom-in" class="p-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 flex items-center justify-center" title="Zoom In">
                        <span class="material-symbols-outlined">zoom_in</span>
                    </button>
                    <button type="button" id="cropper-zoom-out" class="p-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 flex items-center justify-center" title="Zoom Out">
                        <span class="material-symbols-outlined">zoom_out</span>
                    </button>
                    <button type="button" id="cropper-rotate-left" class="p-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 flex items-center justify-center" title="Rotate Left">
                        <span class="material-symbols-outlined">rotate_left</span>
                    </button>
                    <button type="button" id="cropper-rotate-right" class="p-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-gray-700 flex items-center justify-center" title="Rotate Right">
                        <span class="material-symbols-outlined">rotate_right</span>
                    </button>
                </div>
                <div class="flex gap-3 border-t border-gray-200 pt-4">
                    <button type="button" id="cropper-cancel-btn" class="flex-1 py-2.5 px-4 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors text-sm font-semibold">
                        Batal
                    </button>
                    <button type="button" id="cropper-save-btn" class="flex-1 py-2.5 px-4 bg-[#004c4c] text-white rounded-xl hover:bg-[#003d3d] transition-colors text-sm font-semibold shadow-lg shadow-[#004c4c]/20">
                        Potong & Simpan
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        return modal;
    }

    // 4. Expose attachCropper to window object
    window.attachCropper = function(fileInput, options = {}) {
        if (!fileInput) return;

        const aspectRatio = options.aspectRatio !== undefined ? options.aspectRatio : NaN;
        const previewImg = options.previewImageElement || null;
        let activeCropper = null;
        let isCancelled = false;

        fileInput.addEventListener('change', async function(e) {
            if (!this.files || !this.files.length) return;
            const file = this.files[0];

            // If the file is already the cropped blob created by us, let it proceed
            if (file.isCropped) return;

            // Wait for Cropper.js script to load if it hasn't
            await cropperScriptPromise;

            const modal = getOrCreateModal();
            const targetImg = document.getElementById('cropper-target-image');
            const closeBtn = document.getElementById('cropper-close-btn');
            const cancelBtn = document.getElementById('cropper-cancel-btn');
            const saveBtn = document.getElementById('cropper-save-btn');
            const zoomInBtn = document.getElementById('cropper-zoom-in');
            const zoomOutBtn = document.getElementById('cropper-zoom-out');
            const rotateLeftBtn = document.getElementById('cropper-rotate-left');
            const rotateRightBtn = document.getElementById('cropper-rotate-right');

            isCancelled = true; // Default to true unless save is clicked

            // Read file
            const reader = new FileReader();
            reader.onload = function(event) {
                targetImg.src = event.target.result;
                modal.classList.remove('hidden');

                if (activeCropper) {
                    activeCropper.destroy();
                }

                let currentAspectRatio = NaN;
                if (typeof options.aspectRatio === 'function') {
                    currentAspectRatio = options.aspectRatio();
                } else if (options.aspectRatio !== undefined) {
                    currentAspectRatio = options.aspectRatio;
                }

                activeCropper = new Cropper(targetImg, {
                    aspectRatio: currentAspectRatio,
                    viewMode: 1,
                    autoCropArea: 1,
                    responsive: true,
                    background: false,
                });
            };
            reader.readAsDataURL(file);

            // Close logic
            function closeModal() {
                modal.classList.add('hidden');
                if (activeCropper) {
                    activeCropper.destroy();
                    activeCropper = null;
                }
                if (isCancelled) {
                    // Reset input value so it doesn't submit a wrong/uncropped file if cancelled
                    fileInput.value = ''; 
                }
            }

            closeBtn.onclick = closeModal;
            cancelBtn.onclick = closeModal;

            // Control Actions
            zoomInBtn.onclick = () => activeCropper && activeCropper.zoom(0.1);
            zoomOutBtn.onclick = () => activeCropper && activeCropper.zoom(-0.1);
            rotateLeftBtn.onclick = () => activeCropper && activeCropper.rotate(-90);
            rotateRightBtn.onclick = () => activeCropper && activeCropper.rotate(90);

            // Save logic
            saveBtn.onclick = function() {
                if (!activeCropper) return;

                // Generate cropped canvas
                const canvas = activeCropper.getCroppedCanvas({
                    maxWidth: 1200,
                    maxHeight: 1200,
                    imageSmoothingQuality: 'high'
                });

                canvas.toBlob(function(blob) {
                    if (!blob) return;

                    // Create new file
                    const croppedFile = new File([blob], file.name, {
                        type: file.type,
                        lastModified: Date.now()
                    });
                    // Mark as cropped to prevent infinite loop
                    croppedFile.isCropped = true;

                    // Set files of input
                    const container = new DataTransfer();
                    container.items.add(croppedFile);
                    fileInput.files = container.files;

                    // Update preview image if provided
                    if (previewImg) {
                        previewImg.src = URL.createObjectURL(croppedFile);
                        
                        // If there is a parent container hidden, show it
                        const hiddenContainer = previewImg.closest('.hidden');
                        if (hiddenContainer) {
                            hiddenContainer.classList.remove('hidden');
                            hiddenContainer.classList.add('flex');
                        }
                    }

                    // Trigger callback
                    if (options.onCropSuccess) {
                        options.onCropSuccess(croppedFile);
                    }

                    isCancelled = false; // Mark as saved so we don't reset input value
                    modal.classList.add('hidden');
                    activeCropper.destroy();
                    activeCropper = null;
                }, file.type);
            };
        });
    };
})();
