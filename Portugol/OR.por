programa
{
	
	funcao inicio()
	{
	inteiro idade, senha
	cadeia nome
	
		escreva("Informe um nome\n")
		leia (nome)
		
		escreva("Informe uma idade\n")
		leia (idade)

		escreva("Informe a senha\n")
		leia (senha)

		se (nome == "Bruno" ou idade > 18 ou senha == 123){ escreva ("Acesso permitido")}
		senao escreva ("Acesso negado")
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 59; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = {idade, 6, 9, 5}-{nome, 7, 8, 4};
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */