## Instalação



## Account

Api destinada ao controle de clientes

* Methods usados
POST | GET | PUT | DELETE

 * Function index <br>
        Method:GET <br>
                 <i>Retorna todas as condas existentes<i>
    
                     url:api/conta/home
 <br>
 <br>
    
  * Function store <br>
        Method: POST <br>
        <i>Cria uma nova conta<i>
           
                    url:api/conta/cadastro
                    
 Body Params:

Devem ser enviados em formato JSON.

fullname=[string] - Nome do cliente, required - precisa ter ao menos 2 palavras

email=[string] - Email, required, unico no BD, rule:email

type=[string] - cpf ou cnpj, required

document(string] - 11 caracteres numerios caso type seja cpf e 14 caracteres numericos caso seja cnpj, requid, unico no BD

password(string) - required, minimo de 8 digitos

password_confirmation - required,
<br>
<br>
            
   * Function show <br>
        Method:GEt <br>
        <i>Retorna os dados de uma id<i>
        
                    url:api/conta/{id}           
<br>
<br>
            
  * Function update <br>
        Method:PUT <br>
        <i>Atualiza dados da conta (fullname, password)<i>
            
                    url:api/conta/atualizar
     
      Body Params:

Devem ser enviados em formato JSON.
 
 fullname=[string] - Nome do cliente, required - precisa ter ao menos 2 palavras <br>
 password(string) - required, minimo de 8 digitos
      
   <br>
   <br>
   
  * Function destroy <br>
        Method:DELETE <br>
        <i>Deleta a conta referente ao id<i>
        
                    url:api/conta/{id}
        
  <br>
  <br>

## Balance

  Api destinada ao controle das transações bancarias (deposito e transferência)
  
* Methods usados
POST | PUT 

  * Function deposit <br>
        Method: PUT <br>
        <i>Deposita saldo em conta<i>
           
                    url:api/transacao/deposito
   
   Body Params:

Devem ser enviados em formato JSON.

id=[integer] - id da conta que receberá o deposito, precisa existir no BD

deposit=[string] - Valor do depósito, precisa ser maior que 0(zero)
   <br>
   <br>
            
    * Function transaction <br>
        Method: POST <br>
        <i>Transfere saldo de uma conta pra outra<i>
           
                    url:api/transacao/pagamento
            
    
   Body Params:

Devem ser enviados em formato JSON.

payer=[integer] - id da conta que fará o depósito, precisa existir no BD

payee=[integer] - id da conta que receberá o depósito, precisa existir no BD  
 
value=[string] - Valor da transferência, payer precisar ter saldo > do que value, value precisa ser > 0(zero)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
