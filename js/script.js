$(document).ready(function() {
	// hilangkan tombol cari
	$('#search-button').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		$('.loader').show();

		// // ajax menggunakan load
		// $('#container').load('ajax/perpustakaan.php?keyword=' + $('#keyword').val());

		// $.get()
		$.get('ajax/perpustakaan.php?keyword=' + $('#keyword').val(), function(data) {
			$('#container').html(data);
			$('.loader').hide();
		});
	});
});