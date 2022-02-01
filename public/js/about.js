function faqAnimation(clickedID) {
  //console.log(clickedID);
  document.querySelector("#" + clickedID + " .q-bottom").classList.toggle("active");
  document.querySelector("#" + clickedID + " .q-right").classList.toggle("active");
}


$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 500, function(){
        window.location.hash = hash;
      });
    }
  });
});
