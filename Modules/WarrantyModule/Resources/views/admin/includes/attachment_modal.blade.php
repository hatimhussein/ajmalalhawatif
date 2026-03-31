<style>
    #attachment_modal .modal-content {
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    }
    
    #attachment_modal .modal-header {
        border-radius: 15px 15px 0 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    #attachment_modal .custom-file-container__image-preview img {
        transition: transform 0.3s ease;
    }
    
    #attachment_modal .custom-file-container__image-preview img:hover {
        transform: scale(1.02);
    }
    
    #attachment_modal label.text-primary {
        font-size: 16px;
        color: #667eea !important;
        margin-bottom: 10px;
    }
</style>

<div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"
                    id="exampleModalLongTitle">
                    <i class="flaticon-attachment"></i> 
                    {{ __('warrantymodule::insurance.attachments') }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <div id="modal-attachments-box" class="row">
                    <!-- المرفقات سيتم إضافتها هنا ديناميكياً -->
                </div>
            </div>
        </div>
    </div>
</div>

@prepend('js_scripts')
    <script type="text/javascript">
        function showAttachments(attachments) {
            const attachmentsArr = attachments.split(',');
            const labels = [
                'صورة الجهاز من الأمام بعد التركيب',
                'صورة الرقم التسلسلي الموجود على المنتج (البكج)',
                'صورة إضافية'
            ];
            
            $('#modal-attachments-box').html('');
            
            attachmentsArr.forEach((media, i) => {
                console.log(`i => ${i}`, `media => ${media}`)
                if (media.length && media.trim() !== '') {
                    const label = labels[i] || `مرفق ${i + 1}`;
                    
                    if (is_vid(media)) {
                        $('#modal-attachments-box').append(`
                        <div class="col-lg-12 mb-4">
                            <label class="text-primary font-weight-bold mb-2">
                                <i class="flaticon-video"></i> ${label}
                            </label>
                            <div class="custom-file-container__image-preview product-list-img" style="border: 2px solid #e0e6ed; border-radius: 8px; padding: 10px;">
                                <video controls style="width: 100%; max-height: 400px;">
                                    <source src="{{asset('images/warranty')}}/${media}" type="video/mp4">
                                    <source src="{{asset('images/warranty')}}/${media}" type="video/quicktime">
                                    متصفحك لا يدعم عرض الفيديو.
                                </video>
                            </div>
                        </div>`);
                    } else {
                        $('#modal-attachments-box').append(`
                        <div class="col-lg-6 mb-4">
                            <label class="text-primary font-weight-bold mb-2">
                                <i class="flaticon-image"></i> ${label}
                            </label>
                            <div class="custom-file-container__image-preview product-list-img" style="border: 2px solid #e0e6ed; border-radius: 8px; padding: 10px; background: #f1f2f3;">
                                <a href="{{asset('images/warranty')}}/${media}" target="_blank">
                                    <img src="{{asset('images/warranty')}}/${media}" style="width: 100%; height: auto; border-radius: 4px;" alt="${label}"/>
                                </a>
                            </div>
                        </div>`);
                    }
                }
            });
            
            if ($('#modal-attachments-box').html().trim() === '') {
                $('#modal-attachments-box').html(`
                    <div class="col-12 text-center">
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
