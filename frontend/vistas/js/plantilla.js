var rutaOculta = $('#rutaOculta').val();

// MIGAS DE PAN

let pagActiva = $(".pagActiva").html();

if (pagActiva ) {
  if (pagActiva != null) {
	let regPagActiva = pagActiva.replace(/-/g, " ");
	$(".pagActiva").html(regPagActiva);
  }
}