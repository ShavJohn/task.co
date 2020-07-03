let statusBar  = document.querySelectorAll('#status');

$('.status').change(function(){
    var id = $(this).value;
    $.ajax({
       url : '{{ route( "/status/{id}" ) }}',
       data: {
         "_token": "{{ csrf_token() }}",
         "id": id
         },
       type: 'post',
       dataType: 'json',
       success: function()
       {
            alert('Changed')
       },
       error: function()
      {
          //handle errors
          alert('error...');
      }
    });
 });
