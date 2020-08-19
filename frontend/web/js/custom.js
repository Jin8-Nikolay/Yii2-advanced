$(document).ready(function () {
if ($('.star-list').length>0){
    $('.star-list .radio label').html('<img src="../../images/star-off.png" alt="1" title="bad">');
    $( ".star-list .radio label" ).hover(
        function() {
            let count = $( '.star-list .radio label' ).index( this );
            let items = document.querySelectorAll('.star-list .radio label');
            for ( let i = 0; i < count+1; i++){
                items[i].innerHTML = '<img src=\"../../images/star-on.png\" alt=\"1\" title=\"bad\">';
            }
            // $( this ).html( "<img src=\"../../images/star-on.png\" alt=\"1\" title=\"bad\">" );
        }, function() {
            if (!$('.star-list').hasClass('active')){
                $( this ).html( "<img src=\"../../images/star-off.png\" alt=\"1\" title=\"bad\">" );
            }
        }
    );
    $( ".star-list .radio label" ).click(
        function () {
            $('.star-list .radio label').html('<img src="../../images/star-off.png" alt="1" title="bad">');
            $('.star-list').addClass('active');
            let count = $( '.star-list .radio label' ).index( this );
            let items = document.querySelectorAll('.star-list .radio label');
            for ( let i = 0; i < count+1; i++){
                items[i].innerHTML = '<img src=\"../../images/star-on.png\" alt=\"1\" title=\"bad\">';
            }
        }
    );
}
})
