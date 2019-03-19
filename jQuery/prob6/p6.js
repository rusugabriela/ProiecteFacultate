var emptyCell = 16;
var complete = false;

function loadPuzzle() {
    for (var i = 1; i < 16; i++) {
        $('#'+i.toString()).text(i.toString());
    }
    var shuffles = 1000;
    var interval = setInterval(function () {
        if (shuffles === 0) {
            clearInterval(interval);
            return;
        }
        shuffles--;
        randomKeyPress();
    }, 5)
}

function randomKeyPress() {
    keyPress(Math.floor(Math.random() * 4) + 37);
}

function checkComplete() {
    for (var i = 1; i < 16; i++) {
        if ($("td").eq(i - 1).text() !== i.toString()) {
            return false;
        }
    }
    return true;
}

function move(cellID, cell) {
    var oldText = cell.text();
    cell.text($('#' + emptyCell).text());
    $('#' + emptyCell).text(oldText);
    emptyCell = cellID;
}

function keyPress(keyCode) {
    switch (keyCode) {
        case 37://left
            if (emptyCell % 4 === 0) {
                return;
            }
            move(emptyCell + 1, $('#' + (emptyCell + 1)));
            return;
        case 38://up
            if (emptyCell > 12) {
                return;
            }
            move(emptyCell + 4, $('#' + (emptyCell + 4)));
            return;
        case 39://right
            if (emptyCell % 4 === 1) {
                return;
            }
            move(emptyCell - 1, $('#' + (emptyCell - 1)));
            return;
        case 40://down
            if (emptyCell <= 4) {
                return;
            }
            move(emptyCell - 4, $('#' + (emptyCell - 4)));
            return;
    }
}

$(document).on("keydown", function (e) {
    if (complete) {
        return;
    }

    keyPress(e.keyCode);

    if (checkComplete()) {
        setTimeout(function () {
            alert("Good job");
        }, 100);
        complete = true;
    }
});