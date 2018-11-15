$(document).ready(function(){
  //getPosts();

  //Pode melhorar muito esse código aqui. DEPOIS VER ISSO.
  //Resolver problema de duplicação de dados.
  (function poll(){
    setTimeout(function(){
      $.ajax({ type: "GET", url: "http://localhost/project-expotec/functions/getAllMessages.php", success: function(response){
	$("#dados").html("");
        var tam = response.length;

        for(var i = 0; i < tam; i++){
          var id = response[i].id;
          var message = response[i].message;
          var date = response[i].date;
          var issuer = response[i].issuer;
          var p = document.createElement("p");
          var card;

          if(i % 2 == 0){
            card = centralizedTextCard(issuer, message, date);
          }else{
            card = cardWithLeftText(issuer, message, date);
          }

          $("#dados").append(card);
        }



        poll();
      }, dataType: "json"});
    }, 30000);
  })();

  //Manter conexão com server via php.
  $("#uploadedImage").change(function(){
		var reader = new FileReader();
		reader.readAsDataURL($("#uploadedImage")[0].files[0]);

		reader.onload = function(event){
			$("#uploadedPreview").attr('src', event.target.result);
		};

	});

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

function centralizedTextCard(issuer, message, date){
    var card = '<div class="card text-center">'+
        '<div class="card-body">'+
        '<h4 class="card-title">'+issuer+'</h4>'+
        '<p>'+message+'</p>'+
        '<p class="card-text"><small class="text-muted">'+date+'</small></p>'+
        '</div>'+
        '</div>';
    return card;
}

function cardWithLeftText(issuer, message, date){
    var card = '<div class="card">'+
          '<div class="card-body">'+
          '<h4 class="card-title">'+issuer+'</h4>'+
          '<p class="card-text">'+message+'</p>'+
          '<p class="card-text"><small class="text-muted">'+date+'</small></p>'+
          '</div>'+
          '</div>';
    return card;
}

function pictureCard(issuer, message, date, image){
    var card = '<div class="card">'+
          '<img class="card-img-top img-fluid" src="https://img.webnots.com/2017/04/Bootstrap-Card-Image.png" alt="Card Columns 2">'+
          '<div class="card-body">'+
          '<h4 class="card-title">'+issuer+'</h4>'+
          '<p class="card-text">'+message+'</p>'+
          '<p class="card-text"><small class="text-muted">'+date+'</small></p>'+
          '</div>'+
          '</div>';
    return card;
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
