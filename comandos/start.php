<?php

$saldo = (string)number_format ($user ['saldo'], 2);

$tlg->sendMessage ([
	'chat_id' => $tlg->ChatID (),
	'text' => "😀 <b>Olá ".htmlentities ($tlg->FirstName ())."</b>, Seja bem-vindo ao BOT SMS NET!\n\nAqui você pode gerar números temporários para receber SMS de qualquer serviço, app ou site.\n\n💰 O seu saldo atual é de: <code>R\${$saldo}</code>.\n\n <b>Suporte: @theromss</b>",
	'parse_mode' => 'html',
	'reply_markup' => $tlg->buildKeyBoard ([
		[$tlg->buildInlineKeyboardButton ('💴 Recarregar'), $tlg->buildInlineKeyboardButton ('🔥Serviços')],
		[$tlg->buildInlineKeyboardButton ('👤 Saldo'), $tlg->buildInlineKeyboardButton ('👥 Informações')],
		[ $tlg->buildInlineKeyboardButton ('🚩 Países')]
	], true, true)
]);

// afiliados
if (isset ($complemento) && is_numeric ($complemento) && STATUS_AFILIADO){

	$ref = $tlg->getUsuarioTlg ($complemento);

	// se usuario existir e não tiver entrado no bot por indicação de alguem e tambem não pode ser ele mesmo
	if (isset ($ref ['id']) && $bd_tlg->checkReferencia ($tlg->UserID ()) == false && $complemento != $tlg->UserID ()){

		// salva usuario atual como referencia do dono do link
		$bd_tlg->setReferencia ($complemento, $tlg->UserID ());

	}

}