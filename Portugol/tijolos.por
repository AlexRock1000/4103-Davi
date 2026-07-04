programa
{
	
	funcao inicio()
	{
		inteiro contador, metro, tijolo

		metro = 0
		contador = 1
		
		escreva("Informe o número total de tijolos: ")
		leia (tijolo)
		

		se (tijolo >= 32){
			enquanto(tijolo >= 32){
				tijolo = tijolo - 32 
				metro = metro + contador
				contador ++
				escreva ("Já construímos ", metro, "m² de muro e ainda restam: ", tijolo, "tijolos\n")
			}
		}
		senao{
			escreva("Tijolos insuficientes!\n")
		}
			
		
	}
}
/* $$$ Portugol Studio $$$ 
 * 
 * Esta seção do arquivo guarda informações do Portugol Studio.
 * Você pode apagá-la se estiver utilizando outro editor.
 * 
 * @POSICAO-CURSOR = 327; 
 * @PONTOS-DE-PARADA = ;
 * @SIMBOLOS-INSPECIONADOS = ;
 * @FILTRO-ARVORE-TIPOS-DE-DADO = inteiro, real, logico, cadeia, caracter, vazio;
 * @FILTRO-ARVORE-TIPOS-DE-SIMBOLO = variavel, vetor, matriz, funcao;
 */