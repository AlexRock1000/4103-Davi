programa
{
	
	funcao inicio()
	{
	inteiro salario
	inteiro comissao
	inteiro desconto
	inteiro resultado
	
	
		escreva("Informe o valor do salário: ")
		leia (salario)
		escreva("\n")
		
		escreva("Informe o valor da comissão: ")
		leia (comissao)
		escreva("\n")
		
		escreva("Informe o valor do desconto do salário: ")
		leia (desconto)
		escreva("\n")

		resultado = salario + comissao - desconto
		escreva ("Salário final: ", resultado, "\n")
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 341; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */