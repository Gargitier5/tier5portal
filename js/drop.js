$(document).ready(function() {
  $(".chatboxcontent").on('dragenter', function (e){
  e.preventDefault();
  $(this).css('background', '#BBD5B8');
  });

  $(".chatboxcontent").on('dragover', function (e){
  e.preventDefault();
  });

  $(".chatboxcontent").on('drop', function (e){
  $(this).css('background', '#D8F9D3');
  e.preventDefault();
  var image = e.originalEvent.dataTransfer.files;
  //createFormData(image);
 $('.chatboxcontent').append(image);
  });
});