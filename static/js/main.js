var page = 0;

$(document).ready(function(){
    getData();

  $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
        page += 1;
        getData();
      }
  });

  $("#fechar").click(function(){
    clearFields();
  });

  $("#cancelar").click(function(){
    clearFields();
  });

  $("#uploadedImage").change(function(){
		var reader = new FileReader();
		reader.readAsDataURL($("#uploadedImage")[0].files[0]);

		reader.onload = function(event){
      $("#uploadedPreview").attr('class', 'rounded float-right');
			$("#uploadedPreview").attr('src', event.target.result);
		};

	});


  $('#newMessage').submit(function (e){

    var data2 = new FormData(this);
    $.ajax({
      type: 'POST',
      url: 'functions/saveMessage.php',
      async: true,
      data: data2,
      processData: false,
      contentType: false,
      success: function(response){
          showMessage("Obrigado por contribuir!!!", "text-left text-success font-weight-bold");
      },
      error: function(response){
  	    	showMessage("Ooops, ocorreu um erro. Tente novamente", "text-warning font-weight-bold");
	    }
    });

    e.preventDefault();
  });
});


function clearFields(){
  $("#resposta").html("");
  $("#newMessage input").val("");
  $("#msg").val("");
}

function showMessage(mensagem, classe){
    $("#resposta").attr('class', classe);
    $("#resposta").html(mensagem);
}

function getData(){

    $.ajax({
        type: 'POST',
        url: 'functions/getAllMessages.php',
        data: 'page='+page,
        cache: false,
        success: function(response){
            displayData(response);
        },
        error:function(response){
          console.log("Erro aqui");
        }
    });
}

function displayData(response){
  var tam = response.length;
  console.log(response);
  if(tam > 0){
  for(var i = 0; i < tam; i++){
    var id = response[i].id;
    var message = response[i].message;
    var date = response[i].date;
    var issuer = response[i].issuer;
    var image = response[i].image;
    var campi = response[i].campi;
    var card;

    if(i % 2 == 0 && image == null || image == ""){
      card = centralizedTextCard(issuer, message, date, campi);
    }else {
      card = cardWithLeftText(issuer, message, date, image, campi);
    }

    $("#dados").append(card);
  }
}else{
    $("#fimConteudo").html("Ooops, não há mais postagens");
}
}


function centralizedTextCard(issuer, message, date, campi){
    var cardDiv = document.createElement("div");
    var cardBody = document.createElement("div");
    var cardTitle = document.createElement("h4");
    var cardMessage = document.createElement("p");
    var cardText = document.createElement("p");
    var textMuted = document.createElement("small");
    var cardCampus = document.createElement("small");

    $(cardDiv).attr("class", "card text-center shadow p-3 mb-5 bg-white rounded");
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

    $(cardDiv).attr("class", "card shadow p-3 mb-5 bg-white rounded");
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
