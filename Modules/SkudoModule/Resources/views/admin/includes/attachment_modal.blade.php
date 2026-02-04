<style>
    #attachment_modal .modal-content {
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    #attachment_modal .modal-header {
        background-color: #1b55e2;
        color: white;
        border-bottom: 1px solid #dee2e6;
    }
    
    #attachment_modal .modal-body {
        padding: 20px;
    }
    
    #attachment_modal .custom-file-container__image-preview {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 10px;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50%;
    }
    
    #attachment_modal .custom-file-container__image-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }
    
    #attachment_modal label {
        font-size: 14px;
        font-weight: 600;
        color: #3b3f5c;
        margin-bottom: 8px;
        display: block;
    }
    
    #attachment_modal .product-list-img {
        height: auto !important;
        width: 100% !important;
    }
</style>

<div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <i class="flaticon-attachment"></i> 
                    {{ __('warrantymodule::insurance.attachments') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-attachments-box" class="row">
                    <!-- المرفقات سيتم إضافتها هنا ديناميكياً -->
                </div>
            </div>
        </div>
    </div>
</div>

@prepend('js_scripts')
    <script type="text/javascript">
        function showAttachments(attachments, invoiceMedia = '') {
            const WARRANTY_BASE = "{{ asset('images/warranty') }}";
            const WARRANTY_BASE_SLASH = WARRANTY_BASE.endsWith('/') ? WARRANTY_BASE : WARRANTY_BASE + '/';
            const attachmentsArr = (attachments || '').split(',');
            const NOT_AVAILABLE = "{{ __('skudomodule::insurance.image_not_available') }}";
            const labels = [
                'صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)',
                'صورة الجهاز من الخلف',
                'صورة الرقم التسلسلي الموجود على المنتج (لبكج)',
                'صورة الفاتورة'
            ];
            
            $('#modal-attachments-box').html('');

            // Always render 4 slots in consistent order (even if missing)
            for (let i = 0; i < 4; i++) {
                const label = labels[i] || `مرفق ${i + 1}`;
                const media = (attachmentsArr[i] || '').trim();

                if (!media) {
                    $('#modal-attachments-box').append(`
                        <div class="col-lg-6 mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <div class="text-muted text-center" style="width:100%;">${NOT_AVAILABLE}</div>
                            </div>
                        </div>`);
                    continue;
                }

                if (is_vid(media)) {
                    $('#modal-attachments-box').append(`
                        <div class="col-lg-6 mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <video controls style="width: 100%; max-height: 300px;">
                                    <source src="${WARRANTY_BASE_SLASH}${media}" type="video/mp4">
                                    <source src="${WARRANTY_BASE_SLASH}${media}" type="video/quicktime">
                                    متصفحك لا يدعم عرض الفيديو.
                                </video>
                            </div>
                        </div>`);
                } else {
                    $('#modal-attachments-box').append(`
                        <div class="col-lg-6 mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <a href="${WARRANTY_BASE_SLASH}${media}" target="_blank">
                                    <img src="${WARRANTY_BASE_SLASH}${media}" alt="${label}"/>
                                </a>
                            </div>
                        </div>`);
                }
            }
            
            // Append invoice image if provided separately and not already included
            if (invoiceMedia && typeof invoiceMedia === 'string') {
                const alreadyIncluded = attachmentsArr.includes(invoiceMedia);
                if (!alreadyIncluded) {
                    const media = invoiceMedia.trim();
                    if (media) {
                        const label = 'صورة الفاتورة';
                        if (is_vid(media)) {
                            $('#modal-attachments-box').append(`
                            <div class="col-lg-6 mb-3">
                                <label>${label}</label>
                                <div class="custom-file-container__image-preview product-list-img">
                                    <video controls style="width: 100%; max-height: 300px;">
                                        <source src="${WARRANTY_BASE_SLASH}${media}" type="video/mp4">
                                        <source src="${WARRANTY_BASE_SLASH}${media}" type="video/quicktime">
                                        متصفحك لا يدعم عرض الفيديو.
                                    </video>
                                </div>
                            </div>`);
                        } else {
                            $('#modal-attachments-box').append(`
                            <div class="col-lg-6 mb-3">
                                <label>${label}</label>
                                <div class="custom-file-container__image-preview product-list-img">
                                    <a href="${WARRANTY_BASE_SLASH}${media}" target="_blank">
                                        <img src="${WARRANTY_BASE_SLASH}${media}" alt="${label}"/>
                                    </a>
                                </div>
                            </div>`);
                        }
                    }
                }
            }
            
            if ($('#modal-attachments-box').html().trim() === '') {
                $('#modal-attachments-box').html(`
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info">
                            <i class="flaticon-information"></i>
                            لا توجد مرفقات متاحة
                        </div>
                    </div>
                `);
            }

            $('#attachment_modal').modal('show');
        }

        // Warranty claim attachments:
        // Row 1: broken device image (uploaded by client)
        // Row 2: 4 insurance registration images (same order as client insurance UI)
        function showWarrantyAttachments(brokenMedia = '', insuranceAttachments = '') {
            const WARRANTY_BASE = "{{ asset('images/warranty') }}";
            const WARRANTY_BASE_SLASH = WARRANTY_BASE.endsWith('/') ? WARRANTY_BASE : WARRANTY_BASE + '/';
            const NOT_AVAILABLE = "{{ __('skudomodule::warranty.image_not_available') }}";

            $('#modal-attachments-box').html('');

            const renderMediaBlock = (media, label, colClass = 'col-lg-6') => {
                media = (media || '').toString().trim();

                if (!media) {
                    $('#modal-attachments-box').append(`
                        <div class="${colClass} mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <div class="text-muted text-center" style="width:100%;">${NOT_AVAILABLE}</div>
                            </div>
                        </div>`);
                    return;
                }

                if (is_vid(media)) {
                    $('#modal-attachments-box').append(`
                        <div class="${colClass} mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <video controls style="width: 100%; max-height: 300px;">
                                    <source src="${WARRANTY_BASE_SLASH}${media}" type="video/mp4">
                                    <source src="${WARRANTY_BASE_SLASH}${media}" type="video/quicktime">
                                    متصفحك لا يدعم عرض الفيديو.
                                </video>
                            </div>
                        </div>`);
                } else {
                    $('#modal-attachments-box').append(`
                        <div class="${colClass} mb-3">
                            <label>${label}</label>
                            <div class="custom-file-container__image-preview product-list-img">
                                <a href="${WARRANTY_BASE_SLASH}${media}" target="_blank">
                                    <img src="${WARRANTY_BASE_SLASH}${media}" alt="${label}"/>
                                </a>
                            </div>
                        </div>`);
                }
            };

            // Row 1: broken device image
            renderMediaBlock(brokenMedia, 'صورة الجهاز المكسور', 'col-12');
            $('#modal-attachments-box').append('<div class="w-100"></div>');

            // Row 2: insurance images (4)
            const insuranceArr = (insuranceAttachments || '').split(',').map(s => s.trim()).filter(Boolean);
            const insuranceLabels = [
                'صورة الجهاز من الأمام بعد التركيب (تُظهر الرقم التسلسلي)',
                'صورة الجهاز من الخلف',
                'صورة الرقم التسلسلي الموجود على المنتج (لبكج)',
                'صورة الفاتورة'
            ];
            for (let i = 0; i < 4; i++) {
                renderMediaBlock(insuranceArr[i] || '', insuranceLabels[i] || `مرفق ${i + 1}`, 'col-lg-3');
            }

            if ($('#modal-attachments-box').html().trim() === '') {
                $('#modal-attachments-box').html(`
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info">
                            <i class="flaticon-information"></i>
                            لا توجد مرفقات متاحة
                        </div>
                    </div>
                `);
            }

            $('#attachment_modal').modal('show');
        }

        function is_vid(media) {
            const vid_extensions = ['mp4', 'mov'];
            const arr = media.split('.');
            const ext = arr[arr.length - 1].toLowerCase();
            return (vid_extensions.includes(ext));
        }
    </script>
@endprepend
