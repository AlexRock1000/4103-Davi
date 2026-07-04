programa
{
	
	funcao inicio()
	{
		inteiro contador
		real soma, media, pesomaior, pesomenor, peso

		pesomaior = 0.0
		pesomenor = 9999999.0
		peso = 0.0
		soma = 0.0

		escreva("COPERATIVA NETUNO PESCAS\n")
		escreva ("\n")

		para (contador = 1; contador<=3; contador++){
			escreva ("Informe o peso do ", contador, "º peixe: ")
			leia (peso)

		se (peso > pesomaior){
			pesomaior = peso }

		se (peso < pesomenor){
			pesomenor = peso }
		}
		
		escreva ("\n")
		escreva ("RESUMO DA PESCARIA\n")
		escreva ("\n")
		escreva ("Ótima pescaria Jão\n")
		
		soma = soma + peso
		media = (soma/3)
		escreva ("A média de peso dos peixes foi de ", media, "Kg\n")
		
		escreva ("O menor peixe pesou: ", pesomenor, "Kg\n")
		escreva ("O maior peixe peosu: ", pesomaior, "Kg\n")
	}
		 
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 781; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */