programa
{
	
	funcao inicio()
	{
		real n1,n2, n3, n4

		real soma, media

		escreva("Digite a primeira nota: ")
		leia(n1)
		escreva("\n")
		
		escreva("Digite a segunda nota: ")
		leia(n2)
		escreva("\n")

		escreva("Digite a terceira nota: ")
		leia(n3)
		escreva("\n")

		escreva("Digite a quarta nota: ")
		leia(n4)
		escreva("\n")

		soma = (n1+n2+n3+n4)
		media = (soma/4)
		escreva("A média final do aluno é = ", media)
		escreva("\n")

		se (media >= 5){
			escreva ("\nEstá aprovado!\n")
		}
			senao escreva ("\nEstá reprovado!\n")
		
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 523; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */