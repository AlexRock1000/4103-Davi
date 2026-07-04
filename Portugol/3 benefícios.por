programa
{
	
	funcao inicio()
	{
	cadeia cargo
	inteiro idade, tempo
	
		escreva("Qual a sua idade? ")
		leia (idade)
		
		escreva("Quanto tempo trabalha na empresa? ")
		leia (tempo)

		escreva("Qual seu cargo? ")
		leia (cargo)

		escreva ("\n")
		escreva ("*** *** *** *** *** *** ***")
		escreva ("\n")
		escreva ("Seus beneficos")
		escreva ("\n")
		escreva ("*** *** *** *** *** *** ***")
		escreva ("\n")
		escreva ("\n")

		se (idade >= 30 ou tempo >= 5){ escreva ("Você vai ganhar uma Cesta Básica, parabens! :(\n")}
	
		senao escreva ("Não tem direito a Cesta Básica :)\n")

		se (nao(cargo == "Gerente")){ escreva ("Você tem direito ao Convênio Médico :)\n")}
		
		senao escreva ("Você não tem direito ao Convênio Médico :(\n")

		se (cargo == "Gerente" e tempo >= 10){ escreva ("Você tem direito ao Cartão Corporativo :)\n")}

		senao escreva ("Você não tem direito ao Cartão Corporativo :(")
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 902; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */