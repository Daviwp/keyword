<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Busca por palavra-chave</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="style.css" />
<script>

//função para pegar o objeto ajax do navegador
function xmlhttp()
{
	// XMLHttpRequest para firefox e outros navegadores
	if (window.XMLHttpRequest)
	{
		return new XMLHttpRequest();
	}

	// ActiveXObject para navegadores microsoft
	var versao = ['Microsoft.XMLHttp', 'Msxml2.XMLHttp', 'Msxml2.XMLHttp.6.0', 'Msxml2.XMLHttp.5.0', 'Msxml2.XMLHttp.4.0', 'Msxml2.XMLHttp.3.0','Msxml2.DOMDocument.3.0'];
	for (var i = 0; i < versao.length; i++)
	{
		try
		{
			return new ActiveXObject(versao[i]);
		}
		catch(e)
		{
			alert("Seu navegador não possui recursos para o uso do AJAX!");
		}
	} // fecha for
	return null;
} // fecha função xmlhttp

//função para fazer a requisição da página que efetuará a consulta no DB
function carregar()
{
   a = document.getElementById('busca').value;
   ajax = xmlhttp();
   if (ajax)
   {
	   ajax.open('get','result.php?busca='+a, true);
	   ajax.onreadystatechange = trazconteudo; 
	   ajax.send(null);
   }
}

//função para incluir o conteúdo na pagina
function trazconteudo()
{
	if (ajax.readyState==4)
	{
		if (ajax.status==200)
		{
			document.getElementById('resultados').innerHTML = ajax.responseText;
		}
	}
}

</script>
</head>

<body>
<form id="form1" action="" method="post">
	<input type="text" name="busca" id="busca" value="" placeholder="Buscar palavra-chave" onkeyUp="carregar()"/>
</form>
<div id="resultados"></div>
</body>
</html>