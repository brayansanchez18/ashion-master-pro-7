// MIGAS DE PAN

let pagActiva = $(".pagActiva").html();
console.log(pagActiva);

if (pagActiva ) {
  if (pagActiva != null) {
	let regPagActiva = pagActiva.replace(/-/g, " ");
	$(".pagActiva").html(regPagActiva);
  }
}