#!/bin/bash

# script por t.me/httd1
#
# script para executar a lista de processos e o bot em si,
# essa lista cuida da verificação dos sms recebidos,
# tempo passado da ativação e notifica os usuários do bot
#

screen -XS pagamentos quit > /dev/null
screen -XS processos quit > /dev/null
screen -XS alertas quit > /dev/null
screen -XS botsms quit > /dev/null

screen -dmS pagamentos sh inicia_pagamentos.sh
screen -dmS processos sh inicia_processos.sh
screen -dmS alertas sh inicia_alertas.sh
screen -dmS botsms sh inicia_bot.sh
echo "Lista de processos e bot inicidos com sucesso"
