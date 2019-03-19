function reverse1() {
	sel = document.getElementById("lista1");
	txt = sel.options[sel.selectedIndex].text;
	sel.remove(sel.selectedIndex);
	sel = document.getElementById("lista2");
	sel.options[sel.options.length] = new Option(txt, "");
}

function reverse2() {
	sel = document.getElementById("lista2");
	txt = sel.options[sel.selectedIndex].text;
	sel.remove(sel.selectedIndex);
	sel = document.getElementById("lista1");
	sel.options[sel.options.length] = new Option(txt, "");
}