<div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog" aria-labelledby="attachmentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLongTitle">{{ __('warrantymodule::insurance.attachments') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-attachments-box" class="row">
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@prepend('js_scripts')
    <script type="text/javascript">
        function showAttachments(attachments) {
            const attachmentsArr = attachments.split(',');
            $('#modal-attachments-box').html('');
            attachmentsArr.forEach((media, i) => {
                console.log(`i => ${i}`, `media => ${media}`)
                if (media.length) {
                    if (is_vid(media)) {
                        $('#modal-attachments-box').append(`
                        <div class="col-lg-4">
                            <div class="custom-file-container__image-preview product-list-img">
                                <video controls>
                                    <source src="{{asset('images/warranty')}}/${media}" type="video/mp4">
                                    <source src="{{asset('images/warranty')}}/${media}" type="video/quicktime">
                                        Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>`);
                    } else {
                        $('#modal-attachments-box').append(`
                        <div class="col-lg-4">
                            <div class="custom-file-container__image-preview product-list-img">
                                <a href="{{asset('images/warranty')}}/${media}" target="_blank"><img src="{{asset('images/warranty')}}/${media}"/></a>
                            </div>
                        </div>`);
                    }
                }
            });

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
