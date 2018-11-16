$(document).ready(function(){


  //Pode melhorar muito esse código aqui. DEPOIS VER ISSO.
  //Resolver problema de duplicação de dados.
  (function poll(){
    setTimeout(function(){
      $.ajax({ type: "GET", url: "functions/getAllMessages.php", success: function(response){
	       $("#dados").html("");
        var tam = response.length;
        console.log(response);

        for(var i = 0; i < tam; i++){
          var id = response[i].id;
          var message = response[i].message;
          var date = response[i].date;
          var issuer = response[i].issuer;
          var image = response[i].image;
          var campi = response[i].campi;
          var p = document.createElement("p");
          var card;

          if(i % 2 == 0 && image == null || image == ""){
            card = centralizedTextCard(issuer, message, date, campi);
          }else {
            card = cardWithLeftText(issuer, message, date, image, campi);
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
    var data2 = new FormData(this);
    console.log(data);
    $.ajax({
      type: 'POST',
      url: 'functions/saveMessage.php',
      async: true,
      data: data2,
      processData: false,
      contentType: false,
      success: function(response){
            console.log(JSON.stringify(data));
            $('#resposta').html(response);
            clearFields();
      },
      error: function(response){
	    	$('#opa').html(response);
        clearFields();
	    }
    });

    e.preventDefault();
  });
});


function clearFields(){
  $("#newMessage input").val("");
  $("#msg").val("");
  $("#resposta").html("");
}


function centralizedTextCard(issuer, message, date, campi){
    var cardDiv = document.createElement("div");
    var cardBody = document.createElement("div");
    var cardTitle = document.createElement("h4");
    var cardMessage = document.createElement("p");
    var cardText = document.createElement("p");
    var textMuted = document.createElement("small");
    var cardCampus = document.createElement("small");

    $(cardDiv).attr("class", "card text-center");
    $(cardBody).attr("class", "card-body");
    $(cardTitle).attr("class", "card-title");
    $(cardText).attr("class", "card-text");
    $(textMuted).attr("class", "text-muted");
    $(cardCampus).attr("class", "text-muted");

    $(cardTitle).html(issuer);
    $(cardMessage).html(message);
    $(textMuted).html(date);
    $(cardCampus).html(campi+" - ");

    cardDiv.appendChild(cardBody);
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardMessage);
    cardBody.appendChild(cardText);
    cardText.appendChild(cardCampus);
    cardText.appendChild(textMuted);
    return cardDiv;
}


function cardWithLeftText(issuer, message, date, image, campi){
    var cardDiv = document.createElement("div");
    var cardBody = document.createElement("div");
    var cardTitle = document.createElement("h4");
    var cardMessage = document.createElement("p");
    var cardText = document.createElement("p");
    var cardCampus = document.createElement("small");
    var textMuted = document.createElement("small");

    $(cardDiv).attr("class", "card");
    $(cardBody).attr("class", "card-body");
    $(cardTitle).attr("class", "card-title");
    $(cardMessage).attr("class", "card-text");
    $(cardText).attr("class", "card-text");
    $(textMuted).attr("class", "text-muted");
    $(cardCampus).attr("class", "text-muted");

    $(cardTitle).html(issuer);
    $(cardMessage).html(message);
    $(textMuted).html(date);
    $(cardCampus).html(campi+" - ");

    if(image != null){
      var cardImage = document.createElement("img");
      $(cardImage).attr("class", "card-img-top img-fluid");
      $(cardImage).attr("src", "uploads/"+image);
      cardDiv.appendChild(cardImage);
    }

    cardDiv.appendChild(cardBody);
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardMessage);
    cardBody.appendChild(cardText);
    cardText.appendChild(cardCampus);
    cardText.appendChild(textMuted);

    return cardDiv;
}
