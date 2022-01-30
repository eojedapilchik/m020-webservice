<p align="center"><h2>Web Service App for Beers</h2></p>

## About the App

This app was made with Symfony by Alcides Ojeda  
This API uses PUNK API to retrieve Beer information based on food pairing

https://punkapi.com/documentation/v2

V 0.1  
Date: 30/01/2022  

# REST API  

The REST API to the example app is described below.

## Get Beers By Food Name

### Request

`GET /api/beers?food=food_name`

    curl http://localhost:8000/api/beers?food=pasta

### Response

    HTTP/1.1 200 OK
    Status: 200 OK
    Connection: close
    Content-Type: application/json

```yaml
    [{
        "id": "29",
        "name": "10 Heads High",
        "description": "10 Heads High is loosely based on our awesome 2011 Prototype beer Hops Kill Nazis. This is an uncompromising 7.8% Imperial Red Ale loaded high with American Hops. Think of this as an Imperial India Red Ale, or a super-charged version of 5am Saint. Either way this is a seriously good beer!"
    },
    {
        "id": "31",
        "name": "Nanny State",
        "description": "Brewing a full flavoured craft beer at 0.5% is no easy task. Packed with loads of Centennial, Amarillo, Columbus, Cascade and Simcoe hops, dry hopped to the brink and back and sitting at 55 IBUs, Nanny State is a force to be reckoned with. With a backbone of 8 different specialty malts, Nanny State will tantalise your taste buds and leave you yearning for more."
    },
    {
        "id": "33",
        "name": "Sorachi Ace",
        "description": "A hop that tastes of bubble gum? Seriously? No, we did not believe it either. But it does! This is one unique, son of a bitch of a hop. Lemony, deep, musty with a smoothness that belies its power. This hop is lemony like a lemon who was angry earlier but is now tired because of all the rage. This hop of Japanese origin is best enjoyed trying to make sushi from your gold fish, or trying to persuade your girlfriend (or boyfriend maybe) to dress up as a Geisha for Valentine’s Day."
    },
    {
        "id": "212",
        "name": "Hop Fiction - Prototype Challenge",
        "description": "Hop Fiction is an explosively tropical US-style Pale Ale. We rolled up our hop-dusted sleeves and put some advanced brewing techniques to work on this seasonal brew. Hop Fiction’s incredible aromas and flavours are down to a combination of early and late hops. Bags of soft, rounded citrus and stone fruit layer up on a dry light biscuit backbone. Hop Fiction, beer fact."
    },
    {
        "id": "214",
        "name": "Cult Lager",
        "description": "A lager that actually tastes of something? You have to be kidding, right? Cult lager is made with 100% malt and whole leaf hops. Maybe we are crazy, so what? Taste our lager and we are pretty sure that you will agree that the fine line between insanity and genius has just become a little more blurred."
    },
    {
        "id": "255",
        "name": "Small Batch: Tripel",
        "description": "Intense spicy and citrusy notes backed up with a bitter edge and a warming but dry malt biscuit backbone. This beer comes into its own after cellaring cool for a few weeks."
    },
    {
        "id": "301",
        "name": "Small Batch: Dry-hopped Pilsner",
        "description": "A BrewDog bar exclusive draft lager, brewed with Weihenstephan's lager yeast, and dry-hopped with the contemporary German variety Saphir; this lager has been lightly centrifuged and packaged at just under 28 days in tank."
    },
    {
        "id": "325",
        "name": "Zipcode",
        "description": "A new 5% Pilsner, that feaures in Fanzine, our new subscription model."
    }]
```

## Get Beer Details

### Request

`Get /api/beers/id`

    curl http://localhost:8000/api/beers/12

### Response

    HTTP/1.1 200 OK
    Status: 200 OK
    Connection: close
    Content-Type: application/json


```yaml

{
    "tagline":"Seasonal Black IPA.",
    "image_url":"https:\/\/images.punkapi.com\/v2\/12.png",
    "first_brewed":"12\/2015",
    "id":"12",
    "name":"Arcade Nation",
    "description":"Running the knife-edge between an India Pale Ale and a Stout, this particular style is one we truly love. Black IPAs are a great showcase for the skill of our brew team, balancing so many complex and twisting flavours in the same moment. The citrus, mango and pine from the hops \u2013 three of our all-time favourites \u2013 play off against the roasty dryness from the malt bill at each and every turn."
}
```

## Installation in local Env.

- Clone this Repository
- Run composer `composer install` in the root folder of the app
- Run server with the command `symfony server:start` or `php bin/console server:start`

NOTE:  
If you require that the picture of the Beer is retrieved 64encoded, then uncomment:  
```
    image_64encoded:
      groups: ['beer_details']
```

in the file:  
GetBeerDTO.yaml