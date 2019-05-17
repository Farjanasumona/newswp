$(document).ready(function(){
  $("#myform").submit(function(){
    var search = $("#books").val();
    var key="&APPID=AIzaSyCPpXzHEqqpa0W4-UDH3tMIEtnSRduvtkA";
    if(search == '')
    {
      alert("Please enter something in the field first");
    }
    else {
      var url = '';
      var img = '';
      var title = '';
      var author = '';

      $.getJSON("https://www.googleapis.com/books/v1/volumes?q=" + search + key,function(response){
    //  https://www.googleapis.com/books/v1/volumes?q=php&APPID=AIzaSyCPpXzHEqqpa0W4-UDH3tMIEtnSRduvtkA
      //$.get("https://www.googleapis.com/books/v1/volumes?q=php&APPID=AIzaSyCPpXzHEqqpa0W4-UDH3tMIEtnSRduvtkA",function(response){

        for (i=0; i<response.items.length; i++) {
         title=$('<h5 class="center-align black-text">' + response.items[i].volumeInfo.title + '</h5>');
         author=$('<h5 class="center-align black-text">' + response.items[i].volumeInfo.authors + '</h5>');
        img = $('<img class="aligning card z-depth-5" id="dynamic"><br><a href=' + response.items[i].volumeInfo.infoLink + '<button id="imagebutton" class="btn red aligning">Read More</button></a>');
         url= response.items[i].volumeInfo.imageLinks.thumbnail;
        img.attr('src',url);
        title.appendTo("#result");
        author.appendTo("#result");
        img.appendTo("#result");
       }

      });
    }
  });
  return false;
});
