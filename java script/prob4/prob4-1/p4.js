function sort() {
	var table, rows, switching, i, x, y, shouldSwitch, dir, count = 0;
    table = document.getElementById("tabel");
	switching = true;
    dir = "asc";
    while (switching) {
		switching = false;
        rows = table.getElementsByTagName("tr");
        for (i = 1; i < (rows.length - 1); i++) {
			shouldSwitch = false;
			x = rows[i].getElementsByTagName("td")[0];
			y = rows[i + 1].getElementsByTagName("td")[0];
			if (dir == "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					shouldSwitch = true;
					break;
				}
			} else if (dir == "desc") {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
					shouldSwitch = true;
					break;
				}
			}
		}
		if (shouldSwitch) {
			rows[i].parentNode.insertBefore(rows[i+1], rows[i]);
            switching = true;
            count++;
		} else {
			if (count == 0 && dir == "asc"){
				dir = "desc";
                switching = true;
			}
		}
	}
}

function sortare(by) {
	var table, rows, switching, i, x, y, shouldSwitch, dir, count = 0;
    table = document.getElementById("tabel");
	switching = true;
    dir = "asc";
    while (switching) {
		switching = false;
        rows = table.getElementsByTagName("tr");
        for (i = 1; i < (rows.length - 1); i++) {
			shouldSwitch = false;
			x = rows[i].getElementsByTagName("td")[by];
			y = rows[i + 1].getElementsByTagName("td")[by];
			if (dir == "asc") {
				if (Number(x.innerHTML) > Number(y.innerHTML)) {
					shouldSwitch = true;
					break;
				}
			} else if (dir == "desc") {
				if (Number(x.innerHTML) < Number(y.innerHTML)) {
					shouldSwitch = true;
					break;
				}
			}
		}
		if (shouldSwitch) {
			rows[i].parentNode.insertBefore(rows[i+1], rows[i]);
            switching = true;
            count++;
		} else {
			if (count == 0 && dir == "asc"){
				dir = "desc";
                switching = true;
			}
		}
	}
}