// select element placehholder font color
jQuery( document ).ready( function($) {
    $( document ).on( 'change', 'select.select-custom', function(){
        select_placeholder();
    } );
} );

function select_placeholder() {
  jQuery( 'select.select-custom' ).each( function(){
    jQuery( this ).removeClass( 'select-placeholder' );
  } );
}

// file upload show filename
jQuery( document ).ready( function($) {
  $( document ).on( 'change', '#image-upload', function(){
    console.log('log');
    var i = $(this).next('label').clone();
    var file = jQuery('#image-upload')[0].files[0].name;
    $(this).next('label').text(file);
  } );
} );


jQuery('input[type-file]').change(function() {
  console.log('log');
  // var i = $(this).prev('label').clone();
  var file = jQuery('#image-upload')[0].files[0].name;
  $(this).prev('label').text(file);
});

function load_more() {
  console.log('works');
  if (jQuery( '.blog-post-card.hidden' ).length > 4) {
    jQuery( '.blog-post-card.hidden:lt(4)' ).each( function() {
      jQuery( this ).removeClass( 'hidden' );
    });
  } else {
    jQuery( '.blog-post-card.hidden' ).each( function() {
      jQuery( this ).removeClass( 'hidden' );
      jQuery ( '.customwptheme-button.show-more' ).addClass( 'hidden' );
      jQuery ( '.customwptheme-button.show-more' ).removeClass( 'customwptheme-button' );
    });
  }
  
}