var toggleOutlet = function(buttonClicked) {
    $.post('toggle.php', {
            outletId: buttonClicked.attr('data-outletId')
        },
        function(data, status) {
            //alert('Outlet toggled!');
        });

};

$(function() {
    $('.toggleOutlet').click(function() {
        toggleOutlet($(this));
    });
});
