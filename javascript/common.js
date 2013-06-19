$(function(){
  /**********************************************
  * History back
  *
  ***********************************************/
  $(".historyback").bind("click", function(){
    history.back();
  })
  /**********************************************
  * Banner Control
  *
  ***********************************************/
  $("#banner-title").bind("click", function(){
    $(".banner").toggle(1000);
  })
});