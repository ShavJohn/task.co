let statusBar  = document.querySelectorAll('#status');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.status').change(function(){
    var id = $(this).value;
    $.ajax({
       url : '{{ route("tasks.status") }}',
       data: {
         "_token": "{{ csrf_token() }}",
         "id": id
         },
       type: 'post',
       dataType: 'json',
       success: function()
       {
            alert('Status Changed')
       },
       error: function()
      {
          //handle errors
          alert('error...');
      }
    });
 });
