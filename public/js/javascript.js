// cacher le message  après 5 secondes
function supprimerMessage()
{
	setTimeout(function(){$('#message').css("display","none")}, 5000);
}

supprimerMessage(); 

