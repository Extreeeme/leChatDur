function message(){
   $.ajax({
      type: "GET",
      url: "messages.php"
   }).done(function(html){
      $('#messages').html(html); // Retourne dans #maDiv le contenu de ta page
   ;
   setTimeout("message();", 5000); // Va rafraichir les données toutes les 5 secondes
});
}