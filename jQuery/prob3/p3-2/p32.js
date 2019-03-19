$.fn.extend({
    memoryBoard: function () {
        var that = this.eq(0);
        for (var i = 1; i <= 12; i++) {
            that.append($(`<div class="tile" data-id="${i}"></div><div class="tile" data-id="${i}"></div>`));
        }
        that.children()
            .each(function (i, element) {
                $(element).before(that.children().eq(Math.floor(Math.random() * 24)))
            })
            .each(function (i, element) {
                $(element).memoryTile();
            });
    },
    memoryTile: function () {
        var that = this;
        that.click(function () {
            that.flip();
            var flippedTiles = $('.flipped');
            if (flippedTiles.length === 2) {
                if (flippedTiles.eq(0).data('id') === flippedTiles.eq(1).data('id')) {
                    flippedTiles.addClass('guessed');
                    flippedTiles.off('click');
                }
                flippedTiles.unflip();
            }
        });
    },
    flip: function () {
        this.addClass('flipped').css({'background': 'url(img'+this.data('id') +'.jpg', 'background-size': 'cover'});
    },
    unflip: function () {
        var that = this.removeClass('flipped');
        setTimeout(function () {
            that.not('.guessed').text('').css({'background': '#00ced1'})
        }, 600)
    }
});



$('#memory_board').memoryBoard();