document.querySelector("html").classList.add('js2');

var fileInput2  = document.querySelector( ".input-file-deceased" ),  
    button2     = document.querySelector( ".input-file-trigger-deceased" ),
    the_return2 = document.querySelector(".file-return-deceased");
      
button2.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput2.focus();  
    }  
});
button2.addEventListener( "click", function( event ) {
   fileInput2.focus();
   return false;
});  
fileInput2.addEventListener( "change", function( event ) {  
    the_return2.innerHTML = this.value;  
}); 
