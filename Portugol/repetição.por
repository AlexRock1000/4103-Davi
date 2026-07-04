programa
{
	
	funcao inicio()
	{
	real numero
	real contador
	real acumulado

	numero = 1
	contador = 0
	acumulado = 0
	
	enquanto (numero > 0){
		 
			escreva("Digite o número para somar\n")
			leia (numero)
			
			acumulado = acumulado + numero

			se (numero != 0){
				contador = contador + 1
			}
			
			se (contador > 0){
				escreva ("A média acumulada foi de ", acumulado/contador, " \n")
				escreva ("Total de números digitados ", contador, " \n")
			}
			senao escreva ("Nenhum número informado")
			}

	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 310; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */