# Hoe contentmanagementsysteem klaarzetten
Dit is voor de kiosk versie op een server die NIET content overneemt van een andere server.

## Inhoud

- [WordPress](#wordpress)
- [activatie thema](#activatie-thema)
- [Basis pagina's importeren](#basis-paginas-importeren)
- [Plugins](#plugins)
- [Projecten toevoegen](#projecten-toevoegen)

## WordPress
We gebruiken WordPress als content management system. Gebruik hiervoor het docker compose bestand in de root map.

## Activatie thema
De eerste stap is het importeren van het WordPress thema in WordPress.
1. In WordPress klik op de verfborstel om zo naar de thema's pagina te gaan.
2. Klik op "Nieuw thema toevoegen".
3. Klik op "Thema uploaden".
4. Klik op "Choose file" en selecteer dit bestand in onze repo: wordpress/imports/thema.zip.
5. Klik op "Nu installeren".
6. Navigeer terug naar de thema's pagina door op de verfborstel te drukken.
7. Je zal nu een thema "Bachelor proef Kiosk" terugvinden klik bij deze op "Activeren"

## Basis pagina's importeren
In WordPress werken we met pagina's om inhoud weer te geven, er zijn ook een paar pagina's sowieso nodig, bijvoorbeeld die van de menu's, gelukkig is het niet moeilijk en gewoon een bestand importeren.
1. In WordPress, hover met de muis over het moersleutelsymbool en klik daarna op het menu dat tevoorschijn komt op "Importeer".
2. Onderaan op de pagina vind je "WordPress" klik op "Nu installeren" en wacht tot het klaar is.
3. Herlaad de pagina.
4. Klik dan op "Importeerfunctie uitvoeren" bij WordPress.
5. Klik dan op "Choose file" en selecteer dan het bestand in de repo: wordpress/imports/pages.xml.
6. Klik op "Upload bestand en importeer" en bij de volgende pagina op "Versturen".
7. Dit is iets dat soms niet goed staat afhankelijk van de versie van wordpress, zorg dat onder instellingen -> permalinks de permalink structuur op "gewoon" staat.

## Plugins
Er zijn enkele plugins nodig voor ons project om te kunnen werken, Installeer en activeer volgende plugins:
- Wp Maximum Upload File Size
- PDFjs Viewer - Embed PDFs
  
## Projecten toevoegen
Gefeliciteerd, je hebt succesvol de basis van onze pagina geïnstalleerd. Nu kan je zelf bachelorproeven toevoegen! Hier is een voorbeeld van hoe je dat doet:
- Ga naar Media Library (camera + muzieknoot symbool)
- Klik op "Add New Media File" en dan op "Select Files"
- Selecteer vervolgens de pdf's van de bachelorproeven die je wilt beschikbaar stellen op de site. (In de repo onder wordpress/imports kun je alle fiches van voor 2024 vinden)
