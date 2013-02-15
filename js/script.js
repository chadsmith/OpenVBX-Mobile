$(function() {
  $('.message select').change(function() {
    $(this).closest('form').submit();
  });
});
