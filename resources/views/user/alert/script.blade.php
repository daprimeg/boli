<script>
// popup images 
let currentImageIndex = 0;
let imageList = [];
$(document).on('click', '.thumb img', function () {
   
    const thumbContainer = $(this).closest('.extra-images');
    imageList = thumbContainer.find('img').map(function () {
        return $(this).attr('src');
    }).get();


    currentImageIndex = thumbContainer.find('img').index(this);
    $('#previewImage').attr('src', imageList[currentImageIndex]);

    const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    modal.show();
});


$(document).on('click', '.next-img', function () {
    if (imageList.length === 0) return;
    currentImageIndex = (currentImageIndex + 1) % imageList.length;
    $('#previewImage').attr('src', imageList[currentImageIndex]);
});


$(document).on('click', '.prev-img', function () {
    if (imageList.length === 0) return;
    currentImageIndex = (currentImageIndex - 1 + imageList.length) % imageList.length;
    $('#previewImage').attr('src', imageList[currentImageIndex]);
});


// make and model selector

$('#make1').select2({
        placeholder: 'Select Make',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/makes/getMakes') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data.results.map(function (item) {
                        return { id: item.id, text: item.text };
                    })
                };
            }
        }
});

$('#model1').select2({
        placeholder: 'Select Model',
        allowClear: true,
        ajax: {
            url: "{{ url('/admin/masters/models/getModels') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    make_id: $('#make1').val(),
                    search: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data.results.map(function (item) {
                        return { id: item.id, text: item.text };
                    })
                };
            }
        }
});


$('#make1').on('change', function () {
        const makeId = $(this).val();

    
        $('#model1').val(null).trigger('change');

        if (makeId) {
            $('#model1').prop('disabled', false);
        } else {
            $('#model1').prop('disabled', true); 
        }
});

$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    const activeTab = $(e.target).attr('data-bs-target').replace('#', '');
    const selectedLength = $('.entries-length').val();

    let count = activeTab === 'watchlist' 
        ? $('#auction-table tbody tr').length 
        : $('#alert-table tbody tr').length;

    if ($('#' + activeTab + '-table tbody td').text().includes('No vehicles')) count = 0;

    $('#entryCount').text(`Showing ${count} of ${selectedLength} entries`);
});


</script>