//Catagory dropdown
$('#brand_name').change(function(){
   $("#category_name > option").remove();
   var id = $('#brand_name').val();

   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_category_by_brand/" + id,
      success: function(func_data){
         $.each(func_data,function(id,name){
            var opt = $('<option />');
            opt.val(id);
            opt.text(name);
            $('#category_name').append(opt);
         });
      }
   });
});
//Sub Category dropdown
$('#category_name').change(function(){
   $("#sub_category_name > option").remove();
   var id = $('#category_name').val();

   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_sub_category_by_cat/" + id,
      success: function(func_data){
         $.each(func_data,function(id,name){
            var opt = $('<option />');
            opt.val(id);
            opt.text(name);
            $('#sub_category_name').append(opt);
         });
      }
   });
});
//district dropdown
$('#division').change(function(){
   $('.distirict_val').addClass('form-control input-sm');
   $(".distirict_val > option").remove();
   var id = $('#division').val();

   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_district_by_div/" + id,
      success: function(func_data)
      {
         $.each(func_data,function(id,name)
         {
            var opt = $('<option />');
            opt.val(id);
            opt.text(name);
            $('.distirict_val').append(opt);
         });
      }
   });
});

// Upazila / Thana dropdown
$('#district').change(function(){
   $('.upazila_thana_val').addClass('form-control input-sm');
   $(".upazila_thana_val > option").remove();
   var dis_id = $('#district').val();

   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_upa_tha_by_dis/" + dis_id,
      success: function(upazilaThanas)
      {
         $.each(upazilaThanas,function(id,ut_name)
         {
            var opt = $('<option />');
            opt.val(id);
            opt.text(ut_name);
            $('.upazila_thana_val').append(opt);
         });
      }
   });
});

// Sub Reg. and Mouza Dropdown
$('#upazila_thana').change(function(){
   var upa_id = $('#upazila_thana').val();

   // Sub Register
   $('.sub_reg_val').addClass('form-control input-sm');
   $(".sub_reg_val > option").remove();
   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_sub_reg_by_upa_id/" + upa_id,
      success: function(res)
      {
         $.each(res,function(id,text)
         {
            var opt = $('<option />');
            opt.val(id);
            opt.text(text);
            $('.sub_reg_val').append(opt);
         });
      }
   });

   // Mouza
   $('.mouza_val').addClass('form-control input-sm');
   $(".mouza_val > option").remove();
   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_mouza_by_upa_id/" + upa_id,
      success: function(res)
      {
         $.each(res,function(id,text)
         {
            var opt = $('<option />');
            opt.val(id);
            opt.text(text);
            $('.mouza_val').append(opt);
         });
      }
   });

});

//rack dropdown by kaoser
$('#archive').change(function(){
   $('.rack_val').addClass('form-control input-sm');
   $(".rack_val > option").remove();
   var id = $('#archive').val();
   // alert(id);
   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_rack_by_archive/" + id,
      success: function(func_data)
      {
         $.each(func_data,function(id,name)
         {
            var opt = $('<option />');
            opt.val(id);
            opt.text(name);
            $('.rack_val').append(opt);
         });
      }
   });
});


// Ajax File Upload Funciton
function fileUploadAjax(id) {
   //alert(id)
   var property_dir = $('#last_insert_property_id').val();
   var file_data = $('#file_'+id).prop('files')[0];
   var form_data = new FormData();
   form_data.append('file_title', file_data);         

   $.ajax({
      type: 'post',
      url: hostname + 'property/file_upload/'+id+'/'+property_dir, // point to server-side controller method
      contentType: 'application/json',
      dataType: 'json', // what to expect back from the server
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
         // console.log(response.data);         
         $('#msg'+id).html(response.data); // display success response from the server
         if(response.status){
            $('#progress'+id).show();
         }
      },
      error: function (response) {
         // $('#msg').html(response); // display error response from the server
      },
      xhr: function() {
         var xhr = new window.XMLHttpRequest();
         xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
               var percentComplete = evt.loaded / evt.total;
               percentComplete = parseInt(percentComplete * 100);
               $('.progress-bar').css('width',percentComplete+"%");
               $('.progress-bar').html(percentComplete+"%");
               if (percentComplete === 100) {

               }
            }
         }, false);
         return xhr;
      }
   });
}

$('#upi_info').change(function(){
   $("#project_name").empty();
   $("#type_name").empty();
   $("#status_name").empty();
   $("#deed_no").empty();
   $("#deed_date").empty();
   $("#div_name").empty();
   $("#dis_name").empty();
   $("#upa_name").empty();
   $("#qrcode").empty();

   $("#owner_row").empty();
   $("#kd_size").empty();
   var id = $('#upi_info').val();

   $.ajax({
      type: "POST",
      url: hostname +"common/ajax_get_property_by_upi/" + id,
      dataType: 'json',
      success: function(func_data){
         $.each(func_data,function(name,value){
            $("#"+name).append(value);
         });
      }
   });
});

function land_area_check(rowid){
   var total_size = parseFloat($('#total_size_' + rowid).val());
   var sale_size = parseFloat($('#sale_size_' + rowid).val());

   if(total_size < sale_size){
      alert('Sale Size is excess to Total Size.');
      $('#sale_size_' + rowid).val('');
      return;
   }
}

/*function check_confirm(){
   var upi = $("#upi_info").val();
   if(upi == ''){
      alert('Please select the Property (UPI)');
      return;
   }

   return confirm('Are you sure you want to Sale this Property?');
}*/
