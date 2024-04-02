//datatable
	// $(document).ready(function(){
	//     $("#example1").DataTable({
	//       "paging": true,
	//       "lengthChange": true,
	//       "searching": true,
	//       "ordering": true,
	//       "info": true,
	//       "autoWidth": true,
	//     });
	// })

	// $(document).ready(function () {
	// 	$('#example2').DataTable({
	// 		order: [[1, 'desc']],
	// 	});
	// });

$('.delete').on('click',function(e){
	e.preventDefault();
	var link = $(this).attr('href');
	swal.fire({
		title: "هل تريد استمرار عملية الحذف ؟ ",
		type: "warning",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "نعم!",
		cancelButtonText: "لا!",
	}).then(function(res){
		if (res.isDismissed) {
			e.preventDefault();
        }else{
			window.location.href = link;
		}
		
	 });
})

//loading
$('.real_content').css('display','none')
$('.loading').css('display','block')
$(document).ready(function(){
	$('.real_content').css('display','block')
	$('.loading').css('display','none')
})

//toast
  // toastr.options.closeMethod = 'slideUp';
  // toastr.options.timeOut = 90000;
  // toastr.options.extendedTimeOut = 90000;
  // toastr.options.closeEasing = 'swing';

