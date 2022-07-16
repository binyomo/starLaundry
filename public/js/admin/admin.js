document.querySelector(".nav-logout").addEventListener('click', function(){
	Swal.fire({
	    title: 'Kamu Yakin???',
	    text: "Keluar Dari Akun Ini",
	    icon: 'warning',
	    showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Keluar'
	}).then((result) => {
	  	if (result.isConfirmed) {
	  		$('#logoutform').submit().then(
	  			Swal.fire({
			      	title: 'Logout',
			      	text: 'Kamu Berhasil Keluar',
			      	icon: 'success',
			      	showConfirmButton: false
				})
			)
	  	} else if(result.dismiss){
	  		Swal.fire(
		      'Cancelled',
		      'Kamu Tidak Logout',
		      'error'
		    )
	  	}
	})
});

$('.act-btn').on('click', function (e) {
	e.preventDefault();
	
	Swal.fire({
	    title: 'Kamu Yakin???',
	    text: "Melakukan Aksi Ini",
	    icon: 'warning',
	    showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Lakukan'
	}).then((result) => {
	  	if (result.isConfirmed) {
	  		$(e.target).closest('form').submit()
	  	} else if(result.dismiss){
	  		Swal.fire(
		      'Cancelled',
		      'Aksi Tidak Terjadi',
		      'error'
		    )
	  	}
	})
});

$(document).ready(function() {
      $('.venobox').venobox();
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

