programa
{
	
	funcao inicio()
	{
		real pagamento
		real adicional
		real desconto
		real resultado

		
		escreva("Informe o valor do pagamento: \n")
		leia (pagamento)
		
		escreva("Informe o valor adicional: \n")
		leia (adicional)

		escreva("Informe o valor do desconto: \n")
		leia (desconto)

		resultado = pagamento * adicional - desconto
		escreva ("o resultado do cálculo é: ", resultado)
		
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 400; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */