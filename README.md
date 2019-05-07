# GitRESTful
Semplice applicazione RESTful login tramite l'utilizzo dei linguaggi di programmazione PHP,JAVA e SQL, e dei servizi di hosting di Altervista con database MySQL.
L'utente inserisce le proprie credenziali e accede alla pagina principale. Se non è ancora registrato, può farlo inserendo username univoco e password codificata in md5. Se esegue l'accesso appare una pagina che conferma che l'accesso è stato eseguito con successo.
L'applicazione si basa sull'utilizzo principalmente del metodo POST per la comunicazione delle credenziali tra l'applicazione in JAVA e le API in PHP le quali vengono utilizzate per interrogare il database tramite query in SQL.

Programmi essenziali

- Servizio hosting di Altervista dove creeremo il nostro database e dove caricheremo le nostre API in PHP.
- Editor di codice (es. "Android Studio" e "Visual Studio Code").

DataBase

- E' presente solo una tabella che contiene : username univoco, password codificata con "md5".
  create table users
  (
    username varchar(30) primary key not null,
    password varchar(32) not null
   );
