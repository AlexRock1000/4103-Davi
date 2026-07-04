programa
{
	
	funcao inicio()
	{
		caracter uf
		 
		escreva("Entre com o UF do cliente: Digite 'P' - para PA - 'M' para MG - 'S' para SP\n")
		leia (uf)
		
		escolha (uf)
		{
		caso 'P': escreva ("Ladrão\n")
		pare

		caso 'M': escreva ("Boiadeiro\n")
		pare

		caso 'S': escreva ("Traficante\n")
		pare

		caso contrario: escreva ("UF inválida")
		pare
		}
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 75; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */