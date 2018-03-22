function sendAlert(num)
{
	var alertElt = document.getElementById("message");
	var para = document.createElement('P');
	var msg;
	switch(num)
	{
		case 1 :
			msg = 'Le nouveau billet a bien été créé';
			break;
		case 2 :
			msg = 'Le billet a bien été supprimé';
			break;
		case 3 :
			msg = 'Votre commentaire a bien été ajouté';
			break;
		case 4 :
			msg = 'Le billet a bien été modifié';
		default :
			msg = 'Opération inconnue';
	}
	para.innerHTML = msg;
	alertElt.style.display = 'block';
	alertElt.appendChild(para);

	setTimeout(function () {
            alertElt.style.display = 'none';
        }, 2000);
}
