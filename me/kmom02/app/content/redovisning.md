Redovisning
====================================

Kmom01
------------------------------------

Vill börja med att det är roligt att vara igång igen med PHP, trodde inte jag skulle säga det.  
I även denna kursen sitter jag på Windows 7, använder PhpStorm som IDE dock Chrome istället för Firefox.
Börjar bli väldigt bekväm med PhpStorm, det är en fantastiskt IDE med väldiga många riktigt bra funktioner.


Har aldrig tidigare jobbat eller hört något om ramverk. Men vad jag har jobbat och lärt mig i detta kursmomentet så _känns_
det (för tillfället) väldigt smidigt. Bra att vi för varje kurs lär oss struktuera koden på ett ännu snyggare sätt.  
Det samma gäller för alla begrepp som används, det vill säga att även det är nytt. Har fått läsa en del för att försöka få en övergripande förståelse, det blir dock bli överväldigande ganska snabbt.
Just nu känns allt väldigt komplicerat, men det har de dock gjort i början av varje kurs och i slutet har man koll med vad man gör. Så det gäller bara att kämpa på. 

Det gjorde ont i ögonen i slutet av OOPHP när vi blandade PHP och HTML så mycket... Usch. I början så kändes det var så rätt det kunde bli.  

Jag tycker Anax-MVC fungerar rätt bra, den största anledningen till detta är phalcons manual. Mycket bra att det finns tillshands.
Guiderna på dbwebb för första kursmomentet är _riktigt_ bra. Första gången det har flytit på i bra takt. 


Kmom02
------

Har tidigare använt Composer när jag jobbade med [CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) som var bra till de tidigare kurserna när vi var tvungna att följa en viss PSR. 
Använde det inte riktigt på samma sätt, utan jag gjorde något globalt krav med hjälp av composer. CodeSniffer använde jag enbart till att fixa fel automatiskt, vet inte om det kan användas till mer.

Har även kollat runt lite på Packagist, gick igenom några sidor med hittade inget som skulle vara passande. Detta är antagligen brist på kunskap, då vissa paket underlättar vissa specifika saker något otroligt.
Men ska fortsätta och se över och se om det finns något mer som kan vara användbart. Känns som en bra övning att ha koll på hur man installerar/hanterar andra paket förutom Comment paketet. 

När jag hade gjort klart guiden och skulle gå över till kraven, bla att kunna klicka på ID'n för att redigera och använda två olika sidor för olika kommenterar, så trodde jag aldrig att jag skulle klara detta kursmoment. 
Läste på relativt mycket, men majoriteten av alla begrepp var fortfarande grekiska. Sedan började jag gå igenom vissa klasser som skulle användas. Gick igenom hur funktionerna såg ut och vad de gjorde för jobb, mycket blev mer logiskt då. Sen så fick jag testa, testa och testa olika saker och studera de olika resultaten. Fick en "aha" upplevelse i slutet av kursmomentet, alltid lika skönt när några pusselbitar faller på plats. 

Fick lite problem med CommentInSession då jag använde en array (all_comments) som i sin tur hade två olika arrayer (page_1 och page_2) som i sin tur höll arrayer med varje enskild kommentar. 
Då viewAction anropades när användaren klickade på en kommentarsida (vi säger i detta fall det är page 1), så försöker findAll funktionen komma åt en array i sessionen som inte finns.
Löste det genom att använda array_key_exists. Detta fick jag även göra på add funktionen.  

Sen löste jag problemet när användaren ska kunna ta bort en enskild kommentar på ett annorlunda sätt, tror jag. 
Först när jag försökte ta bort så låg nyckeln kvar, detta var inget jag ville. Så jag skapa en ny funktion i klassen CSession där jag gjorde en unset funktion.
Gjorde, så gott det gick, funktionen så generell som möjligt. Finns garanteret att bättre sett att lösa det på. Kanske ska inte ens unset behövas användas - men det funkar utmärkt för mig. 

Sedan, tror jag, att jag lyckades rätt bra med att göra alla funktioner väldigt generella i Comment klassen. Om jag nu skulle vilja lägga till sida att kommentera på så kommer jag inte behöva ändra något i Comment klasserna. 


Kmom03
------
