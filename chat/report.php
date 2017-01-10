<?php $title='ChatBate'; include(__DIR__ . '/incl/header.php'); ?>
<div id='container'>
    <h1>Redovisning</h1>
    <a href=http://www.student.bth.se/~erna13/dbwebb-kurser/javascript/me/kmom10/chat/>Projekt</a>
    <h2>Krav1: Paketera,presentera och produktifiera</h2>
    <p>Mitt projekt ChateBate är paketerat och har en me-sida där jag har beskrivit min produkt så gott som jag har kunnat, även om det är några saker som är ny för personen som skulle vilja ha min chat så ska det inte vara så svårt att få det att funka. För en person som inte har någon erfarenhet alls om något av dem verktyg jag använder kan det nog bli lite svårare att få ihop det.
    <br>
    <br>
    ChatBate är en chat applikation där både nya som erfarna programmerare kan diskutera både i "General" chatten som går till alla användare som är online eller kan användarna ha en privat konversation med en eller flera andra användare. I kursmoment 6 använde vi websocket och där av fick jag tillräckligt med kunskap för att kunna byggare vidare på min chat, vi har även gjort lite i ajax i kmom 04 och där av fick jag kunskapen för att göra ett login system med hjälp av ajax.
    <br>
    <br>
    Min me-sida för detta projekt innehåller mer beskrivning vad det är och hur man gör för att installera det själv.</p>

    <h2>Krav k2: Ha koll på konkurrenterna och lär av dem</h2>
    <p>När jag gjorde min analys av att hitta liknande webapplikation för att få nya som erfarna webprogrammerare så hittade jag knappt något som svar var just för webprogrammerare. Det fanns många  olika Q and A hemsidor tex "stackoverflow" där man kan ställer frågor och sedan kan få svar på sina problem. Enda som jag hittade som var en real-time chat som hade ämnet webprogrammering var just på stackoverflow som jag inte visste om sen innan, där var det mer uppdelat i flera kategorier som olika språk vilket jag inte har. Vet inte om det är i min nackdel eller fördel för på min applikation är det mer generel om allt, tex om man håller på med ett projekt som innehåller flera olika språk måste man byta rum medan i min så kan du hitta "din partner" och sedan bara diskutera er två.
    <br>
    <br>
    I ChatBate kan du har dina privata chatter medans du sitter i "General" chatten och vara med i båda samtidigt om du skulle vilja ha en privat diskussion samtidigt som du är med i en diskussion om det nya ramverket tex. Ett problem som jag hittade i stackoverflows chat var att man var tvungen att ha över en viss "poäng" för att kunna skriva eller starta en ny group, här förlorar alla nya användare funktionaliteten att kunna skriva och få hjälp i real-time. Medans i min webapplikation är det detta som är hela poängen att nya webprogrammerare ska kunna hitta folk och jobba tillsammans med eller få hjälp av med hans/hennes projekt. I min applikation kan man också skriva och ha en konveration med en specifik person, i de webapplikationer som jag har hittat har jag inte hittat denna funktionalitet utan där kan man bara skriva i själva chatten.
    <br>
    <br>
    Sedan har andra chatrum såklart mer andra användbara funktkionaliteter så som "snygga-länkar" som tex när man skickar en länk blir en fin bild med beskrivning angående själva länken tex. Samt man kan tex länka bilder osv.</p>

    <h2>Krav k3: Kvalitet och omfattning</h2>
    <p>Med detta projektet ville jag att hela webapplikationen skulle byggas på så att sidan inte ska behöva laddas om, och så är den även uppbyggd. Det finns tre olika fönster man kan vara i och det är login, registrera samt själva chatten. Det som visas först när man kommer in på sidan är då login som jag då har "display: block" och sedan när man navigerar sig mellan de olika sidorna så togglar jag på det olika fönstrerna om de ska visas eller inte. Allt börjar i min main.js som då kör en funktion som sätter upp login gui:et som ligger i min login.js
    <br>
    <br>
    Som sagt börjar man i login stadiet där man har möjligheterna att logga in eller välja att registrera sig, när man klickar på login så använder jag mig av JSON som då skickar med användar namn och lösenord till en php fil som då ansluter sig till databasen och kollar om uppgifterna stämmer. Om det blir en match så blir man skickad till "chatt-sidan", om inte så indikeras det till användaren att det har blivit något fel. Vid registrering så gäller samma sak, som då kollar om användarnamnet är ledigt. När man väl loggas in så hanterar så att man blir uppkollad till servern i min main.js, då togglas det så att rätt fönster(dvs chatt-fönstret) visas samt att ett meddelande skickas och indikerar för andra att du har loggats in.
    <br>
    <br>
    Sedan när man skickar ett meddalnde har jag en lyssnare på den knappen som först kollar om det finns några medlemmar som är i klickade (det är så programmet håller koll på om det är ett vanligt meddelande eller om det är en viskning). Och det gör jag genom att gå igenom hela min "vidWindow" div där alla nuvarande inloggade medlemmar visas, där kollar applikationen om de små divarna har klassen "inviteToggle"(som man då togglar genom att dubbel klicka på de olika användarna) om det finns någon/några divar som har klassen så gör jag ett meddelande av klassen "whisper" som sedan kollas på server sidan connection.on('message', function(message). Där kollar den var det är för en typ av meddelande om det nu är en whisper (som det är i detta fallet går den in där och går igenom alla användare som är online), där i går jag igenom alla inloggade användare och använder jag mig av en array som jag skickar med från klient sidan som innehåller alla personer som ska få detta meddelandet. Om det blir en match skickas meddelandet till den klienten. När man tar emot ett inkommande meddelande så kollas det var det är för typ av meddelande i websocket.onmessage om det är ett viskning så blir färgen en annan färg än färgen på texten i "Genral" chatten för att man ska kunna se skillnad på den, sedan kommer det upp den knapp ovanför meddelandet och det gör jag med en vanlig append, om man klickar på denna kan man se vilka som har tagit emot detta meddelandet.
    <br>
    <br>
    Applikationen har även en notifikationer som man får vid ett inkommande meddelande, den visar i taben för hemsidan och där visas det med en siffra som representerar hur många meddelande som man inte har kollat på. Detta gör jag genom funktionen $(window).on("blur focus", function(e) som då kollar om taben är i focus eller inte om den är i focus ändrar den "notification" som då är siffran i titlen till 0 samt uppdaterar titlen. Om den inte är i focus ochdu få ett meddelande ändrar den variablen "focus" till false som då gör att när man får ett meddelande går den in i följande if sats if(sender !=user && !focus) som då ökar "notification" och ändrar titlen.
    </p>

    <h2>Krav k4, k5, k6: Valbart krav (optionellt)</h2>
    <p>Har lite dålig koll på vad som är extra bra eller något som sticker ut. Har i stort sett använt mig av det mesta som vi har lärt oss i denna kursen och om jag skulle peka ut några extra saker som sticker ut lite extra skulle det nog vara följande:
    <br>
    <br>
    1: Notifikationer: Att göra notifikationer för applikationen kom jag på ganska sent och det var en del problem med det, det krävde inte så mycket kod som jag trodde men det krävdes en del research hur jag skulle få det att funka eftersom jag inte har gjort något liknande innan. Använde mig av blur och focus för att applikationen ska hålla koll på om den är i fokus eller inte. Därav använde jag mig av en switch case för ta hand om de olika utgångarna sedan hade jag problem med att det utfördes dubbla gånger av någon anledning och det fick jag googla upp och där hittade jag att jag var tvungen att andvända mig av denna if satsen: if (prevType != e.type). Som då gemför föregående typ(blur eller focus) med nuvarande typ. Försökte göra den snyggare med en liten animation med fick inte det att funka som jag ville tyvärr.
    <br>
    <br>
    2: Ajax: Ajax har varit en stor betydelse i mitt projekt då det webb applikationen inte ska laddas om på något sätt, jag använde mig av ajax för mitt loginsystem. Det funkar så att jag skickar datan till min login.php där jag har min logik för att hantera samt koppla upp applikationen til databasen, jag har olika funktioner och för att hålla koll på vad som ska göras kollar jag på vilken action som görs av användaren. Därav skickar jag med en sessions resultat som applikationen då använder för att kolla vad som ska göras samt användaren om det nu lyckades.
    <br>
    <br>
    3: Viskning: Att kunna "viska" i denna applikationen är en av de viktiga, men det tog sin tid. I denna function lyssnar jag om användaren skickar något meddalande $('#send_message').on('click', function(event), där i kollar jag sedan med denna for each $( ".vidWindow" ).each(function( i ) om det är några divar(som då innehåller en användare som är online) som har klassen 'inviteToggle' som man då togglar mellan genom att dubbelklicka på dem. Om detta nu finns fylls det en array med id:et från de divarna som då är användarnas användarnamn, därav kollar jag om arrayen är tom om den är det så skickar jag det till server sidan som en vanligt meddelande med typen 'message' som jag då använder för att applikationen ska  kunna urskilja vad som ska göras. Är det inte tom dvs användaren vill viska, så skickas det till server sidan som typen 'whispers' och då skickas arrayen med användarna som ska få meddelandet. Därefter på serversidan kommer man till connection.on('message', function(message) där kollas typen, eftersom detta är en 'whispers' så går den in i den if satsen och där har jag en for-loop i en for-loop i den yttre går jag igenom alla användare som är online(som jag får då jag lägger alla i denna array när dem loggar in. I den inre går jag igenom alla som ska få denna viskningen, i denna har jag en if sats som kollar yttre samt inre om det blir en match så skickas meddelandet till denna användare.
    <br>
    När en man tar emot ett meddelande kommer det till websocket.onmessage, där kollar det först vad det är för typ av ett meddelande. I detta fallet är det en "whisper" så då kommer man till outputLogWhisper() som finns i filen outputLogic.js, där skriver den ut meddelandet om mottagaren nu vill visa viskningar för till fället annars göms det bara tills motagaren vill det med hjälp av "General", "Whispers" och "All" knapparna som befinner sig under chatten. Med knappen ovanför varje viskning kan användaren få se vilka som har tagit emot detta meddelandet.</p>
    <br>
    <br>
    <h2>Ett allmänt stycke om hur projektet gick att genomföra</h2>
        <p>Det var en del saker som jag hade lite problem med detta projektet och det var tex viskningsdelen, det var en hel del som jag var tvungen att lägga till och göra om en del från kmom06. Det tog sin tid att komma in i det men efter att ha kommit upp med en stabil struktur gick det bättre.


        Detta projektet upplevde jag som ganska svårt då det inte fanns några direkta saker man skulle göra utan det var ganksa fritt och det var svårt att komma på vad man skulle göra samt veta om det skulle räcka eller inte. Men när jag kom framtill att jag ville göra detta chattrum med huvudämne Webbutveckling så flött det på hyfsat bra. Hade en hel del problem med olika faktorer men eftersom vi fick denna friheten att göra en egen webbapplikation så kunda man prioritera om.

        Mitt projekt tog lagom lång tid tyckte jag, det krävde helt klart sin tid eftersom man stötte på en del problem men jag kunde ha lite ledigt under julen iaf.

        Det som gick lättast var att få ihopa mitt gui, annars tog allt annat en del tid och hade sina egna svårigheter. Som tex loginsystemet med JSON o ajax hade jag en del problem med eftersom jag inte har gjort så mycket med det innan, men eftersom vi har haft ett kmom med det så löste det sig till slut.

        Jag upplevde detta projekt som mycket fritt eftersom man kunde göra lite vad man ville, det hade sina för- o nackdelar tex att man kan prioritera själv vad som ska göras, om man inte kan lösa en specific sak kan man ta bort det om man ville. En nackdel kan vara att det blir lite för fritt, man kanske har problem med vad man ska göra man kan bli osäker på vad som räcker eller inte räcker till eftersom vi inte har dessa direkta milstolparna att gå efter.</p>


    <h2>Avslutande stycke</h2>
        <p>Denna kursen har jag upplevt som en bra kurs har lärt mig mycket mer än vad jag trodde att jag skulle. Föreläsningarna med mos har varit bra, han har förklarat bra och för varje kmom har han gått igenom det viktigaste. Jag har varit på dem flesta labbstugorna denna läsperioden och dem som har varit där o assisterat har varit bra och jag har fått den hjälpen som jag behövde. De olika kursmomenten har varit bra och har varit väldig olika saker, tycker det har varit bra dokumenterat i kursmomenten som vi har läst igenom på dbwebb. Hade gärna dock gjort flera moduler samt klasser mer än att hållt på med jquery som vi gjorde ganksa mycket. Jag är nöjd med kursen och hade kunnat rekommenderat den för en vän, denna kursen får 9/10 av mig.</p>
</div>
<?php $path=__DIR__; include(__DIR__ . '/incl/footer.php'); ?>
