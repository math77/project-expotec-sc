$(document).ready(function(){
  //getPosts();

  //Pode melhorar muito esse código aqui. DEPOIS VER ISSO.
  //Resolver problema de duplicação de dados.
  (function poll(){
    setTimeout(function(){
      $.ajax({ type: "GET", url: "http://localhost/project-expotec/functions/getAllMessages.php", success: function(response){

        var tam = response.length;

        for(var i = 0; i < tam; i++){
          var id = response[i].id;
          var message = response[i].message;
          var date = response[i].date;
          var issuer = response[i].issuer;
          var p = document.createElement("p");
          var card = "<div class='col-auto mb-3>'"+
          "<div class='card' style='width: 18rem;'>"+
          "<div class='card-body'>"+
          "<h5 class='card-title'>"+issuer+"</h5>"+
          "<h6 class='card-subtitle mb-2 text-muted'>"+date+"</h6>"+
          "<p class='card-text'>"+message+"</p>"+
          "</div></div></div>";
          p.innerHTML = message;
          $(".row").append(card);
        }

        poll();
      }, dataType: "json"});
    }, 30000);
  })();

  $('#newMessage').submit(function (e){

    var data = $('#newMessage').serialize();
    console.log(data);
    $.ajax({
      type: 'POST',
      url: 'http://localhost/project-expotec/functions/saveMessage.php',
      async: true,
      data: data,
      success: function(response){
            console.log(JSON.stringify(data));
            $('#resposta').html(response);
            clearFields();
      },
      error: function(){
	    	$('#opa').html("error!");
        clearFields();
	    }
    });

    e.preventDefault();
  });
});


function clearFields(){
  $("#newMessage input").val("");
  $("#msg").val("");
}

/*
function getPosts(){

  $.ajax({
	    type: 'GET',
	    url: "http://localhost/project-expotec/functions/getAllMessages.php",
	    dataType: 'json',
	    success: function(response){
	    	console.log(response);
        var tam = response.length;

        for(var i = 0; i < tam; i++){
          var id = response[i].id;
          var message = response[i].message;
          var date = response[i].date;
          var issuer = response[i].issuer;
          var p = document.createElement("p");
          var card = "<div class='col-auto mb-3>'"+
          "<div class='card' style='width: 18rem;'>"+
          "<div class='card-body'>"+
          "<h5 class='card-title'>"+issuer+"</h5>"+
          "<h6 class='card-subtitle mb-2 text-muted'>"+date+"</h6>"+
          "<p class='card-text'>"+message+"</p>"+
          "</div></div></div>";
          p.innerHTML = message;
          $(".row").append(card);
        }

	    },
	    error: function(){
	    	$('#opa').html("error!");
	    }
	});
}
*/
