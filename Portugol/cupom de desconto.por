programa
{
	
	funcao inicio()
	{ 
	cadeia cup1, cup2
	real preco, desconto

	
		escreva("Informe o preço: ")
		leia (preco)
		escreva ("\n")
		
		escreva("Informe o primeiro cupom\n")
		leia (cup1)

		escreva("Informe o segundo cupom\n")
		leia (cup2)
		

		se (cup1 == "cup10" ou cup1 == "cup20" e cup2 == "cup20" ou cup2 == "cup10"){ 
			desconto = 0.20
			desconto = preco*desconto
			escreva ("Seu desconto é de 20%\n", preco - desconto)}

		senao se (cup1 == "cup10" ou cup2 == "cup20" ou cup1 == "cup20" ou cup2 == "cup10"){ 
			desconto = 0.10
			desconto = preco*desconto
			escreva ("Seu desconto é de 10%\n", preco - desconto)}

		senao escreva("Você não tem desconto \n", preco)}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 326; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */