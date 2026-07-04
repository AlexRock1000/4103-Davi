programa
{
	
	funcao inicio()
	{
		real peso, alto, IMC
		
		escreva("**** CÁLCULO DE IMC *****")
		escreva ("\n")

		escreva ("Informe seu peso: ")
		leia (peso)
		escreva ("\n")

		escreva ("Informe sua altura: ")
		leia (alto)
		escreva ("\n")

		escreva ("RESULTADO\n")
		escreva ("\n")

		IMC = peso/(alto*alto)
		escreva ("Seu IMC é: ", IMC, "\n")

		se (IMC >= 18.5 e IMC < 25){
			escreva ("Você está saudável\n")
		}
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 359; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */