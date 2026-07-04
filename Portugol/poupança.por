programa
{
	inclua biblioteca Matematica
	
	funcao inicio()
	{
	real saldo_atual
	real pagamento
	real valorfinal
	real taxa
	inteiro mes

	taxa = 2.0
	saldo_atual = 0.0
	mes = 0

	escreva ("informe o valor do pagamento mensal\n")
	leia (pagamento)

	escreva ("informe o valor final do investimento\n")
	leia (valorfinal)

	enquanto (saldo_atual <= valorfinal){
		mes = mes + 1

		se (mes == 1){ 
			saldo_atual = pagamento }

		senao 
			saldo_atual = saldo_atual + saldo_atual * (taxa/100) + pagamento
		
	}
		escreva("*** Para atingir o valor do investimento de  ", valorfinal, " levará ", mes, " meses ***\n")
		escreva ("*** Valor final: ", Matematica.arredondar(saldo_atual,2), " ***\n")
		
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 503; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */