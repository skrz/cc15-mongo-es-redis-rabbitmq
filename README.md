# Codecamp 2015 - MongoDB, Elasticsearch, Redis, RabbitMQ

> Ukázkový projekt na Codecamp 2015 - lekce týkající se pokročilých backendových technologií - MongoDB, Elasticsearch, Redis, RabbitMQ

## Instalace

Přes Vagrant:

```sh
vagrant up --provision
```

Až proběhne provisioning, měla by se na http://192.168.33.10 ukázat Symfony aplikace, která bude zatím hlásit chybu Elasticsearch - `Index ... missing`. Je tedy poté potřeba provést první inicializaci RabbitMQ, MongoDB a Elasticsearch.

```sh
cd /var/www
./console bunny:setup                            # nastaví exchanges/queues v RabbitMQ
./console mongo                                  # vytvoří kolekce/indexy v MongoDB, vytvoří první eshopy/feedy ze souboru eshop.csv
                                                 # spuštění RabbitMQ consumerů na pozadí, všechny musí běžet naráz
./console bunny:consumer Download &              # stahuje XML feedy
./console bunny:consumer Import &                # zpracovává XML feedy a nalévá data do MongoDB
./console bunny:consumer ElasticsearchCatalog &  # data z MongoDB přelévá do Elasticsearch (vytvoří index, pokud je potřeba)

./console download                               # spustí download všech XML feedů z MongoDB 
```

Na http://192.168.33.10:15672 můžete sledovat, jak se postupně message přelévájí z jedné fronty do druhé. Až se všechny fronty vyprázdní, na http://193.168.33.10 by měl vidět jednoduchý výpis nabídek, můžete zkusit fulltextové vyhledávání, které umí (docela) dobře skloňovat atd.

## Na co se zaměřit u jednotlivých technologií

### MongoDB

- Projít všechny entity v `src/CC15/Entity` a pochopit model aplikace.
- `services.yml`, sekce `services` nadefinuje se `MongoClient` a `MongoDB` service - ty se pak používají v `MongoCommand` a `AbstractMongoRepository`
- `AbstractMongoRepository` - zaobaluje práci s určitou kolekcí v MongoDB.
- `ImportConsumer` používá pattern [Update if current](http://docs.mongodb.org/master/tutorial/update-if-current/).

### RabbitMQ

- `services.yml`, sekce `bunny` - je tam nadefinované, jaké se mají vytvořit exchanges/queues a jak se mají nabindovat na sebe.
- `DownloadConsumer`, `ImportConsumer` a `ElasticsearchCatalogConsumer`

### Redis

- `services.yml`, sekce `service` - nadefinuje se `Predis\Client` jako service a může se pak používat všude v aplikaci
- `RedisService` - zapozdřuje práci s Redisem - je dobré veškerou práci s Redisem na jednom místě, aby se dalo jednoduše zjistit, co jaký klíč znamená

### Elasticsearch

- `services.yml`, sekce `service` - nadefinuje se `Elasticsearch\Client` jako service a může se používat v aplikaci
- v `conf/hunspell/cs_CZ` jsou české slovníky pro Hunspell plugin v Elasticsearch
- `ElasticsearchCatalogConsumer` - vytvoření indexu (vč. všech nastavení analyzeru a mapování)
- `ListingService` - query builder pro výpisy, posílání queries do Elasticsearch

## Úkoly pro procvičení

- Rozehřívací úkol: Upravte zobrazení položek, aby v něm bylo vidět více informací (podobně jako je na http://skrz.cz/):
	- cena položky
	- kategorie (udělat jako odkaz na stránku s kategorií eshopu)
	- eshop (udělat jako odkaz na stránku eshopu)
	- tlačítko "Zobrazit" odkazující na URL nabídky
	- obrázek a nadpis nabídky jsou taky odkazy, vedou na stejnou URL tlačítko "Zobrazit"

- Místo toho, aby bylo v URL ID kategorie, vytvořte z názvu kategorie slug a používejte ho v URL.

  (Nápověda: `composer install --save nette/utils`, metoda `Nette\Utils\Strings::webalize(...)`.)

  (Nápověda2: Na slug musí být index, aby se podle něj dalo vyhledávat. Zároveň musí být unikátní. Unique index se zdá jako dobré řešení.)

- Na všech výpisech chybí stránkování. Ouvej. Rychle dodělat.

  (Nápověda: `from` je to samé jako `offset`, `size` je to samé jako `limit`
  https://www.elastic.co/guide/en/elasticsearch/reference/current/search-request-from-size.html)

- Při kliku na obrázek/nadpis položky bych měl být přesměrování na odkaz uvedený v XML feedu. Tento klik musí být
  vždycky zaznamenán. Vytvořte v MongoDB kolekci "events", do které se bude ukládat typ události - "click" -,
  ID položky a maximum informací o uživateli, co proklikl.

  (Nápověda: udělejte URL ve tvaru `/exit/{productId}`, která si najde produkt, zaznamená "click" a přesměruje uživatele
  pomocí `RedirectResponse` s kódem 302.)

- (Bonus) Krom kliků je taky důležité, kolik lidí položku vidělo. V Javascriptu sledujte, jestli je položka
  ve viewportu a ťukněte server, aby do kolekce "events" uložil událost typu "view", ID položky a maximum informací
  o uživateli, co položku viděl.

  (Pozn.: Google definuje, že reklama byla viděna, pokud člověk měl alespoň 50% její plochy ve viewportu po dobu
  alespoň 1 sekundy.)

  (Nápověda: v Javascriptu existuje pro každý element metoda `.getBoundingClientRect()`.)

  (Nápověda2: http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport/7557433#7557433)

- Stejně jako se kliky zaznmenávají do MongoDB, je zaznamenávejte do Elasticsearch.

  (Nápověda: https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-index_.html)

- (Bonus) Zaznamenávejte do Elasticsearch zobrazení.

- Zajímá mě pro položky statistiky po hodinách, kolik prokliklů (bonusově: zhlédnutí). Zobrazte tyhle informace
  u jednotlivých položek.

  (Pozn.: Porovnejte použití agregací v MongoDB a v Elasticsearch.)

  (Nápověda: http://docs.mongodb.org/manual/core/aggregation-pipeline/, https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-terms-aggregation.html)

- Teď se nabídky řadí velmi podivně. Udělejte chytřejší algoritmus řazení.

  (Nápověda: čím více lidí položku proklikne, tím bude zajímavější. Pokud máte zaznamenány eventy typu "view" -
  člověk položku viděl -, ale neproklikl ji, je to negativní signál, takové položky by se měly řadit níže.)

  (Nápověda2 (bonus): https://en.wikipedia.org/wiki/Click-through_rate)

- V postranní navigaci by mě zajímalo, kolik má eshop/kategorie položek. Použijte agregaci v Elasticsearch
  a spočtěte pro eshopy/kategorie, kolik je tam položek.

  (Nápověda: https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-terms-aggregation.html)

- (Bonus+) Automaticky vytvořte obecné kategorie a zařaďte do nich produkty z různých eshopů. Některé eshopy mají např.
  kategorii "Bicykly", jiné "Kola"; někdo zase píše "Helmy", někdo "Přilby", tyto kategorie by se měly sloučit,
  a vzniknout výpisové stránky, které budou obsahovat nabídky od různých eshopů.

## Licence

MIT licence. Viz soubor `LICENSE`.
