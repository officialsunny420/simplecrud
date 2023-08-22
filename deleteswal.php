
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

//on deleting
	$(document).on('click', '.delete_row', function(e) {
		e.preventDefault();
		var self = $(this);
		var data_id = $(this).data('id');
		var data = {
			id: data_id
		};
		var data_url = $(this).data('url');
		swal({
				title: "Are you sure to delete?",
				text: "This will not recover!!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						url: data_url,
						type: "POST",
						data: data,
						dataType: "json",
						enctype: 'multipart/form-data',
					}).done(function(resp) {
						if (resp.status == "success") {
							self.parents("tr").remove();
						} else {
							swal("Data not deleted!");
						}
					});
				} else {
					swal("Data not deleted!");
				}
			});
		return false;
	});
	</script>