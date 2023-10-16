(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown();
    $('.modal').modal();
    $('input#input_text, textarea#textareaComment').characterCounter();
    $('input#input_text, textarea#textareaDescription').characterCounter();
    $('.collapsible').collapsible();
    $('select').formSelect();

  }); // end of document ready
})(jQuery); // end of jQuery name space
