$(document).ready(function () {
    $(function () {
        $("#copy").on("click", function () {
            var ele = $(this).parent().prev().clone(true);
            $(this).before(ele);
        });
    });
});
