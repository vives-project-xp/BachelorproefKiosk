# Hoe contentmanagementsysteem klaarzetten

## Inhoud

- [WordPress](#wordpress)
- [activatie thema](#activatie-thema)
- [Basis pagina's aanmaken](#basis-paginas-aanmaken)
- [Plugins](#plugins)
- [Projecten toevoegen](#projecten-toevoegen)

## WordPress
We gebruiken WordPress als content management system, Zorg dat je een WordPress installatie hebt of je een abonnement hebt bij een WordPress provider en dat je de instellingen die je moet invullen voor het eerste gebruik al hebt gedaan.

## Activatie thema
De eerste stap is het importeren van het WordPress thema in WordPress.
1. In WordPress klik op de verfborstel om zo naar de thema's pagina te gaan.
2. Klik op "Nieuw thema toevoegen".
3. Klik op "Thema uploaden".
4. Klik op "Choose file" en selecteer dit bestand in onze repo: wordpress/imports/wp_thema.zip.
5. Klik op "Nu installeren".
6. Navigeer terug naar de thema's pagina door op de verfborstel te drukken.
7. Je zal nu een thema "Bachelor proef Kiosk" terugvinden klik bij deze op "Activeren"

## Basis pagina's aanmaken
In WordPress werken we met pagina's om inhoud weer te geven, er zijn ook een paar pagina's sowieso nodig, bijvoorbeeld die van de menu's, gelukkig is het niet moeilijk en gewoon een bestand importeren.
1. In WordPress, hover met de muis over het moersleutelsymbool en klik daarna op het menu dat tevoorschijn komt op "Importeer".
2. Onderaan op de pagina vind je "WordPress" klik op "Nu installeren" en wacht tot het klaar is.
3. Herlaad de pagina.
4. Klik dan op "Importeerfunctie uitvoeren" bij WordPress.
5. Klik dan op "Choose file" en selecteer dan het bestand in de repo: wordpress/imports/pages.xml.
6. Klik op "Upload bestand en importeer" en bij de volgende pagina op "Versturen".
7. Dit is iets dat soms niet goed staat afhankelijk van de versie van wordpress, zorg dat onder instellingen -> permalinks de permalink structuur op "gewoon" staat.

## Plugins
Er zijn enkele plugins nodig voor ons project om te kunnen werken:
- increase max upload size
- PDFjs Viewer: voor de pdf's weer te geven, instellingen:
  - [ ] Show Download Button
  - [ ] Show Print Button
  - [ ] Show Search Button
  - [ ] Show Fullscreen Link
  - de rest mag je laten zoals het is
  
## Projecten toevoegen
Gefeliciteerd, je hebt succesvol de basis van onze pagina geïnstalleerd. Nu kan je zelf bachelorproeven toevoegen! Hier is een voorbeeld van hoe je dat doet:
1. In WordPress klik in de zijbalk op het icoon voor pagina's (icoon met 2 rechthoeken)
2. Druk hier op "Nieuwe pagina toevoegen".
3. Vul de titel in.
4. Druk op de plus om inhoud toe te voegen en druk op Bestand, nu krijg je de optie om een bestand up-te-loaden, klik hierop en selecteer de pdf van de bachelorproef die je wilt uploaden.
5. Klik 2 maal op "Publiceren".
6. Ga terug naar de pagina's pagina, klik daar bij de pagina die je net gemaakt hebt op "Snel bewerken".
7. Zet Template op Project en Hoofd (Parent) op ofwel Elektronica of ICT afhankelijk van bij welke afstudeerrichting de bachelor proef hoort. (met bulk acties kan je meerdere pagina's hun template en hoofd tegelijk goed zetten.)
