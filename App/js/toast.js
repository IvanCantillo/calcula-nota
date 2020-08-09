
function toast_s( msg ){
	Swal.fire({
		toast: true,
		position: 'top-end',
		icon: 'success',
		title: msg,
		timerProgressBar: false,
		showConfirmButton: false,
		timer: 2000
	});
}

function toast_e( msg ){
	Swal.fire({
		toast: true,
		position: 'top-end',
		icon: 'error',
		title: msg,
		timerProgressBar: false,
		showConfirmButton: false,
		timer: 2000
	});
}

function toast_w( msg ){
	Swal.fire({
		toast: true,
		position: 'top-end',
		icon: 'warning',
		title: msg,
		timerProgressBar: false,
		showConfirmButton: false,
		timer: 2000
	});
}

function toast_i( msg ){
	Swal.fire({
		toast: true,
		position: 'top-end',
		icon: 'info',
		title: msg,
		timerProgressBar: false,
		showConfirmButton: false,
		timer: 2000
	});
}