function sortTable(n, numeric) {
    var switching = true;
    var switchcount = 0;
    var dir = "asc";
    while (switching) {
        switching = false;
        var rows = $("#myTable tr");
        var cols = $("#myTable td");
        for (var i = 0; i < (cols.length / rows.length - 1); i++) {
            var shouldSwitch = false;
            var index = n * cols.length / rows.length + i;
            var a = cols.eq(index).text().toLowerCase();
            var b = cols.eq(index + 1).text().toLowerCase();
            if (numeric) {
                a = parseInt(a);
                b = parseInt(b);
            }
            if ("asc" === dir) {
                if (a > b) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if (a < b) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            for (var j = 0; j < rows.length; j++) {
                var number = j * cols.length / rows.length + i;
                cols.eq(number).before(cols.eq(number+1));
            }
            switching = true;
            switchcount++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}